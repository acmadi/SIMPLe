<?php
class Cek_tiket extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        
    }

    function view($id)
    {
        $data['title'] = 'Cek Tiket';
        $data['content'] = 'pelaksana/cek_tiket';
        $sql = "SELECT *
                FROM tb_tiket_frontdesk
                JOIN tb_petugas_satker
                ON tb_tiket_frontdesk.id_petugas_satker = tb_petugas_satker.id_petugas_satker
                JOIN tb_satker
                ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker
                WHERE no_tiket_frontdesk = ?";

        $result = $this->db->query($sql, array($id));
        $result = $result->result();
        $result = $result[0];
        $data['tiket'] = $result;

        $this->load->view('pelaksana/template', $data);
    }
}

?>