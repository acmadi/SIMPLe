<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaduan extends CI_Controller {


	function Pengaduan()
	{
		parent::__construct();
		$this->load->model('mpengaduan', 'pengaduan');
	}
	
	public function index()
	{
		redirect('cse/identitas_satker', 'location');
	}

	public function tampil()
	{
		$data['pengaduans'] = $this->pengaduan->get();

		$this->load->view('pengaduan/tampil', $data);
	}

	public function form()
	{
		// form pengaduan

		// $data['id_petugas_satker'] = 1; // default for testing
		$data['id_petugas_satker'] = $this->input->post('id_petugas_satker');
		$data['users'] = $this->pengaduan->get_users();

		$this->load->helper('form');
		
		$tpl['title'] = 'Dashboard';
        $tpl['content_html'] = $this->load->view('pengaduan/form', $data, TRUE);
		$this->load->view('master-template', $tpl);
	}
	public function kirim()
	{
		// proses pengiriman pengaduan

		$post = $this->input->post();

		$this->pengaduan->add(
			$post['id_petugas_satker'],
			$post['id_user'],
			$post['pengaduan']);
		
		$this->session->set_flashdata('pesan', 'Pengaduan anda berhasil dikirim.');
		redirect('cse/pengaduan/form', 'location');
	}
}