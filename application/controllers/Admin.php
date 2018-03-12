<?php


class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function dashboard()
    {
        admin_auth();
        $data['title'] = 'Dashboard';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Dashboard');
        $this->load->view('admin/Footer');
    }
    function fees()
    {
        admin_auth();
        $submit = $this->input->post('submit',TRUE);
        // $internal = $this->input->post('internal',true);
        $external = $this->input->post('external',true);
        $fee_id = $this->input->post('id');

        if($submit == 'submit')
        {
           $internal = (float)$internal;
           $external = (float)$external;
           $admin_id = $_SESSION['tpi_admin_id'];

           $this->_custom_query("update fees set external = $external,updated_by=$admin_id where id = '2'");
           $msg = "Fees Updated successfully!";
           $value = '<div class="alert alert-success">' . $msg . '</div>';
           $this->session->set_flashdata('item', $value);
           redirect(base_url('admin/fees'));
        }

        $query = $this->_custom_query("select * from fees");
        $data['result'] = $query->result();
        $data['date_of_updation'] = $query->result()[0]->date_of_updation;

        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Fees';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Fees');
        $this->load->view('admin/Footer');

    }
    function login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $submit = $this->input->post('submit', TRUE);
        $this->load->library('form_validation');
        if ($submit == 'login') {

            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            if ($this->form_validation->run() == True) {
                //check if username and password is correct
                $usr_result = $this->_get_user($username, $password);
                $user_data = $usr_result->result();

                if ($user_data[0]->id > 0) //active user record is present
                {
                    //set the session variables
                    $sessiondata = array(
                        //get user id here
                        'admin_tpi'=>true,
                        'tpi_admin_id' => $user_data[0]->id,
                        'tpi_admin_email' => $username
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect(base_url("admin/external"));
                } else
                {
                    $msg = "Invalid username and password!";
                    $value = '<div class="alert alert-danger">' . $msg . '</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect(base_url('admin/login'));
                }
            }
        }
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Login';

        $this->load->view('admin/Login',$data);
    }

    function external()
    {
        admin_auth();
        $data['return'] = $this->_custom_query("select external_transaction.id as exe_id,external_transaction.coin_type,user.unique_id,external_transaction.address,external_transaction.amount,external_transaction.fees,external_transaction.date_of_creation from external_transaction 
inner join user 
on external_transaction.user_id = user.id  where  status=0");
        $data['title'] = 'External Transaction';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/External');
        $this->load->view('admin/Footer');
    }
    function exe_action()
    {
        admin_auth();
        $status = $this->input->post('status');
        $transaction_id = $this->input->post('transaction_id');

        $update_id = $this->uri->segment(3);
        if(is_numeric($update_id))
        {
            $this->_custom_query("update external_transaction set status = $status,transaction_id='$transaction_id' where external_transaction.id = $update_id");
            redirect(base_url('admin/external'));
        }
    }
    function ext_edit()
    {
        admin_auth();
        $update_id = $this->uri->segment(3);
        $data['title'] = 'External edit';
        $data['update_id']=$update_id;
        if(is_numeric($update_id))
        {
           $this->load->view('admin/Header',$data);
           $this->load->view('admin/Exe_edit');
           $this->load->view('admin/Footer');

        }else
        {
            redirect(base_url('admin/external'));
        }
    }

    function view_user(){
        admin_auth();
        $data['title'] = 'View User';
        $query = $this->_custom_query("SELECT * FROM user");
        $data['result'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/View_user');
        $this->load->view('admin/Footer');
    }

    function external_txn_history(){
        admin_auth();
        $data['title'] = 'External Transaction History';
       $query = $this->_custom_query("select external_transaction.id as exe_id,external_transaction.coin_type, user.unique_id,external_transaction.address,external_transaction.amount,external_transaction.fees,external_transaction.date_of_creation from external_transaction 
inner join user 
on external_transaction.user_id = user.id");
       $data['result'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Ext_trn_history');
        $this->load->view('admin/Footer');
    }

    function view_btc_address(){
        admin_auth();
        $query = $this->_custom_query("SELECT address.address, address.coin_type, address.public, address.private, user.name FROM address INNER JOIN user ON address.user_id = user.id WHERE address.coin_type='b'");
        $data['address'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/View_addresses');
        $this->load->view('admin/Footer');
    }

    function view_ltc_address(){
        admin_auth();
        $query = $this->_custom_query("SELECT address.address, address.coin_type, address.public, address.private, user.name FROM address INNER JOIN user ON address.user_id = user.id WHERE address.coin_type='l'");
        $data['address'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/View_addresses');
        $this->load->view('admin/Footer');
    }

    function view_eth_address(){
        admin_auth();
        $query = $this->_custom_query("SELECT address.address, address.coin_type, address.public, address.private, user.name FROM address INNER JOIN user ON address.user_id = user.id WHERE address.coin_type='e'");
        $data['address'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/View_addresses');
        $this->load->view('admin/Footer');
    }

    function logout()
    {
         unset($_SESSION['admin_tpi']);
          unset($_SESSION['tpi_admin_id']);
        redirect(base_url('admin/login'));
    }
    function _get_user($usr, $pwd)
    {
        $pwd = $this->_password($pwd);
        $query = "select * from admin where username = '" . $usr . "' and password = '" . $pwd . "'";
        $query = $this->_custom_query($query);
        return $query;
    }
    function _password($password = null)
    {
        $password = hash('sha256',$password.SALT);
        return  $password;
    }
    function _get_where($update_id)
    {
        $this->load->model('Admin_model');
        $return = $this->Admin_model->get_where($update_id);
        return $return;
    }

    function _get($order_by)
    {
        $this->load->model('Admin_model');
        $return = $this->Admin_model->get($order_by);
        return $return;
    }

    function _insert($data)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('Admin_model');
        $this->Admin_model->_update($id, $data);
    }

    function _custom_query($query)
    {
        $this->load->model('Admin_model');
        return $this->Admin_model->_custom_query($query);
    }
}