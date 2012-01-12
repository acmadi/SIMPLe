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