<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk');
        $this->load->model('msatker');
    }

    var $title = 'Dashboard';

    function index()
    {
		$data['jml_tiket_skrg'] = $this->mfrontdesk->get_jml_tkt_hr_ini();
		$data['jml_tiket_proses'] = $this->mfrontdesk->get_jml_tiket_proses();
		$data['jml_tiket_selesai'] = $this->mfrontdesk->get_jml_dokumen_selesai();
		$data['jml_tiket_kembali'] = $this->mfrontdesk->get_jml_dokumen_kembali();
        $data['title'] = 'Dashboard';
        $data['content'] = 'frontdesk/dashboard';
        $this->load->view('new-template', $data);
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