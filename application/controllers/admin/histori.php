<?php
class Histori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Histori';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Histori';
        $data['content'] = 'admin/histori/histori';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>