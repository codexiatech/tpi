<?php
//require 'vendor1/autoload.php';
//use Coinbase\Wallet\Client;
//use Coinbase\Wallet\Configuration;
//use Coinbase\Wallet\Resource\Address;
class User_address extends CI_controller{
    public function __construct()
    {
        parent::__construct();
    }
    function add_address()
    {
        user_auth();
//        $apiKey = 'EhxO4Zwq0omXYghF';
//        $apiSecret = 'k4f2nnmwgpXHD914nNKUJFQZ9zz918Qe';
//        $configuration = Configuration::apiKey($apiKey, $apiSecret);
//        $client = Client::create($configuration);
//
//        $accounts = $client->getAccounts();
//        foreach ($accounts as &$account)
//        {
//
//        }
////        foreach ($accounts as &$account) {
////            $balance = $account->getBalance();
//// //            echo $account->getName() . ": " . $balance->getAmount() . $balance->getCurrency() .  "\r\n";
//// //            print_r($client->getAccountTransactions($account));
////        }
//
//
//        $address = new Address();
//        $client->createAccountAddress($account, $address);
//
//        $address = $address->getAddress();


        //set parameters
       

     /*   $api_key = "d0a2ab87-9291-4e84-965c-5648b2dd0fef";
        $xpub = "xpub6BiBiLo5gHsCLvp8cjB6A71LJHKddci1zyuDypwAj4b32gEoe7DqNCyA2Y2wGPP5XCsLRZg23VQxPeHknHHyRketovbx7naa2HJivmapigH";
        $secret = "shivam_singh"; //this can be anything you want
        $rootURL = "http://18.220.128.238/"; //example https://mysite.org  or http://yourhomepage.com/store
        $orderID = uniqid();
    */
//call blockchain info receive payments API
        // $callback_url = $rootURL."/index.php?invoice=".$orderID."&secret=".$secret;
        // $receive_url = "https://api.blockchain.info/v2/receive?key=".$api_key."&xpub=".$xpub."&callback=".urlencode($callback_url);



        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_URL, $receive_url);

        $token = '0ed7eba50c5c43f3821046a01b510ee0';

        $url = "https://api.blockcypher.com/v1/eth/main/addrs?token=".$token."";

        $ch = curl_init($url);
      curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
      curl_setopt($ch,CURLOPT_POST,1);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      $ccc = curl_exec($ch);
      curl_close($ch);
    
        $json = json_decode($ccc, true);
       
         $address = $json['address']; //the newly created address will be stored under 'address' in the JSON response
        
         $private = $json['private'];
        
         $public = $json['public'];
        $user_id = $_SESSION['tpi_user_id'];
        $this->_custom_query("INSERT INTO `address`(`user_id`, `address`,`coin_type`,`public`,`private`) VALUES ('$user_id','$address','b','$public','$private')");


