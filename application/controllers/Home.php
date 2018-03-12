<?php


class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $data['title']='home';
        $this->load->view('user/Header_1',$data);
        $this->load->view('user/Home');
        $this->load->view('user/Footer_1');
    }
    function test()
    {
        $this->load->view('user/Test');
    }
}