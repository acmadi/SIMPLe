<?php
class List_antrian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'List Antrian';
        $data['content'] = $this->load->view('csa/template', $data);
    }
}