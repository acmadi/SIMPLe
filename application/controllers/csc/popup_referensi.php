<?php
class Popup_referensi extends CI_Controller
{

    function Popup_referensi()
    {
        parent::__construct();
    }

    var $title = 'Konsultasi Help Desk';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Konsultasi Help Desk';
        $this->load->view('csc/popup_referensi');
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>