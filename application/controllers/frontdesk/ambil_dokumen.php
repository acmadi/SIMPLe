<?php
class Ambil_dokumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mtiket','tiket');
    }

    var $title = 'Ambil Dokumen';

    function index()
    {
        $page		= $this->tiket->get_list_ambil_dokumen();
		$pageData	= $page['query'];
		$pageLink	= $page['pagination1'];

		$data				= array('result'=>$pageData,'pageLink'=>$pageLink,);
        $data['title'] 		= 'Pengambilan Dokumen';
		$data['isian_form']	= $page['isian_form1'];
        $data['content'] 	= 'frontdesk/ambil_dokumen';
        $this->load->view('master-template', $data);
    }

    function cetak($no_tiket_frontdesk)
    {
        $result = $this->tiket->get_detail_tiket_by_id($no_tiket_frontdesk);

        if ($result->num_rows() == 1) {
			$this->load->helper('tanggal_helper');
            $data['dokumen'] = $result->row();

            $data['title'] 		= 'Pengambilan Dokumen';
            $data['content'] 	= 'frontdesk/ambil_dokumen_cetak';
            $this->load->view('frontdesk/ambil_dokumen_cetak', $data);
        } else {
            // TODO: Mungkin sebaiknya ditambahkan informasi kalau data yang mau dicetak, sudah dicetak CS lain.
			$this->session->set_flashdata('error','Data tidak ditemukan ');
            redirect('/frontdesk/ambil_dokumen');
        }
    }

    function selesai($no_tiket_frontdesk)
    {
		$this->session->set_flashdata('success','Berhasil melakukan perubahan ');
        $this->tiket->set_selesai($no_tiket_frontdesk);
        redirect('/frontdesk/ambil_dokumen');
    }
}