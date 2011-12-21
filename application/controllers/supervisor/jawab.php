<?php
class Jawab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id)
    {
        $sql = "SELECT *
                FROM tb_tiket_helpdesk
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_satker = tb_petugas_satker.id_satker
                WHERE no_tiket_helpdesk = '{$id}'";

        $result = $this->db->query($sql);
        $result = $result->result();
        $result = $result[0];

        $data['title'] = 'Supervisor Jawab';
        $data['content'] = 'supervisor/jawab';

        $data['pertanyaan'] = $result;
        $this->load->view('master-template', $data);
    }
}