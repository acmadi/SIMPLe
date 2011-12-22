<?php
class Man_user_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Muser','muser');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Manajemen User - Ubah Data';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$user = $this->uri->segment(4,'');
	
        $data['title'] = 'Manajemen User - Ubah Data';
        $data['list_level']	= $this->muser->get_list_level();
		$data['list_unit']	= $this->muser->get_list_unit();
        $data['item'] = $this->muser->get_edited_by_id($user);
		
        $data['content'] = 'admin/man_user/man_user_ubah';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function ubah(){
		$this->form_validation->set_rules('enama','Nama','required');
		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('eemail','Email','required|valid_email');
		$this->form_validation->set_rules('eusername','Username','required');
		$this->form_validation->set_rules('etelp','No Telp','required');
		$this->form_validation->set_rules('elevel','Level','required');
		$this->form_validation->set_rules('edepartemen','Departemen','required');
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			$id	= trim($this->input->post('id',TRUE));
			redirect('admin/man_user_ubah/index/'.$id);
		}else{
			$data['usr']	= trim($this->input->post('eusername',TRUE));
			$data['nm'] 	= trim($this->input->post('enama',TRUE));
			$data['id'] 	= trim($this->input->post('id',TRUE));
			$data['em'] 	= trim($this->input->post('eemail',TRUE));
			$data['telp'] 	= trim($this->input->post('etelp',TRUE));
			$data['lev'] 	= trim($this->input->post('elevel',TRUE));
			$data['dep'] 	= trim($this->input->post('edepartemen',TRUE));
			
			$info = $this->muser->edit_user($data);
			
			if($info){
				$this->session->set_flashdata('success',"berhasil mengupdate user !!");
				redirect('admin/man_user');
			}else{
				$this->session->set_flashdata('error',"gagal mengupdate !!.");
				redirect('admin/man_user');
			}
		}
	}
}

?>