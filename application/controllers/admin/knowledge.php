<?php
class Knowledge extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Knowledge';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Knowledge';
        $data['content'] = 'admin/knowledge/knowledge';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>