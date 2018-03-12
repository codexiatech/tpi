<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
     //   require 'vendor/autoload.php';
       if(isset($_SESSION['tpi_user_id']) && !isset($_SESSION['tpi_Useraddress']))
       {
         $user_id = $_SESSION['tpi_user_id'];
         $return3 = $this->_custom_query("SELECT * FROM address WHERE user_id='$user_id ' AND coin_type='e' order by date_of_creation DESC  Limit 0,1");
         $address = $return3->result()[0]->address;  
         $etherbal = json_decode(file_get_contents("https://api.etherscan.io/api?module=account&action=balance&address=$address"),true);
         $etherbal =   $etherbal['result']/1000000000000000000;
         $Commandata = array('tpi_Useraddress'=>$address,'tpi_OrignlEthbal'=>$etherbal); 
         $this->session->set_userdata($Commandata);
       }
       
     
    }
    function dashboard()
    {
        user_auth();
        $id = $_SESSION['tpi_user_id'];
        // $data['secret_key'] = $this->_custom_query("select secret_key from user where id = $id");
        $data['coin_value'] = $this->_custom_query("SELECT * FROM coin_value");
        $data['title'] = 'Login';
        $this->load->view('user/Header',$data);
        $this->load->view('user/Dashboard');
        $this->load->view('user/Footer');
    } 
    function index()
    {
        user_auth();
        require '/var/www/html/bitcoin-wallet/GoogleAuthenticator/vendor/autoload.php';
        $authenticator = new PHPGangsta_GoogleAuthenticator();
        $secret = $authenticator->createSecret();
        $user_id = $_SESSION['tpi_user_id'];
        $re1 = $this->_custom_query("SELECT * FROM `user` where id = $user_id");
        if(empty($re1->result()[0]->secret_key)) {
            $this->_custom_query("update user set secret_key = '$secret' WHERE id = $user_id");
        }
        $website = 'http://18.220.128.238/bitcoin-wallet/user/index/'; //Your Website
        $title= 'bitcoin';
        $qrCodeUrl = $authenticator->getQRCodeGoogleUrl($title, $secret,$website);
        $data['qrcode'] = $qrCodeUrl;
        $data['title'] = 'google authentication';
        $this->load->view('user/Header',$data);
        $this->load->view('user/Google_auth');
        $this->load->view('user/Footer');
    }
    function logout()
    {
        unset($_SESSION['tpi']);
        unset($_SESSION['tpi_user_id']);
        unset($_SESSION['tpi_OrignlEthbal']);
        unset($_SESSION['tpi_Useraddress']);
        //session_destroy();
        redirect(base_url('user/login'));
    }
    function success()
    {
 require '/var/www/html/bitcoin-wallet/GoogleAuthenticator/vendor/autoload.php';
      //  require 'vendor/autoload.php';
        $authenticator = new PHPGangsta_GoogleAuthenticator();
        $user_id = $_SESSION['tpi_user_id'];
        $return1 = $this->_custom_query("select * from user WHERE id = $user_id");
        $secret= $return1->result()[0]->secret_key;
        $sender_id = $return1->result()[0]->unique_id;
        // echo $secret;die;
//        $secret = 'TDT65VUOI7GATRAT'; //This is used to generate QR code
//        $otp = $this->uri->segment(3);//Generated by Authenticator.
        $otp = $this->input->post('qrcode');
        $tolerance = 0;
        //Every otp is valid for 30 sec.
        // If somebody provides OTP at 29th sec, by the time it reaches the server OTP is expired.
        //So we can give tolerance =1, it will check current  & previous OTP.
        // tolerance =2, verifies current and last two OTPS
        $checkResult = $authenticator->verifyCode($secret, $otp, $tolerance);
        if ($checkResult)
        {
            $return = $this->_custom_query("select internal from fees where coin_type='b'");
           $fee =  $return->result()[0]->internal;
          echo $fee;
          $amount = $_SESSION['tpi_int_amount'];
           $fee_amount = $amount - $fee;
           $user_bal = $return1->result()[0]->balance_btc;
           $user_main_bal = $user_bal - $amount;
           $coin_type = $_SESSION['tpi_coin_type'];
           $receiver_id = $_SESSION['tpi_receiver_id'];
           $return_re = $this->_custom_query("select * from user where unique_id = $receiver_id");
           $re_bal = $return_re->result()[0]->balance_btc;
           $rec_main_bal = $re_bal + $fee_amount;
           $this->_custom_query("update user set balance_btc = $user_main_bal WHERE  id= $user_id");
           $this->_custom_query("update user set balance_btc = $rec_main_bal WHERE  unique_id= $receiver_id");
           $this->_custom_query("insert into internal_transaction (sender_id,	receiver_id,amount,fees,coin_type) VALUES 
                               ('$sender_id','$receiver_id','$amount','$fee','$coin_type')");
            $msg = "Transaction Successful";
            $value = '<div class="alert alert-success" style="color: green">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('internal_tran'));
        } else {
            $msg = "Transaction Failed";
            $value = '<div class="alert alert-danger" style="color: red">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('internal_tran'));
        }
    }
    public function login()
    {
        $username = $this->input->post('username',TRUE);
        $password = $this->input->post('password',TRUE);
        $submit = $this->input->post('submit',TRUE);
        $this->load->library('form_validation');
        if($submit == 'login')
        {
            $this->form_validation->set_rules('username','username','trim|required');
            $this->form_validation->set_rules('password','password','trim|required');
            if($this->form_validation->run() == True)
            {
                //check if username and password is correct
                $usr_result = $this->_get_user($username, $password);
                $user_data = $usr_result->result();
                if($user_data[0]->active > 1)
                {
                    $msg = "You are inactive by admin. Please contact our customer executive!";
                    $value = '<div class="alert alert-danger">' . $msg . '</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect(base_url('user/login'));
                }
                if ($user_data[0]->id > 0) //active user record is present
                {
                    //set the session variables
                    $sessiondata = array(
                        //get user id here
                        'tpi'=>true,
                        'tpi_user_id'=>$user_data[0]->id,
                        'tpi_email' => $username,
                        'tpi_total_balance' => $user_data[0]->token_amt
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect(base_url("user/dashboard"));
                }
                else
                {
                    $msg = "Invalid username and password!";
                    $value = '<div class="alert alert-danger">' . $msg . '</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect(base_url('user/login'));
                }
            }
        }
        $data['flash'] = $this->session->flashdata('item');
        $data['title']='Login';
        $this->load->view('user/Login',$data);
    }
    function _get_user($usr, $pwd)
    {
        $pwd = $this->_password($pwd);
        $query = "select * from user where email = '" . $usr . "' and password = '" . $pwd . "'";
        $query = $this->_custom_query($query);
        return $query;
    }
    function signup()
    {
        $this->load->library('form_validation');
        header("Cache-Control: no cache");
        session_cache_limiter("private_no_expire");
        $submit = $this->input->post('register', TRUE);
        $email = $this->input->post('email',true);
        if($submit == 'Submit')
        {
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('password_confirmation','Confirm Password','trim|required|matches[password]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
            if($this->form_validation->run() == TRUE)
            {
                $data = $this->_get_data_from_post();
                $return = $this->_custom_query("select MAX(id) as id from user");
                $u_id = $return->result()[0]->id;
                $data['unique_id'] =  mt_rand(1000,9999).str_pad($u_id,6,"0",STR_PAD_LEFT);
                $this->_insert($data);
                $return = $this->_custom_query("select * from user where email = '$email' ORDER  by id DESC");
                $id = $return->result()[0]->id;
                $total_balance = $return->result()[0]->token_amt;
                $sessiondata = array(
                    //get user id here
                    'tpi'=>true,
                    'tpi_user_id'=>$id,
                    'tpi_email' => $email,
                    'tpi_total_balance'=>$total_balance
                );
                $this->session->set_userdata($sessiondata);
                    //Generate eth wallet address
                        $user_id = $_SESSION['tpi_user_id'];
                       // $token = '0ed7eba50c5c43f3821046a01b510ee0';
                      $url = "http://localhost:3013/api/createEtherAccount";
                      $ch = curl_init($url);
                      curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
                      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
                      //curl_setopt($ch,CURLOPT_POST,1);
                      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                      $output = curl_exec($ch);
                      curl_close($ch);
                      $x = substr(substr($output, 1),0,-1);
                      //$result_data = json_decode($output, true);
                      $query = $this->_custom_query("INSERT INTO address(user_id,address,coin_type) VALUES('$user_id','$x','e')");
                    //Generate eth wallet address END
                $msg = 'User Register Successfully';
                $value = '<div class="alert alert-success">' . $msg . '</div>';
                $this->session->set_flashdata('item', $value);
                redirect(base_url('user/Dashboard'));
            }
        }
        $data = $this->_get_data_from_post();
        $data['title']='Signup';
        $this->load->view('user/Signup');
    }
    function home()
    {
        $data['title']='home';
        $this->load->view('user/Header',$data);
        $this->load->view('user/Home');
        $this->load->view('user/Footer');
    }
    function user_profile(){
        $user_id = $_SESSION['tpi_user_id'];
        $query = $this->_custom_query("SELECT * FROM user WHERE id = '$user_id'");
        $data['profile'] = $query->row();
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'User Profile';
        $this->load->view('user/Header',$data);
        $this->load->view('user/Profile');
        $this->load->view('user/Footer');
    }
    function faq()
    {
        $data['title'] = 'FAQ';
        $this->load->view('user/Header',$data);
        $this->load->view('user/Faq');
        $this->load->view('user/Footer');
    }
    function external_transaction(){
        user_auth();
        $return = $this->_custom_query("select external from fees where coin_type = 'e'");
        $data['extrnl'] = $return->result()[0]->external;
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'External Transaction';
        $this->load->view('user/Header',$data);
        $this->load->view('user/External_transaction');
        $this->load->view('user/Footer');
    }
    function save_external_transaction()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('form');
        } else {
        $user_id = $_SESSION['tpi_user_id'];
        $query = $this->_custom_query("select * from user WHERE id = $user_id");
        $balance = $query->result()[0]->token_amt;
        if($balance == '0.000000')
        {
            $msg = "you have insufficient balance.";
            $value = '<div class="alert alert-danger" style="color: red">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('user/external_transaction'));
        }
        $amount = $this->input->post('amount',TRUE);
        if($amount > $balance )
        {
            $msg = "you have insufficient balance";
            $value = '<div class="alert alert-danger" style="color: red">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('user/external_transaction'));
        }
            $user_id = $_SESSION['tpi_user_id'];
            $return = $this->_custom_query("select * from address where user_id = $user_id");
            $from_address = $return->result()[0]->address;
            $coin_type = 'e';
            $add = $this->input->post('address');
            $fees = $this->input->post('fees');
            $new_amt = $amount;
            $query = $this->_custom_query("UPDATE user SET token_amt='$new_amt' WHERE id='$user_id'"); 
            $upbal = $new_amt.'00000000';
            $password = 'testing';
            $url = "http://localhost:3013/api/transferTo"; 
            $ch = curl_init($url);
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,"from=$from_address&to=$add&value=$upbal&password=$password");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            $output = curl_exec($ch);
            curl_close($ch); 
            $output = json_decode($output);
            $txn = $output->txn;
            
            if(empty($txn))
            {
                $msg = "Transaction Failed";
                $value = '<div class="alert alert-danger" style="color: red">' . $msg . '</div>';
                $this->session->set_flashdata('item', $value);
                redirect(base_url('user/external_transaction'));
            }
           
            $query = $this->_custom_query("INSERT INTO external_transaction(user_id,address,amount,fees,coin_type,transaction_id) VALUES('$user_id','$add','$amount','$fees','$coin_type','$txn')");
            $msg = "Transaction Successful";
            $value = '<div class="alert alert-success" style="color: green">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('user/external_transaction'));
        }
    }
    function change_password(){
        user_auth();
        $user_id = $_SESSION['tpi_user_id'];
        $query = $this->_custom_query("SELECT * FROM user WHERE id = '$user_id'");
        $data['profile'] = $query->row();
        $data['title'] = 'User Profile';
        $data['flash'] = $this->session->flashdata('item');
        $this->load->view('user/Header',$data);
        $this->load->view('user/Update_pass');
        $this->load->view('user/Footer');
    }
    function update_password(){
        $user_id = $_SESSION['tpi_user_id'];
        $old_pass = $this->input->post('old_pass');
        $old_pass1 = $this->_password($old_pass);
        $new_pass1 = $this->input->post('new_pass1');
        $new_pass2 = $this->input->post('new_pass2');
        $new_pass22 = $this->_password($new_pass2);
        $query = $this->_custom_query("SELECT password FROM user WHERE id = '$user_id'");
         $result = $query->result()[0]->password;
        if($old_pass1 == $result){
            if($new_pass1 != $new_pass2){
            $msg = "Confirm Password didn't match";
            $value = '<div class="alert alert-warning" style="color: green">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('user/change_password'));
        }else{
            $query = $this->_custom_query("UPDATE user SET password='$new_pass22' WHERE id = '$user_id'");
            $msg = "Password changed Successfully";
            $value = '<div class="alert alert-success" style="color: green">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('user/change_password'));
        }
        }else{
            $msg = "Password didn't match with the old one";
            $value = '<div class="alert alert-warning" style="color: green">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('user/change_password'));
        }
    }
    function update_name(){
        $name = $this->input->post('name');
        $user_id = $_SESSION['tpi_user_id'];
        $query = $this->_custom_query("UPDATE user SET name='$name' WHERE id = '$user_id'");
            $msg = "Name Updated Successfully";
            $value = '<div class="alert alert-success" style="color: green">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('user/user_profile'));
        }
        function token_amount(){
          $token = "";
          $url = "";
          $ch = curl_init($url);
          curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
          curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
          curl_setopt($ch,CURLOPT_POST,1);
          curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
          $ccc = curl_exec($ch);
          curl_close($ch);
          $json = json_decode($ccc, true);
          $token_amount = $json['amount'];
          //After getting the amount we will update users Token amount in database
          $user_id = $_SESSION['tpi_user_id'];
          $query = $this->_custom_query("UPDATE user SET token_amt='$token_amount' WHERE id = '$user_id'");
        }
