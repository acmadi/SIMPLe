<?php
class Cek_tiket extends CI_Controller
{

    function Cek_tiket()
    {
        parent::__construct();
    }

    var $title = 'Cek Tiket';

    function index()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Cek Tiket';
        $data['content'] = 'csc/cek_tiket';
        $this->load->view('csc/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>