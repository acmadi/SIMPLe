<?php
class Halodja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk');
        $this->load->model('munit');
    }

    public function dashboard() {
        redirect('halodja/index');
    }

    public function index()
    {
        $data['content'] = '';
        $this->load->view('new-template', $data);
    }
}