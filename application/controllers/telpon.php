<?php
class Telpon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = $this->db->query("SELECT * FROM tb_telpon");

        $data['telpon'] = $result;
        $data['title'] = 'Daftar Telpon';
        $data['content'] = 'telpon/index';
        $this->load->view('new-template', $data);
    }
}