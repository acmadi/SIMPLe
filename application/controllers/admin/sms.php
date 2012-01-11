<?php
class Sms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->outbox();
    }

    public function outbox()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'admin/sms/outbox';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/sms';
        $bc[1]->label = 'SMS Keluar';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function inbox()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'admin/sms/inbox';
        $this->load->view('admin/template', $data);
    }
}