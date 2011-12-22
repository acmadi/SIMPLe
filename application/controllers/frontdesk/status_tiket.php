<?php
class Status_tiket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
        $sql = "SELECT * FROM tb_tiket_frontdesk
                JOIN tb_satker
                ON tb_satker.id_satker = tb_tiket_frontdesk.id_satker
                ORDER BY status";

        $result = $this->db->query($sql);

        $data['dokumen'] = $result;

        $data['title'] = 'Status Tiket';
        $data['content'] = 'frontdesk/status_tiket';
        $this->load->view('master-template', $data);
    }
}