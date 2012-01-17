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
        $page = $this->tiket->get_list_ambil_dokumen();
        $pageData = $page['query'];
        $pageLink = $page['pagination1'];

        $data = array('result' => $pageData, 'pageLink' => $pageLink,);
        $data['title'] = 'Pengambilan Dokumen';
        $data['isian_form'] = $page['isian_form1'];
        $data['content'] = 'frontdesk/ambil_dokumen';
        $this->load->view('new-template', $data);
    }

    function cetak($no_tiket_frontdesk)
    {
        $result = $this->db->from('tb_tiket_frontdesk a')
                ->join('tb_kementrian b', 'b.id_kementrian = a.id_kementrian')
                ->join('tb_unit c', 'c.id_unit = a.id_unit')
                ->join('tb_petugas_satker d', 'd.id_petugas_satker = a.id_petugas_satker')
                ->where('no_tiket_frontdesk', $no_tiket_frontdesk)
                ->get();

        $row = $result->row();

        $this->load->library('odtphp');

        $input_filename = $this->odtphp->create_ambil(
            $row->nomor_surat_usulan,
            $no_tiket_frontdesk,
            $this->session->userdata('id_user'),
            $this->session->userdata('nama'),
                $row->id_kementrian . ' - ' . $row->nama_kementrian,
                $row->id_unit . ' - ' . $row->nama_unit,
            $row->nip,
            $row->nama_petugas,
            $row->jabatan_petugas,
            $row->no_hp,
            $row->no_kantor,
            $row->tanggal,
            $this->session->userdata('nama')
        );

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