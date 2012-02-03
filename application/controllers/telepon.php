<?php
class Telepon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = $this->db->query("SELECT * FROM tb_telepon");

        $data['telepon'] = $result;
        $data['title'] = 'Daftar Telepon';
        $data['content'] = 'telepon/index';
        $this->load->view('new-template', $data);
    }
}