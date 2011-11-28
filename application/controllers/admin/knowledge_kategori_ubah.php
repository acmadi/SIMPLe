<?php
class Knowledge_kategori_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Knowledge / Kategori / Ubah';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Knowledge / Kategori / Ubah';
        $data['content'] = 'admin/knowledge/knowledge_kategori_ubah';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>