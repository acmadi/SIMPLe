<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('msatker');
    }

    var $title = 'Dashboard';

    function index()
    {
        redirect('/csc/form_revisi_anggaran');
        $this->_plusone();

        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['antrian_csa'] = $this->msatker->antrian_terakhir('A');
        $data['antrian_csb'] = $this->msatker->antrian_terakhir('B');
        $data['antrian_csc'] = $this->msatker->antrian_terakhir('C');
        $data['antrian_csd'] = $this->msatker->antrian_terakhir('D');
        $data['antrian_cse'] = $this->msatker->antrian_terakhir('E');

        $data['title'] = 'Dashboard';
        $data['content'] = 'csc/dashboard';
        $this->load->view('csc/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
    }

    protected function _plusone()
    {
        $referer = $_SERVER['HTTP_REFERER'];
        if (preg_match("/cetak_no_antrian_cs/", $referer)) {
            $cs = explode('cetak_no_antrian_cs', $referer);
            $this->msatker->plusone(strtoupper($cs[1]));
        }
    }
}

?>