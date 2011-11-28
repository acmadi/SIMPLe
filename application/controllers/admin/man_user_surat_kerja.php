<?php
class Man_user_surat_kerja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Manajemen User - Surat Kerja';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Manajemen User - Surat Kerja';
        $data['content'] = 'admin/man_user/man_user_surat_kerja';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>