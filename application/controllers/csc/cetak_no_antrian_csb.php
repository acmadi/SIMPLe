<?php
class Cetak_no_antrian_csb extends CI_Controller
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
        $data['antrian'] = $this->msatker->antrian_terakhir('B');
        $data['title'] = 'Cetak No Antrian';
        $data['content'] = 'csc/cetak_no_antrian_csb';
        $this->load->view('master-template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>