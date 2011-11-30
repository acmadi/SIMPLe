<?php
class Knowledge_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Knowledge Ubah';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$this->load->model('Mknowledge', 'knowledge');
		  
		$id = $this->uri->segment(4);
		$data['ubah']		= $this->knowledge->get_edit_by_id($id);
		$data['list_kat']	= $this->knowledge->get_all_category();
        $data['title'] 		= 'Knowledge Ubah';
        $data['content'] 	= 'admin/knowledge/knowledge_ubah';
		
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function save(){
		$this->load->model('Mknowledge', 'knowledge');
		
		$this->form_validation->set_rules('fkategori', 'Kategori', 'required');
		$this->form_validation->set_rules('fjudul', 'Judul', 'required');
		$this->form_validation->set_rules('fdeskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('fjawaban', 'Jawaban', 'required');
		$id 	= $this->input->post('id',TRUE);
		
		if ($this->form_validation->run() == FALSE)
		{
			$data1['id_kat_knowledge_base'] 	= $this->input->post('fkategori',TRUE);
			$data1['judul'] 					= $this->input->post('fjudul',TRUE);
			$data1['desripsi'] 					= $this->input->post('fdeskripsi',TRUE);
			$data1['jawaban'] 					= $this->input->post('fjawaban',TRUE);
			$data1['id_knowledge_base'] 		= $id;
			
			$data['ubah']		= (object) $data1 ;
			$data['list_kat']	= $this->knowledge->get_all_category();
			$data['title'] 		= 'Knowledge Ubah';
			$data['content'] 	= 'admin/knowledge/knowledge_ubah';
			$this->load->view('admin/template', $data);
		}
		else
		{	
			$data['fkategori'] 	= $this->input->post('fkategori',TRUE);
			$data['fjudul'] 	= $this->input->post('fjudul',TRUE);
			$data['fdeskripsi'] = $this->input->post('fdeskripsi',TRUE);
			$data['fjawaban'] 	= $this->input->post('fjawaban',TRUE);
			$data['id'] 		= $id;
	
				
			$info = $this->knowledge->edit_data_by_id($data);
			if($info):
				$this->session->set_flashdata('msg',"<p style='color:blue;'>Knowledge berhasil diupdate.</p>");
				redirect('/admin/knowledge/index/','location');
			else:
				$this->session->set_flashdata('msg',"<p style='color:red;'>Knowledge gagal diupdate atau tidak ada perubahan.</p>");
				redirect('/admin/knowledge/index/','location');
			endif;
			
		}
	}
}

?>