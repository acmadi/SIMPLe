<?php
class Man_forum extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mforum');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Manajemen Forum';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$page		= $this->mforum->get_all(TRUE);
		$pageData	= $page->result();
		$pageLink	= '';
		// $pageData	= $page['query']->result();
		// $pageLink	= $page['pagination1'];
		
		$data		= array('result' => $pageData, 'pageLink' => $pageLink,);
		
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'admin/man_forum/man_forum';
        $data['categories'] = $this->mforum->get_categories();
        
		$bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = $this->uri->uri_string();
        $bc[1]->label = 'Forum';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }

    public function add_category()
    {
        $kat_forum = $this->input->post('kat_forum', TRUE);

        $this->form_validation->set_rules('kat_forum', 'Kategori Forum', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $sql = "INSERT INTO tb_kat_forum VALUES (NULL, ?)";
            $this->db->query($sql, array($kat_forum));
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
            redirect('/admin/man_forum');
        } else {
            $this->session->set_flashdata('error', 'Kategori gagal ditambahkan');
            redirect('/admin/man_forum');
        }
    }

    public function add_forum()
    {
    	$id_user = $this->session->userdata('id_user');
    	
		$this->form_validation->set_rules('id_kat_forum', 'Kategori Forum', 'required');
		$this->form_validation->set_rules('judul_forum', 'Judul Forum', 'required');
		$this->form_validation->set_rules('isi_forum', 'Isi Forum', 'required');
		
		if ($this->form_validation->run() == FALSE) {
            
            $this->session->set_flashdata('error', validation_errors());
            redirect('/admin/man_forum');
        }else{
			$id_kat_forum 	= $this->input->post('id_kat_forum');
			$judul_forum 	= $this->input->post('judul_forum');
			$isi_forum 		= $this->input->post('isi_forum');
			
			$nmBr = '';
			if (isset($_FILES['lampiran']['name'])){
				$unik = date('isdm').'_forum_';
				$nmBr = $unik.$_FILES['lampiran']['name'];
				move_uploaded_file($_FILES['lampiran']['tmp_name'], 'upload/forum/'.$nmBr);
			}

			$result = $this->mforum->add_forum($id_kat_forum, $judul_forum, $isi_forum, $nmBr, $id_user);

			if ($result) {
				$this->session->set_flashdata('success', 'Data sukses ditambahkan');
			} else {
				$this->session->set_flashdata('error', 'Data gagal ditambahkan');
			}

			redirect('/admin/man_forum');
		}
    }

    public function delete($id) {
		$nm_file = $this->db->query("SELECT file FROM tb_forum WHERE id_forum = ? ",array($id))->row();
		
		if($nm_file != '') {
			$nmBr = $nm_file->file;
			$ft = 'upload/'.$nmBr;
			@unlink ($ft);
		}
        $this->db->query("DELETE FROM tb_forum WHERE id_forum=?", array($id));
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Sebuah forum sukses dihapus');
		}else{
			$this->session->set_flashdata('error', 'Sebuah forum gagal dihapus');
		}
		
		redirect('/admin/man_forum');
    }

    public function delete_category($id) {
        $this->db->query("DELETE FROM tb_kat_forum WHERE id_kat_forum=?", array($id));
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Kategori forum sukses dihapus');
		}else{
			$this->session->set_flashdata('error', 'Kategori forum gagal dihapus');
		}
		
		redirect('/admin/man_forum');
    }

    public function edit_forum() {
		$id = $this->uri->segment(4,'');
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'admin/man_forum/man_forum_ubah';
        $data['categories'] = $this->mforum->get_categories();
        $data['forum'] = $this->mforum->get_by_id($id);

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/man_forum';
        $bc[1]->label = 'Forum';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Edit Forum';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
	
	public function edit_kategori(){
		$id = $this->uri->segment(4,'');
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'admin/man_forum/man_forum_kategori_ubah';
        $data['item'] = $this->mforum->get_kategori_by_id($id);

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/man_forum';
        $bc[1]->label = 'Forum';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Edit Kategori';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
	}
	
	public function update_forum(){
		$this->form_validation->set_rules('id_kat_forum', 'Kategori Forum', 'required');
		$this->form_validation->set_rules('judul_forum', 'Judul Forum', 'required');
		$this->form_validation->set_rules('isi_forum', 'Isi Forum', 'required');
		$this->form_validation->set_rules('id', 'ID', 'required');
		
		if ($this->form_validation->run() == FALSE) {
            
            $this->session->set_flashdata('error', validation_errors());
            redirect('/admin/man_forum');
        }else{
			$id_kat_forum 	= $this->input->post('id_kat_forum');
			$judul_forum 	= $this->input->post('judul_forum');
			$isi_forum 		= $this->input->post('isi_forum');
			$id 			= $this->input->post('id');
			$nama_file		= $this->mforum->get_nama_file($id);
			$nmBr = '';
			if(!empty($_FILES['lampiran']['name'])){
				if(!empty($nama_file->file)){
					$ft = 'upload/'.$nama_file->file;
					@unlink ($ft);
				}
				$unik = date('isdm').'_forum_';
				$nmBr = $unik.$_FILES['lampiran']['name'];
				move_uploaded_file($_FILES['lampiran']['tmp_name'], 'upload/'.$nmBr);
			}

			$result = $this->mforum->update_forum($id_kat_forum, $judul_forum, $isi_forum, $nmBr,$id);

			if ($result) {
				$this->session->set_flashdata('success', 'Data sukses diubah');
			} else {
				$this->session->set_flashdata('error', 'Data gagal diubah');
			}

			redirect('/admin/man_forum');
		}
	}
	
	function update_kategori(){
		$this->form_validation->set_rules('judul_kategori', 'Judul Kategori', 'required');
		$this->form_validation->set_rules('id', 'ID', 'required');
		
		if ($this->form_validation->run() == FALSE) {
            
            $this->session->set_flashdata('error', validation_errors());
            redirect('/admin/man_forum');
        }else{
	
			$judul 		= $this->input->post('judul_kategori');
			$id 			= $this->input->post('id');
		

			$result = $this->mforum->update_kategori($judul, $id);

			if ($result) {
				$this->session->set_flashdata('success', 'Kategori sukses diubah');
			} else {
				$this->session->set_flashdata('error', 'Kategori gagal diubah');
			}

			redirect('/admin/man_forum');
		}
	}
}

?>