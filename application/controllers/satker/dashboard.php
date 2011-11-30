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
        $this->load->model('msatker');
        $data['antrian_csa'] = $this->msatker->antrian_terakhir('A');
        $data['antrian_csb'] = $this->msatker->antrian_terakhir('B');
        $data['antrian_csc'] = $this->msatker->antrian_terakhir('C');
        $data['antrian_csd'] = $this->msatker->antrian_terakhir('D');
        $data['antrian_cse'] = $this->msatker->antrian_terakhir('E');
        
        $data['title'] = 'Dashboard';
        $data['content'] = 'satker/dashboard';
        $this->load->view('satker/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>