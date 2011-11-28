<?php
class HelpDesk extends CI_Controller
{

    function HelpDesk()
    {
        parent::__construct();
    }

    var $title = 'Konsultasi Help Desk';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Konsultasi Help Desk';
        $data['content'] = 'csc/helpDesk';
        $this->load->view('csc/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>