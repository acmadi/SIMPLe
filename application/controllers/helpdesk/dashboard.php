<?php
class Dashboard extends CI_Controller
{

    function Dasboard()
    {
        parent::__construct();
    }

    var $title = 'Dashboard';

    function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'helpdesk/dashboard';
        $this->load->view('master-template', $data);
    }
}

?>