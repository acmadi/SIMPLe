<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
    }

    function index()
    {
        $data['helpdesk_total'] = $this->mhelpdesk->count_all_tiket();
        $data['total_selesai_oleh_cs'] = $this->mhelpdesk->count_all_closed_ticket_by();
        $data['title'] = 'Dashboard';
        $data['content'] = 'supervisor/dashboard';
        $this->load->view('master-template', $data);
    }
}