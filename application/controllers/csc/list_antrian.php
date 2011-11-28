<?php
class List_antrian extends CI_Controller
{

    function List_antrian()
    {
        parent::__construct();
    }

    var $title = 'List Antrian';

    function index()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'List Antrian';
        $data['content'] = 'csc/list_antrian';
        $this->load->view('csc/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }
}

?>