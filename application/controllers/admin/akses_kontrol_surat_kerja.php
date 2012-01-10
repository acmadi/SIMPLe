<?php
class Akses_kontrol_surat_kerja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Muser','user');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Akses Kontrol - Surat Kerja';

    function index()
    {
		$user = $this->uri->segment(4,'');
		$lavel = $this->uri->segment(5,'');
		
        $data['title']   = 'Akses Kontrol - Surat Kerja';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol_surat_kerja';
		$data['item']	 = $this->user->get_user_by_id($user);
		$data['history_maker'] = $this->user->get_masa_kerja($user);
		$data['bln']	 = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$data['thn']	 = date('Y');
		$data['level']	 = $lavel;
		$this->load->view('admin/template', $data);
    }
	
	function save(){
		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('ftglmulai','Tanggal Mulai','required');
		$this->form_validation->set_rules('ftglselesai','Tanggal Selesai','required');
		
		$level = $this->input->post('level',TRUE);
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			$id	= trim($this->input->post('id',TRUE));
			//redirect('admin/man_user_surat_kerja/index/'.$id);
			redirect('admin/akses_kontrol_surat_kerja/index/'.$id.'/'.$level);
		}else{
		
			$data['id']   = $this->input->post('id',TRUE);
			$data['tgl_mulai']   = $this->input->post('ftglmulai',TRUE);
			$data['tgl_selesai']   = $this->input->post('ftglselesai',TRUE);
			
			
			$info = $this->user->set_surat_kerja($data);
			if($info) $this->session->set_flashdata('success',"sukses tambahkan masa kerja ID user : ".$data['id']);
			redirect('admin/akses_kontrol_surat_kerja/index/'.$data['id'].'/'.$level);
		}
	}
}

?>