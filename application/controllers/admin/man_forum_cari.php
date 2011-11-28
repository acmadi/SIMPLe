<?php
class Man_forum_cari extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Manajemen Forum';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'admin/man_forum/man_forum_cari';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>