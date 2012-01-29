<?php
class Man_kelengkapan_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mdokumen','dokumen');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Ubah Data';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$user = $this->uri->segment(4,'');
	
        $data['title'] = 'Manajemen Kelengkapan Dokumen - Ubah Data';
        $data['item'] = $this->dokumen->get_edited_by_id($user);
		
        $data['content'] = 'admin/man_kelengkapan/man_kelengkapan_ubah';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/man_kelengkapan_doc';
        $bc[1]->label = 'Manajemen Kelengkapan Dokumen';
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
	
	function ubah(){
		$this->form_validation->set_rules('ekelengkapan','Nama kelengkapan','required');
		$this->form_validation->set_rules('id','ID','required');
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			$id	= trim($this->input->post('id',TRUE));
			redirect('admin/man_kelengkapan_ubah/index/'.$id);
		}else{
			
			$data['nm'] 	= trim($this->input->post('ekelengkapan',TRUE));
			$data['id'] 	= trim($this->input->post('id',TRUE));
			
			$info = $this->dokumen->edit_kelengkapan($data);
			
			if($info){
				$this->session->set_flashdata('success',"berhasil mengubah data kelengkapan !!");
				redirect('admin/man_kelengkapan_doc');
			}else{
				$this->session->set_flashdata('error',"gagal mengubah data kelengkapan !!.");
				redirect('admin/man_kelengkapan_doc');
			}
		}
	}
}

?>