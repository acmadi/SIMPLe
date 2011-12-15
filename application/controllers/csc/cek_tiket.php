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
        $data['content'] = 'csc/cek_tiket';
        $sql = "SELECT tb_tiket_frontdesk.*, tb_satker.*, tb_petugas_satker.*
                FROM tb_tiket_frontdesk JOIN tb_satker
                ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker
                JOIN tb_petugas_satker
                ON tb_tiket_frontdesk.id_petugas_satker = tb_petugas_satker.id_petugas_satker
                WHERE no_tiket_frontdesk = $id";
        $result = $this->db->query($sql);
        $result = $result->result();
        $result = $result[0];
        $data['tiket'] = $result;

        print_r($result);
        $this->load->view('csc/template', $data);
    }
}

?>