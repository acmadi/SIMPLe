<?php
class Ambil_dokumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->config->load('appconfig');
        $this->load->model('Mtiket', 'tiket');
    }

    var $title = 'Ambil Dokumen';

    function index()
    {
        $this->load->helper('tanggal_helper');
        $data['result']		= $this->tiket->get_list_ambil_dokumen();
        $data['title']		= 'Pengambilan Dokumen';
        $data['content'] 	= 'frontdesk/ambil_dokumen';
        $this->load->view('new-template', $data);
    }

    function cetak($no_tiket_frontdesk)
    {
        // Masukkan data ke pengembalian dokumen
		$sql = "INSERT tb_pengembalian_doc
		        (no_tiket_frontdesk, id_user, sudah_diambil, tanggal)
                VALUES ( ?, ?, 1, NOW() )";

        $this->db->query($sql, array($no_tiket_frontdesk, $this->session->userdata('id_user')));

        // Persiapan Membuat pengembalian dokumen -> pdf
        $sql = "SELECT *

                FROM tb_tiket_frontdesk a
                JOIN tb_kementrian b     ON b.id_kementrian = a.id_kementrian
                JOIN tb_unit c           ON c.id_unit = a.id_unit
                JOIN tb_petugas_satker d ON d.id_petugas_satker = a.id_petugas_satker

                WHERE no_tiket_frontdesk = ?
                ";

        $result = $this->db->query($sql, array($no_tiket_frontdesk));

        $input_filename = $this->odtphp->create_ambil($result->row());

        $output = preg_replace('/.odt/', '.pdf', $input_filename['full_filename']);

        $command = sprintf('"%s" DocumentConverter.py "%s" "%s"',
            $this->config->item('libreoffice_python'),
            $input_filename['full_filename'],
            $output);

        exec($command);

        $pdf_file = preg_replace('/.odt/', '.pdf', $input_filename['filename']);
        $data['pdf_file'] = base_url() . 'output/' . $pdf_file;

        $data['content'] = 'frontdesk/ambil_dokumen_cetak';

        $this->load->view('frontdesk/ambil_dokumen_cetak', $data);


    }

    function selesai($no_tiket_frontdesk)
    {
        $this->session->set_flashdata('success', 'Berhasil melakukan perubahan ');
        $this->tiket->set_selesai($no_tiket_frontdesk);
        redirect('/frontdesk/ambil_dokumen');
    }
}