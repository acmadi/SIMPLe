<?php
class Pengembalian_dokumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mtiket', 'tiket');
        $this->load->library('odtphp');
    }

    function index()
    {
        $this->load->helper('tanggal_helper');
        $data['result'] = $this->tiket->get_list_pengembalian_dokumen();
        $data['title'] = 'Pengambilan Dokumen';
        $data['content'] = 'frontdesk/pengembalian_dokumen';
        $this->load->view('new-template', $data);
    }

    function cetak($id)
    {
        $result = $this->tiket->get_detail_pengembalian_by_id($id);

        // Bikin Pengembalian Dokumen
        $input_filename= $this->odtphp->create_kembali($result->row());

        $output = preg_replace('/.odt/', '.pdf', $input_filename['full_filename']);

        $command = sprintf('"%s" DocumentConverter.py "%s" "%s"',
            $this->config->item('libreoffice_python'),
            $input_filename['full_filename'],
            $output);

        exec($command);

        $pdf_file = preg_replace('/.odt/', '.pdf', $input_filename['filename']);
        $data['pdf_file'] = base_url() . 'output/' . $pdf_file;

        if ($result->num_rows() == 1) {
            $this->load->helper('tanggal_helper');
            $data['dokumen'] = $result->row();
            $data['title'] = 'Pengambilan Dokumen';
            $data['content'] = 'frontdesk/pengembalian_dokumen_cetak';
            $this->load->view('frontdesk/pengembalian_dokumen_cetak', $data);
        } else {
            $this->session->set_flashdata('error', ' Data yang dicari tidak ditemukan ');
            redirect('/frontdesk/pengembalian_dokumen');
        }
    }

    function selesai($id)
    {
        $this->tiket->set_selesai_pengembalian($id);
        $this->session->set_flashdata('success', 'Berhasil mencetak bukti dokumen yang dikembalikan');
        redirect('/frontdesk/pengembalian_dokumen');
    }
}