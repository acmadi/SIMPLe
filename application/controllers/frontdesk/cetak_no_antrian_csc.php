<?php
class Cetak_no_antrian_csc extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Cetak No Antrian';

    function index()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $this->load->model('msatker');
        $data['antrian'] = $this->msatker->antrian_terakhir('C');
        $data['title'] = 'Cetak No Antrian';
        $data['content'] = 'frontdesk/cetak_no_antrian_csc';
        $this->load->view('new-template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>