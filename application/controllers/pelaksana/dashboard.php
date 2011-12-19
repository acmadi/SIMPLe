<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk');
        $this->load->model('mhelpdesk');
    }

    function index()
    {
        $data['helpdesk_total'] = $this->mhelpdesk->count_all_tiket();
        $data['frontdesk_total'] = $this->mfrontdesk->count_all_tiket();

        $data['title'] = 'Dashboard';
        $data['content'] = 'pelaksana/dashboard';
        $this->load->view('pelaksana/template', $data);
    }
}

?>