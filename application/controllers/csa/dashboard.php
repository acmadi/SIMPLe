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
        $data['content'] = 'csa/dashboard';
        $this->load->view('csa/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
        redirect('/csa/identitas_satker');  
    }
}

?>