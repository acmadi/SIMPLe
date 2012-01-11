<?php
class Man_user_surat_kerja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Muser','muser');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Surat Kerja';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$user = $this->uri->segment(4,'');
		
        $data['title']   = 'Manajemen User - Surat Kerja';
        $data['content'] = 'admin/man_user/man_user_surat_kerja';
		$data['item']	 = $this->muser->get_user_by_id($user);
		$data['history_maker'] = $this->muser->get_masa_kerja($user);
		$data['bln']	 = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$data['thn']	 = date('Y');

		$bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/man_user';
        $bc[1]->label = 'Manajemen User';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = $this->title;
        $data['breadcrumb'] = $bc;

		$this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function save(){
		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('ftglmulai','Tanggal Mulai','required');
		$this->form_validation->set_rules('ftglselesai','Tanggal Selesai','required');
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			$id	= trim($this->input->post('id',TRUE));
			redirect('admin/man_user_surat_kerja/index/'.$id);
		}else{
		
			$data['id']   = $this->input->post('id',TRUE);
			$data['tgl_mulai']   = $this->input->post('ftglmulai',TRUE);
			$data['tgl_selesai']   = $this->input->post('ftglselesai',TRUE);
			
			
			$info = $this->muser->set_surat_kerja($data);
			if($info) $this->session->set_flashdata('success',"sukses tambahkan masa kerja ID user : ".$data['id']);
			redirect('admin/man_user_surat_kerja/index/'.$data['id']);
		}
	}
}

?>