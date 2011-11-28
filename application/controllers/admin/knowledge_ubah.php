<?php
class Knowledge_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Knowledge Ubah';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Knowledge Ubah';
        $data['content'] = 'admin/knowledge/knowledge_ubah';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>