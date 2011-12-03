<?php
class Identitas_satker extends CI_Controller
{

    function Identitas_satker()
    {
        parent::__construct();
        $this->load->model('msatker', 'satker');
    }

    var $title = 'Identitas SatKer';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/

        $dt['no_tiket'] = $this->satker->antrian_terakhir('E');
        $data['title'] = 'Isi Identitas Satker';
        $data['content_html'] = $this->load->view('cse/identitas_satker', $dt, TRUE);
        $this->load->view('cse/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>