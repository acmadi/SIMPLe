<?php
class FrontDesk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Front Desk';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Front Desk';
        $data['content'] = 'admin/frontDesk/frontDesk';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>