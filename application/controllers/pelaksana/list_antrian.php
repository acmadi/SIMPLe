<?php
class List_antrian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title'] = 'List Antrian';
        $data['content'] = 'pelaksana/list_antrian';
        $sql = "SELECT * FROM tb_tiket_frontdesk JOIN tb_satker
                ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker

                WHERE status = 'open'";
        $data['antrian'] = $this->db->query($sql);
        $this->load->view('master-template', $data);
    }
}