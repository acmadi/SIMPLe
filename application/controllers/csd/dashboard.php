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
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Dashboard';
        $data['content'] = 'csd/dashboard';
        $this->load->view('new-template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>