<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function Dashboard()
	{
		parent::__construct();
        $this->load->helper('form');
		$this->load->model('msatker', 'satker');
		$this->load->model('mpengaduan', 'pengaduan');
	}
	
	public function index()
	{
		$this->antrian();	
	}

	public function antrian()
	{
		/*
          if ($this->session->userdata('login') == TRUE)
          {
	    */
	    $dt['no_antrian'] = $this->satker->antrian_terakhir('E');

        $data['title'] = 'Dashboard';
        $data['content_html'] = $this->load->view('cse/dashboard', $dt, TRUE);
        $this->load->view('cse/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }
        */
	}
	public function plusone()
	{
		$this->satker->plusone('E');
		redirect('cse/dashboard');
	}


	public function identitas(){
		/*if ($this->session->userdata('login') == TRUE)
          {*/

        $dt['no_tiket'] = $this->satker->antrian_terakhir('E');
        $dt['petugas'] = $this->satker->get_petugas_satker();

        $data['title'] = 'Isi Identitas Satker';
        $data['content_html'] = $this->load->view('cse/identitas', $dt, TRUE);
        $this->load->view('cse/template', $data);
        /*}
     	else
      	{
      	    $this->load->view('login/login_view');
      	}*/
	}

	public function tampil()
	{
		$data['pengaduans'] = $this->pengaduan->get();

		$this->load->view('pengaduan/tampil', $data);
	}

	public function form()
	{
		// form pengaduan
		$id = $this->input->post('id_petugas_satker');

		$data['id_petugas_satker'] = $id;
		$data['petugas'] = $this->satker->get_petugas_satker($id);
		$data['users'] = $this->pengaduan->get_users();

		$this->load->helper('form');
		
		$tpl['title'] = 'Form Pengaduan';
        $tpl['content_html'] = $this->load->view('cse/form', $data, TRUE);
		$this->load->view('cse/template', $tpl);
	}
	public function kirim_pengaduan()
	{
		// proses pengiriman pengaduan

		$post = $this->input->post();

		$this->pengaduan->add(
			$post['id_petugas_satker'],
			$post['id_user'],
			$post['pengaduan']);
		
		$this->session->set_flashdata('pesan', 'Pengaduan anda berhasil dikirim.');
		redirect('cse/dashboard', 'location');
	}
}