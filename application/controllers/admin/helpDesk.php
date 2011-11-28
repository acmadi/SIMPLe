<?php
class HelpDesk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Help Desk';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Help Desk';
        $data['content'] = 'admin/helpDesk/helpDesk';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>