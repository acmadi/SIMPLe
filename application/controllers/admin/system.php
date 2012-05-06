<?php
class System extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'System';
        $data['content'] = 'admin/system';

        $bc = array();
        @$bc[0]->link = 'admin/dashboard';
        @$bc[0]->label = 'Home';
        @$bc[1]->link = 'admin/system';
        @$bc[1]->label = 'Sistem';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
}