<?php
class Akses_kontrol_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Akses Kontrol - Ubah';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$this->load->model('Makses', 'akses');
		
		$id = $this->uri->segment(4);
        $data['title'] 		= 'Akses Kontrol - Ubah';
        $data['content'] 	= 'admin/akses_kontrol/akses_kontrol_ubah';
		$data['ubah']		= $this->akses->get_edit_by_id($id);
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function save(){
		$this->load->model('Makses', 'akses');
		
		$this->form_validation->set_rules('fid', 'ID', 'required');
		$this->form_validation->set_rules('fnamalevel', 'ID', 'required');
		$id 	= $this->input->post('id',TRUE);
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data1['fid'] 		= $this->input->post('fid',TRUE);
			$data1['fnamalevel'] = $this->input->post('fnamalevel',TRUE);
			
			$data['ubah']		= (object) $data1 ;
			$data['title'] 		= 'Akses Kontrol - Ubah';
			$data['content'] 	= 'admin/akses_kontrol/akses_kontrol_ubah';
			$this->load->view('admin/template', $data);
		}
		else
		{	
			$data['fid'] 		= $this->input->post('fid',TRUE);
			$data['fnamalevel'] = $this->input->post('fnamalevel',TRUE);
	
				
			$info = $this->akses->edit_data_by_id($data);
			if($info):
				$this->session->set_flashdata('msg',"<p style='color:blue;'>Akses kontrol berhasil diupdate.</p>");
				redirect('/admin/akses_kontrol/index/','location');
			else:
				$this->session->set_flashdata('msg',"<p style='color:red;'>Akses kontrol gagal diupdate atau tidak ada perubahan.</p>");
				redirect('/admin/akses_kontrol/index/','location');
			endif;
			
		}
	}
	
	function user(){
		$user	= trim($this->uri->segment(4,''));
		$this->load->model('Muser','user');
		
		$data['title'] = 'Akses kontrol - Ubah Data';
        $data['list_level']	= $this->user->get_list_level();
		
		$data['list_unit']	= $this->user->get_list_unit();
        $data['item'] 		= $this->user->get_edited_by_id($user);
        $data['level'] 		= trim($this->uri->segment(5,''));
		
        $data['content'] = 'admin/akses_kontrol/akses_kontrol_user_ubah';
        $this->load->view('admin/template', $data);
	}
	
	function ubah_user(){
		$this->load->model('Muser','muser');
		$this->form_validation->set_rules('enama','Nama','required');
		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('eemail','Email','required|valid_email');
		$this->form_validation->set_rules('eusername','Username','required');
		$this->form_validation->set_rules('etelp','No Telp','required');
		$this->form_validation->set_rules('elevel','Level','required');
		$this->form_validation->set_rules('edepartemen','Departemen','required');
		$this->form_validation->set_rules('level','ID Level','required');
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			$id	= trim($this->input->post('id',TRUE));
			$level	= trim($this->input->post('level',TRUE));
			redirect('admin/akses_kontrol_ubah/user/'.$id.'/'.$level);
		}else{
			$data['usr']	= trim($this->input->post('eusername',TRUE));
			$data['nm'] 	= trim($this->input->post('enama',TRUE));
			$data['id'] 	= trim($this->input->post('id',TRUE));
			$data['em'] 	= trim($this->input->post('eemail',TRUE));
			$data['telp'] 	= trim($this->input->post('etelp',TRUE));
			$data['lev'] 	= trim($this->input->post('elevel',TRUE));
			$data['dep'] 	= trim($this->input->post('edepartemen',TRUE));
			$level			= trim($this->input->post('level',TRUE));
			
			$info = $this->muser->edit_user($data);
			
			if($info){
				$this->log->create("merubah data user : ".$data['usr']);
				$this->session->set_flashdata('success',"berhasil mengupdate user ".$data['usr']);
				redirect('admin/akses_kontrol/view/'.$level);
			}else{
				$this->session->set_flashdata('error',"gagal mengupdate user".$data['usr']);
				redirect('admin/akses_kontrol/view/'.$level);
			}
		}
	}
	
}

?>