<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        redirect('/pelaksana/list_antrian');
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Dashboard';
        $data['content'] = 'pelaksana/dashboard';
        $this->load->view('pelaksana/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>