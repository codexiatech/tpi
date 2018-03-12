<?php

class Internal_tran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function send()
    {
        user_auth();
        $user_id = $_SESSION['tpi_user_id'];
        $coin_type = $this->input->post('coin_type',TRUE);

        if($coin_type == 'b')
        {
            $query = $this->_custom_query("select * from user WHERE id = $user_id");
            $balance = $query->result()[0]->balance_btc;
        }
        elseif ($coin_type == 'e')
        {
            $query = $this->_custom_query("select * from user WHERE id = $user_id");
            $balance = $query->result()[0]->balance_eth;
        }
        elseif($coin_type == 'l')
        {
            $query = $this->_custom_query("select * from user WHERE id = $user_id");
            $balance = $query->result()[0]->balance_ltc;
        }

        if($balance == '0.000000')
        {
            $msg = "you have insufficient balance";
            $value = '<div class="alert alert-danger" style="color: red">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('internal_tran'));
        }
        $receiver_id = $this->input->post('receiver_id',TRUE);
        if(empty($receiver_id))
        {
            $msg = "Please fill receiver's id";
            $value = '<div class="alert alert-danger" style="color: red">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('internal_tran'));
        }

        $query = $this->_custom_query("select * from user where unique_id = $receiver_id");

        if(count($query->result()) < 1)
        {
            $msg = "This Receiver id is not found in the database please try again";
            $value = '<div class="alert alert-danger" style="color: red">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('internal_tran'));
        }

        if(!is_numeric($receiver_id))
        {
            redirect(base_url());
        }
        $amount = $this->input->post('amount',TRUE);
        if($amount > $balance )
        {
            $msg = "you have insufficient balance";
            $value = '<div class="alert alert-danger" style="color: red">' . $msg . '</div>';
            $this->session->set_flashdata('item', $value);
            redirect(base_url('internal_tran'));
        }
        $_SESSION['tpi_coin_type'] = $coin_type;
        $_SESSION['tpi_int_amount'] = $amount;
        $_SESSION['tpi_receiver_id'] = $receiver_id;
        redirect(base_url('user'));

    }
    function history()
    {
        user_auth();
        $id = $_SESSION['tpi_user_id'];
        $data['return']=$this->_custom_query("select * from user
        inner join internal_transaction
        on internal_transaction.sender_id = user.unique_id
        where user.id = $id");
        $data['title']='Internal History';
        $this->load->view('user/Header',$data);
        $this->load->view('user/Internal_history');
        $this->load->view('user/Footer');
    }
    function coin_type()
    {
        $coin_value = $this->input->post('coin_value',TRUE);

        $return = $this->_custom_query("select internal from fees where coin_type = '$coin_value'");

        foreach ($return->result() as $row)
        {
            echo $row->internal;
        }
    }
    function index()
    {

        $return = $this->_custom_query("select internal from fees where coin_type = 'b'");

        $data['internal'] = $return->result()[0]->internal;
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Internal Transaction';
        $this->load->view('user/Header',$data);
        $this->load->view('user/Internal_tran');
        $this->load->view('user/Footer');
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