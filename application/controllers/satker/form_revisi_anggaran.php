<?php
class Form_revisi_anggaran extends CI_Controller
{

    function Form_revisi_anggaran()
    {
        parent::__construct();
    }

    var $title = 'Form Revisi Anggaran';

    function index()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Form Revisi Anggaran';
        $data['content'] = 'satker/form_revisi_anggaran';
        $this->load->view('satker/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>