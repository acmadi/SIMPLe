<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'cs/dashboard';
        $this->load->view('new-template', $data);
    }
}