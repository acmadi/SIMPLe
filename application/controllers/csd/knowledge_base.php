<?php
class Knowledge_base extends CI_Controller
{

    function Knowledge_base()
    {
        parent::__construct();
    }

    var $title = 'Knowledge Base';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Knowledge Base';
        $data['content'] = 'csd/knowledge_base';
        $this->load->view('master-template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>