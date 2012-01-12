<?php
class Helpdesk_saluran_pengaduan extends CI_Controller
{

    function Helpdesk_saluran_pengaduan()
    {
        parent::__construct();
    }

    var $title = 'Helpdesk Form - Saluran Pengaduan';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Helpdesk Form - Saluran Pengaduan';
        $data['content'] = 'helpdesk/helpdesk/helpdesk_saluran_pengaduan';
        $this->load->view('new-template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>