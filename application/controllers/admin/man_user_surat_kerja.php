<?php
class Man_user_surat_kerja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Muser','muser');
    }

    var $title = 'Manajemen User - Surat Kerja';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$user = $this->uri->segment(4,'');
		
        $data['title']   = 'Manajemen User - Surat Kerja';
        $data['content'] = 'admin/man_user/man_user_surat_kerja';
		$data['item']	 = $this->muser->get_user_by_id($user);
		$data['masa_kerja'] = $this->muser->get_masa_kerja($user);
		$data['bln']	 = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$data['thn']	 = date('Y');
		$this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function save(){
		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('ftgl','Tanggal Awal','required');
		$this->form_validation->set_rules('ftgl2','Tanggal Akhir','required');
		$this->form_validation->set_rules('fbln','Bulan Awal','required');
		$this->form_validation->set_rules('fbln2','Bulan Akhir','required');
		$this->form_validation->set_rules('fthn','Tahun Awal','required');
		$this->form_validation->set_rules('fthn2','Tahun Akhir','required');
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg',"<div style='color:red;'>".validation_errors()."</div>");
			$id	= trim($this->input->post('id',TRUE));
			redirect('admin/man_user_surat_kerja/index/'.$id);
		}else{
		
			$data['id']   = $this->input->post('id',TRUE);
			$data['tgl1'] = $this->input->post('ftgl',TRUE);
			$data['tgl2'] = $this->input->post('ftgl2',TRUE);
			$data['bln1'] = $this->input->post('fbln',TRUE);
			$data['bln2'] = $this->input->post('fbln2',TRUE);
			$data['thn1'] = $this->input->post('fthn',TRUE);
			$data['thn2'] = $this->input->post('fthn2',TRUE);
			
			$this->muser->set_surat_kerja($data);
			redirect('admin/man_user');
		}
	}
}

?>