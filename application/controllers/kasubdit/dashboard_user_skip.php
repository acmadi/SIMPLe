<?php
class Dashboard_user_skip extends CI_Controller
{

    function Dashboard_user_skip()
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
        $data['content'] = 'kasubdit/dashboard_skip';
        $this->load->view('master-template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>