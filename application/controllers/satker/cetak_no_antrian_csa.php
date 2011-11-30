<?php
class Cetak_no_antrian_csa extends CI_Controller
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
        $data['antrian'] = $this->msatker->antrian_terakhir('A');
        $data['title'] = 'Cetak No Antrian';
        $data['content'] = 'satker/cetak_no_antrian_csa';
        $this->load->view('satker/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>