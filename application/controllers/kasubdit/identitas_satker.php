<?php
class Identitas_satker extends CI_Controller
{

    function Identitas_satker()
    {
        parent::__construct();
    }

    var $title = 'Identitas SatKer';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Isi Identitas Satker';
        $data['content'] = 'kasubdit/identitas_satker';
        $this->load->view('new-template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>