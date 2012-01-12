<?php
class Pengembalian_dokumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mtiket','tiket');
    }

    function index()
    {
		$page		= $this->tiket->get_list_pengembalian_dokumen();
		$pageData	= $page['query'];
		$pageLink	= $page['pagination1'];

		$data				= array('result'=>$pageData,'pageLink'=>$pageLink,);
        $data['title'] 		= 'Pengambilan Dokumen';
		$data['isian_form']	= $page['isian_form1'];
        $data['content'] 	= 'frontdesk/pengembalian_dokumen';
        $this->load->view('master-template', $data);
    }

    function cetak($id)
    {
        $result = $this->tiket->get_detail_pengembalian_by_id($id);
        if ($result->num_rows() == 1) {
			$this->load->helper('tanggal_helper');
            $data['dokumen']	= $result->row();
            $data['title'] 		= 'Pengambilan Dokumen';
            $data['content'] 	= 'frontdesk/pengembalian_dokumen_cetak';
            $this->load->view('frontdesk/pengembalian_dokumen_cetak', $data);
        } else {
			$this->session->set_flashdata('error',' Data yang dicari tidak ditemukan ');
            redirect('/frontdesk/pengembalian_dokumen');
        }
    }

    function selesai($id)
    {
		$this->tiket->set_selesai_pengembalian($id);
		$this->session->set_flashdata('success','Berhasil mencetak bukti dokumen yang dikembalikan');
        redirect('/frontdesk/pengembalian_dokumen');
    }
}