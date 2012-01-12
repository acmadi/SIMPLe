<?php
class HelpDesk_referensi extends CI_Controller
{

    function HelpDesk_referensi()
    {
        parent::__construct();
    }

    var $title = 'Konsultasi Help Desk';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Konsultasi Help Desk';
        $data['content'] = 'kasubdit/helpDesk_referensi';
        $this->load->view('master-template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>