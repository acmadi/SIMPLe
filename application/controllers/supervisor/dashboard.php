<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Dashboard';

    function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'supervisor/dashboard';
        $this->load->view('supervisor/template', $data);
    }
}