<?php
class Akses_kontrol extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Akses Kontrol';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$this->load->model('Makses', 'akses');
		
		$data['list_kontrol'] = $this->akses->get_all();
        $data['title'] = 'Akses Kontrol';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function save(){
		$this->form_validation->set_rules('fid', 'ID', 'required|numeric|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('fnamalevel', 'Nama Level', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/admin/akses_kontrol/view_form');
		}
		else
		{	
			$data['fid']		= $this->input->post('fid', TRUE);
			$data['fnamalevel'] = $this->input->post('fnamalevel', TRUE);
			
			$this->load->model('Makses', 'akses');
			$info = $this->akses->add_akses($data);
			if($info){
				$this->session->set_flashdata('success',"<p style='color:blue;'>Akses baru telah ditambahkan !!.</p>");
				redirect('/admin/akses_kontrol');
			}else{
				$this->session->set_flashdata('error',"<p style='color:red;'>Akses baru gagal ditambahkan !!.</p>");
				redirect('/admin/akses_kontrol');
			}
		}
	}

    function update() {
        var_dump($_POST);
    }
	
	public function delete($id)
    {
        $this->load->model('Makses', 'akses');
        $info = $this->akses->delete($id);
		
		switch($info){
			case 1:
				$this->session->set_flashdata('success',"Berhasil dihapus");
				break;
			case 2:
				$this->session->set_flashdata('error',"Gagal dihapus");
				break;
			default:
				$this->session->set_flashdata('warning',"Terdapat keterkaitan dengan data lain");
				break;
		}
		
		redirect('/admin/akses_kontrol');
    }
	
	function view_form(){
		$data1['fid']		= $this->input->post('fid', TRUE);
		$data1['fnamalevel'] = $this->input->post('fnamalevel', TRUE);
		
		$data['tambah']	 = (object) $data1;
		$data['title'] 	 = 'Akses Kontrol';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol_tambah';
        $this->load->view('admin/template', $data);
	
	}
	
	
	 
}

?>