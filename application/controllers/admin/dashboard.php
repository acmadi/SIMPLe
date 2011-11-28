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
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Dashboard';
        $data['content'] = 'admin/dashboard';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>