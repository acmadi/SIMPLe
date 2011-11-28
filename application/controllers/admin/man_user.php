<?php
class Man_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Manajemen User';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Manajemen User';
        $data['content'] = 'admin/man_user/man_user';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>