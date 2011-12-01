<?php
class Knowledge extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Knowledge';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/

        $this->load->model('Mknowledge', 'knowledge');
		$tabAktif	= $this->uri->segment(4, 1);
		
		
		switch($tabAktif){
			case 2 :
				$tabAktif = '#tab2';
				break;
			case 3 :
				$tabAktif = '#tab3';
				break;
			case 4 :
				$tabAktif = '#tab4';
				break;
			default:
				$tabAktif = '#tab1';
				break;
		}
		
        $data['knowledges'] = $this->knowledge->get_all();
        $data['title'] 		= 'Knowledge';
        $data['tabAktif'] 	= $tabAktif;
        $data['content'] 	= 'admin/knowledge/knowledge';
        $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }

    public function add_category()
    {
		$this->form_validation->set_rules('category', 'Kategori', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',"<div style='color:red;'>".validation_errors()."</div>");
			redirect('/admin/knowledge/index/3');
		}
		else
		{	
			$category = $this->input->post('category', TRUE);
			$this->load->model('Mknowledge', 'knowledge');
			$info = $this->knowledge->add_category($category);
			if($info){
				$this->session->set_flashdata('msg',"<p style='color:blue;'>Kategori baru telah ditambahkan !!.</p>");
				redirect('/admin/knowledge/index/2');
			}else{
				$this->session->set_flashdata('msg',"<p style='color:red;'>Kategori gagal ditambahkan !!.</p>");
				redirect('/admin/knowledge/index/3');
			}
			
		}
    }
	
	public function add_knowledge()
    {
		$this->form_validation->set_rules('flist2', 'Kategori', 'required|numeric');
		$this->form_validation->set_rules('fjudul2', 'Judul', 'required');
		$this->form_validation->set_rules('fdesripsi2', 'Deskripsi', 'required');
		$this->form_validation->set_rules('fjawaban2', 'Jawaban', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',"<div style='color:red;'>".validation_errors()."</div>");
			redirect('/admin/knowledge/index/4');
		}
		else
		{	
			$data['flist']	= $this->input->post('flist2', TRUE);
			$data['fjudul'] = $this->input->post('fjudul2', TRUE);
			$data['fdesk']	= $this->input->post('fdesripsi2', TRUE);
			$data['fjawab'] = $this->input->post('fjawaban2', TRUE);
			$this->load->model('Mknowledge', 'knowledge');
			$info = $this->knowledge->add_knowledge($data);
			if($info){
				$this->session->set_flashdata('msg',"<p style='color:blue;'>Knowledge baru telah ditambahkan !!.</p>");
				redirect('/admin/knowledge');
			}else{
				$this->session->set_flashdata('msg',"<p style='color:red;'>Knowledge baru gagal ditambahkan !!.</p>");
				redirect('/admin/knowledge');
			}
		}
    }

    public function delete_category($id)
    { 
        $this->load->model('Mknowledge', 'knowledge');
        $info = $this->knowledge->delete_category($id);
		switch($info){
			case 1:
				$this->session->set_flashdata('msg',"<p style='color:blue;'>Berhasil dihapus</p>");
				break;
			case 2:
				$this->session->set_flashdata('msg',"<p style='color:red;'>Gagal dihapus</p>");
				break;
			default:
				$this->session->set_flashdata('msg',"<p style='color:red;'>Terdapat keterkaitan dengan data lain</p>");
				break;
		}
		
		redirect('/admin/knowledge/index/2');
    }
	
	public function delete($id)
    {
        $this->load->model('Mknowledge', 'knowledge');
        $info = $this->knowledge->delete_knowledge($id);
		
		switch($info){
			case 1:
				$this->session->set_flashdata('msg',"<p style='color:blue;'>Berhasil dihapus</p>");
				break;
			case 2:
				$this->session->set_flashdata('msg',"<p style='color:red;'>Gagal dihapus</p>");
				break;
			default:
				$this->session->set_flashdata('msg',"<p style='color:red;'>Terdapat keterkaitan dengan data lain</p>");
				break;
		}
		
		redirect('/admin/knowledge');
    }
	
	public function edit_category(){
		$this->form_validation->set_rules('pidkat', 'ID', 'required|numeric');
		$this->form_validation->set_rules('pkategori', 'Kategori', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg',"<div style='color:red;'>".validation_errors()."</div>");
			redirect('/admin/knowledge/index/2');
		}
		else
		{	
			$data['kat'] = $this->input->post('pkategori', TRUE);
			$data['id']  = $this->input->post('pidkat', TRUE);
			$this->load->model('Mknowledge', 'knowledge');
			$info = $this->knowledge->do_edit_category($data);
			if($info){
				$this->session->set_flashdata('msg',"<p style='color:blue;'>Kategori berhasil diedit..</p>");
				redirect('/admin/knowledge/index/2');
			}else{
				$this->session->set_flashdata('msg',"<p style='color:red;'>Kategori gagal diedit..</p>");
				redirect('/admin/knowledge/index/2');
			}
		}
	}
}

?>