function update_balance()
{
     
        $id = $_SESSION['tpi_user_id'];
        $return = $this->_custom_query("select * from address where user_id = $id");
        $x = $return->result()[0]->address;

        $url = "http://localhost:3013/api/getBalance";

        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"ether_address=$x" );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($ch);
        curl_close($ch);
        
        $x = json_decode($output);
        $balance = $x->balance;
      
        $this->_custom_query("update user set token_amt = $balance where id = $id");

        $_SESSION['tpi_total_balance'] = $balance;
        redirect(base_url('user/dashboard'));  
}
function exe_history(){
    user_auth();
    $user_id = $_SESSION['tpi_user_id'];
    $query = $this->_custom_query("SELECT * FROM external_transaction INNER JOIN user ON external_transaction.user_id=user.id WHERE user_id = '$user_id'");
    $data['ext_history'] = $query->result();
    $this->load->view('user/Header',$data);
    $this->load->view('user/External_history');
    $this->load->view('user/Footer');
}
    function _password($password = null)
    {
        $password = hash('sha256',$password.SALT);
        return  $password;
    }
    function _get_data_from_post()
    {
        $data['name']=$this->input->post('name',true);
        $data['password']=$this->_password($this->input->post('password',true));
        $data['email']=$this->input->post('email',true);
        return $data;
    }
    function _get_where($update_id)
    {
        $this->load->model('User_model');
        $return = $this->User_model->get_where($update_id);
        return $return;
    }
    function _get($order_by)
    {
        $this->load->model('User_model');
        $return = $this->User_model->get($order_by);
        return $return;
    }
    function _insert($data)
    {
        $this->load->model('User_model');
        $this->User_model->_insert($data);
    }
    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }
        $this->load->model('User_model');
        $this->User_model->_update($id, $data);
    }
    function _custom_query($query)
    {
        $this->load->model('User_model');
        return $this->User_model->_custom_query($query);
    }
}