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
        $this->load->view('admin/template', $data);
    }

    public function inbox()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'admin/sms/inbox';
        $this->load->view('admin/template', $data);
    }
}