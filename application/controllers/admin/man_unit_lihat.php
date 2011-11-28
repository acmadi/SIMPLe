<?php
class Man_unit_lihat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Manajemen Unit - Lihat Data';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Manajemen Unit - Ubah Data';
        $data['content'] = 'admin/man_unit/man_unit_lihat';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>