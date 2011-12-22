<?php
class Ambil_dokumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Ambil Dokumen';

    function index()
    {
        $sql = "SELECT * FROM tb_tiket_frontdesk
                JOIN tb_satker
                ON tb_satker.id_satker = tb_tiket_frontdesk.id_satker
                WHERE status = 'close' AND is_active = 1";
        $result = $this->db->query($sql);


        $data['dokumen'] = $result;

        $data['title'] = 'Pengambilan Dokumen';
        $data['content'] = 'frontdesk/ambil_dokumen';
        $this->load->view('master-template', $data);
    }

    function cetak($no_tiket_frontdesk)
    {
        $sql = "SELECT * FROM tb_tiket_frontdesk
                        JOIN tb_petugas_satker
                        ON tb_petugas_satker.id_petugas_satker = tb_tiket_frontdesk.id_petugas_satker
                        JOIN tb_satker
                        ON tb_satker.id_satker = tb_tiket_frontdesk.id_satker
                        WHERE status = 'close' AND is_active = 1 AND no_tiket_frontdesk = '$no_tiket_frontdesk'";
        $result = $this->db->query($sql);

        $data['dokumen'] = $result->row();

        $data['title'] = 'Pengambilan Dokumen';
        $data['content'] = 'frontdesk/ambil_dokumen_cetak';
        $this->load->view('frontdesk/ambil_dokumen_cetak', $data);
    }

    function selesai($no_tiket_frontdesk) {
        $sql = "UPDATE tb_tiket_frontdesk SET is_active = 3 WHERE no_tiket_frontdesk = '$no_tiket_frontdesk'";
        $this->db->query($sql);
        redirect('/frontdesk/ambil_dokumen');
    }
}
