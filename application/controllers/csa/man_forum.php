<?php
class Man_forum extends CI_Controller
{

    function Man_forum()
    {
        parent::__construct();
    }

    var $title = 'Manajemen Forum';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'csa/man_forum/man_forum';
        $this->load->view('csa/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>