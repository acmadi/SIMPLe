<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaduan extends CI_Controller {


	function pengaduan()
	{
		parent::__construct();
		$this->load->model('mpengaduan');
	}
	
	public function index()
	{
		
	}

	public function tampil()
	{
		$data['pengaduans'] = $this->mpengaduan->get();

		$this->load->view('pengaduan/tampil', $data);
	}

	public function form()
	{
		// form pengaduan

		$data['id_petugas_satker'] = 1; // default for testing
		$data['users'] = $this->mpengaduan->get_users();

		$this->load->helper('form');
		$this->load->view('pengaduan/form', $data);
	}
	public function kirim()
	{
		// proses pengiriman pengaduan

		$post = $this->input->post();

		$this->mpengaduan->add(
			$post['id_petugas_satker'],
			$post['id_user'],
			$post['pengaduan']);
		
		$this->session->set_flashdata('pesan', 'Pengaduan anda berhasil dikirim.');
		redirect('pengaduan/form', 'location');
	}
}