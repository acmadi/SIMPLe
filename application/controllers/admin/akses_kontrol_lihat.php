<?php
class Akses_kontrol_lihat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Akses Kontrol - Lihat';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Akses Kontrol - Lihat';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol_lihat';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>