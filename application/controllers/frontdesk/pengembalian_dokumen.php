<?php
class Pengembalian_dokumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $sql = "SELECT * FROM tb_pengembalian_doc
                JOIN tb_tiket_frontdesk
                ON tb_tiket_frontdesk.no_tiket_frontdesk = tb_pengembalian_doc.no_tiket_frontdesk
                JOIN tb_satker
                ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker

                WHERE sudah_diambil = false
                GROUP BY  tb_pengembalian_doc.no_tiket_frontdesk
                ";

        $result = $this->db->query($sql);

        $data['dokumen'] = $result;

        $data['title'] = 'Pengambilan Dokumen';
        $data['content'] = 'frontdesk/pengembalian_dokumen';
        $this->load->view('master-template', $data);
    }

    function cetak($id)
    {
        $sql = "SELECT * FROM tb_pengembalian_doc
                        JOIN tb_tiket_frontdesk
                        ON tb_tiket_frontdesk.no_tiket_frontdesk = tb_pengembalian_doc.no_tiket_frontdesk
                        JOIN tb_satker
                        ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker
                        WHERE id_pengembalian_doc = '$id' AND
                        sudah_diambil = false";

        $result = $this->db->query($sql);


        if ($result->num_rows() == 1) {

            $data['dokumen'] = $result->row();


            $sql = "SELECT * FROM tb_kelengkapan_formulir
            JOIN tb_kelengkapan_doc
            ON tb_kelengkapan_doc.id_kelengkapan = tb_kelengkapan_formulir.id_kelengkapan
            WHERE no_tiket_frontdesk = ?
            ";

            $result2 = $this->db->query($sql, array($data['dokumen']->no_tiket_frontdesk));

//            print_r($result2->result());

            $data['dokumen_lama'] = $result2;

            $data['title'] = 'Pengambilan Dokumen';
            $data['content'] = 'frontdesk/pengembalian_dokumen_cetak';
            $this->load->view('frontdesk/pengembalian_dokumen_cetak', $data);
        } else {
            //            redirect('/frontdesk/pengembalian_dokumen');
        }
    }

    function selesai($id)
    {
        $sql = "UPDATE tb_pengembalian_doc SET sudah_diambil = true WHERE id_pengembalian_doc = '$id'";
        $this->db->query($sql);
        $this->log->create("Mencetak bukti dokumen yang dikembalikan");
        redirect('/frontdesk/pengembalian_dokumen');
    }
}
