<?php
class Ambil_dokumen extends CI_Controller
{

    function Ambil_dokumen()
    {
        parent::__construct();
    }

    var $title = 'Ambil Dokumen';

    function index()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        //$data['title'] = 'Ambil Dokumen';
        //$data['content'] = 'csd/ambil_dokumen';
        $this->load->view('csd/ambil_dokumen');
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>