<?php
class Akses_kontrol_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Akses Kontrol - Ubah';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Akses Kontrol - Ubah';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol_ubah';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>