        $msg = 'Address saved Successfully';
        $value = '<div style="color: darkgreen;" class="alert alert-success">' . $msg . '</div>';
        $this->session->set_flashdata('item', $value);
        redirect(base_url('user_address'));
    }

    // function add_eth_add(){
    //     user_auth();
    //     $user_id = $_SESSION['user_id'];
    //     $token = '0ed7eba50c5c43f3821046a01b510ee0';

    //     $url = "https://api.blockcypher.com/v1/eth/main/addrs?token=".$token."";

    //   $ch = curl_init($url);
    //   curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
    //   curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
    //   curl_setopt($ch,CURLOPT_POST,1);
    //   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    //   $output = curl_exec($ch);
    //   curl_close($ch);

    //   $result_data = json_decode($output, true);
    //   $private = $result_data['private'];
    
    //   $public = $result_data['public'];
      
    //    $address = '0x'.$result_data['address']; 
      
    //   $query = $this->_custom_query("INSERT INTO address(user_id,address,coin_type,public,private) VALUES('$user_id','$address','e','$public','$private')");

    //   $msg = 'New Ethereum Address saved Successfully';
    //     $value = '<div style="color: darkgreen;" class="alert alert-success">' . $msg . '</div>';
    //     $this->session->set_flashdata('item', $value);
    //     redirect(base_url('user_address'));
    // }

     function add_ltc_add(){
        user_auth();
        $user_id = $_SESSION['tpi_user_id'];
        $token = '0ed7eba50c5c43f3821046a01b510ee0';

        $url = "https://api.blockcypher.com/v1/ltc/main/addrs?token=".$token."";

      $ch = curl_init($url);
      curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
      curl_setopt($ch,CURLOPT_POST,1);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      $output = curl_exec($ch);
      curl_close($ch);

      $result_data = json_decode($output, true);
      $private = $result_data['private'];
    
      $public = $result_data['public'];
      
       $address = $result_data['address']; 
      
      $query = $this->_custom_query("INSERT INTO address(user_id,address,coin_type,public,private) VALUES('$user_id','$address','l','$public','$private')");

      $msg = 'New Litecoin Address saved Successfully';
        $value = '<div style="color: darkgreen;" class="alert alert-success">' . $msg . '</div>';
        $this->session->set_flashdata('item', $value);
        redirect(base_url('user_address'));
    }


    function index(){
        user_auth();
        $user_id = $_SESSION['tpi_user_id'];
        $return3 = $this->_custom_query("SELECT * FROM address WHERE user_id='$user_id ' AND coin_type='e' order by date_of_creation DESC ");
        
        // $add_txns = $this->_custom_query("SELECT * FROM address WHERE user_id='$user_id'");
        
        // foreach($add_txns->result() as $all_txns){
        //     $add = $all_txns->address;

        //     $url = "https://blockchain.info/address/".$add."?format=json";
            

        //     $json = json_decode(file_get_contents($url), true);
        //     $total_txns = $json['n_tx'];
        //     for($i=0; $i<$total_txns; $i++){
        //         echo $hash=$json["txs"][$i]["hash"];
        //         echo '<br>';
        //         $n_inputs = count($json["txs"][$i]["inputs"]);
        //         echo 'SENT FROM';
        //         echo '<br>';
        //         echo '<br>';
        //         echo '<br>';
        //        for($j = 0; $j<$n_inputs; $j++){
        //          $value = $json["txs"][$i]["inputs"][$j]["prev_out"]["value"];
        //          $in_add =  $json["txs"][$i]["inputs"][$j]["prev_out"]["addr"];
        //          echo number_format($value/100000000,8) .'=='.$in_add;
        //          echo '<br>';
        //        }
        //            $n_outputs = count($json["txs"][$i]["out"]);  
            
        //     echo '<br>';
        //     echo 'SENT TO';
        //     echo '<br>';
        //     echo '<br>';
        //     echo '<br>';
        //     for($k=0; $k<$n_outputs; $k++){
        //         $out_val =  $json["txs"][$i]["out"][$k]["value"];
        //         $out_add =  $json["txs"][$i]["out"][$k]["addr"];
        //         echo number_format($out_val/100000000,8) .'=='.$out_add;
        //         echo '<br>';
        //     }
        //     }
        //     echo '<hr>';

        // }
        // exit();

        $data['address3']= $return3->result();
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Address';
        $this->load->view('user/Header',$data);
        $this->load->view('user/Address');
        $this->load->view('user/Footer');
    }
    function insrt_add(){
        if($this->input->post('submit')){
            $user_id = $_SESSION['tpi_user_id'];
            $address = trim($this->input->post('add'));
            $query = $this->_custom_query("INSERT INTO `address`(`user_id`, `address`) VALUES ('$user_id','$address')");
            $msg = 'Address saved Successfully';
            $value = '<div style="color: darkgreen;" class="alert alert-success">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('user_address'));
        }

    }
    function delete_add(){
        $id = $_GET['id'];
        $query = $this->_custom_query("DELETE FROM address WHERE id = '$id'");
        $msg = 'Address deleted Successfully';
        $value = '<div style="color: darkgreen;" class="alert alert-success">' . $msg . '</div>';
        $this->session->set_flashdata('item', $value);
        redirect(base_url('user_address'));
    }

    function get_add(){
        $id = $_GET['id'];
        $return = $this->_custom_query("SELECT * FROM address WHERE id = '$id'");
        $data['add'] = $return->result()[0]->address;
        $this->load->view('user/Header');
        $this->load->view('user/Update_address',$data);
        $this->load->view('user/Footer');
    }

    function edit_add(){
        $id = $_GET['id'];
        $add = trim($this->input->post('add'));
        $return = $this->_custom_query("UPDATE address SET address = '$add' WHERE id='$id'");
        $msg = 'Address Updated Successfully';
        $value = '<div style="color: darkgreen;" class="alert alert-success">' . $msg . '</div>';
        $this->session->set_flashdata('item', $value);
        redirect(base_url('user_address'));

    }

    function _get_where($update_id)
    {
        $this->load->model('Address_model');
        $return = $this->Address_model->get_where($update_id);
        return $return;
    }
    function _get($order_by)
    {
        $this->load->model('Address_model');
        $return = $this->Address_model->get($order_by);
        return $return;
    }
    function _insert($data)
    {
        $this->load->model('Address_model');
        $this->Address_model->_insert($data);
    }
    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('Address_model');
        $this->Address_model->_update($id, $data);
    }
    function _custom_query($query)
    {
        $this->load->model('Address_model');
        return $this->Address_model->_custom_query($query);
    }

}
?>