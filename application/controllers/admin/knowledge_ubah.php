<?php
class Knowledge_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
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
		
		$bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/knowledge';
        $bc[1]->label = 'Knowledge Base';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Ubah';
        $data['breadcrumb'] = $bc;

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
//		$this->form_validation->set_rules('fsumber', 'Sumber', 'required');
//        $this->form_validation->set_rules('fjabatan', 'Jabatan', 'required');
		$id 	= $this->input->post('id',TRUE);
		
		if ($this->form_validation->run() == FALSE)
		{
			$data1['id_kat_knowledge_base'] 	= $this->input->post('fkategori',TRUE);
			$data1['judul'] 					= $this->input->post('fjudul',TRUE);
			$data1['desripsi'] 					= $this->input->post('fdeskripsi',TRUE);
			$data1['jawaban'] 					= $this->input->post('fjawaban',TRUE);
			$data['nama_narasumber'] 			= $this->input->post('fsumber', TRUE);
            $data['jabatan_narasumber'] 		= $this->input->post('fjabatan', TRUE);
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
			$data['fsumb'] 		= $this->input->post('fsumber', TRUE);
            $data['fjab'] 		= $this->input->post('fjabatan', TRUE);
			$data['id'] 		= $id;
	
				
			$info = $this->knowledge->edit_data_by_id($data);
			if($info):
				$this->session->set_flashdata('success',"Knowledge berhasil diupdate.");
				redirect('/admin/knowledge/index/','location');
			else:
				$this->session->set_flashdata('error',"Knowledge gagal diupdate atau tidak ada perubahan.");
				redirect('/admin/knowledge/index/','location');
			endif;
			
		}
	}
}

?>