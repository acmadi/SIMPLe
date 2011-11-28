<?php
class Man_unit_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Manajemen Unit - Ubah Data';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Manajemen Unit - Ubah Data';
        $data['content'] = 'admin/man_unit/man_unit_ubah';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>