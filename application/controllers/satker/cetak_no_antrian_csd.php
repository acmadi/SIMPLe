<?php
class Cetak_no_antrian_csd extends CI_Controller
{

    function Cetak_no_antrian_csd()
    {
        parent::__construct();
    }

    var $title = 'Cetak No Antrian';

    function index()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Cetak No Antrian';
        $data['content'] = 'satker/cetak_no_antrian_csd';
        $this->load->view('satker/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>