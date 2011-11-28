<?php
class Helpdesk_form_pertanyaan_lanjut extends CI_Controller
{

    function Helpdesk_form_pertanyaan_lanjut()
    {
        parent::__construct();
    }

    var $title = 'Helpdesk Form - Pertanyaan';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Helpdesk Form - Pertanyaan';
        $data['content'] = 'csa/helpdesk/helpdesk_form_pertanyaan_lanjut';
        $this->load->view('csa/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>