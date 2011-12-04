<?php
class Akses_kontrol_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
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
	
}

?>