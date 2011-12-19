<?php
class Man_unit_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Munit','unit');
    }

    var $title = 'Manajemen Unit - Ubah Data';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		
		$id = $this->uri->segment(4,'');
        $data['title'] = 'Manajemen Unit - Ubah Data';
        $data['content'] = 'admin/man_unit/man_unit_ubah';
		$data['list_unit'] = $this->unit->get_list_unit();
		$data['list_kementrian'] = $this->unit->get_list_kementrian();
		$data['item'] = $this->unit->get_edited_by_id($id);
		$data['opt_a'] = array(1=>'Anggaran 1',2=>'Anggaran 2',3=>'Anggaran 3');
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function update(){
		$this->form_validation->set_rules('fkode','Kode Unit','required');
		$this->form_validation->set_rules('fnama','Nama Unit','required');
		$this->form_validation->set_rules('fanggaran','Anggaran','required');
		$this->form_validation->set_rules('funit','Unit','required');
		$fid = $this->input->post('fid',TRUE);
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			redirect('admin/man_unit_tambah');
		}else{
			
			$data['kd']	= trim($this->input->post('fkode',TRUE));
			$data['nm'] = trim($this->input->post('fnama',TRUE));
			$data['ag'] = trim($this->input->post('fanggaran',TRUE));
			$data['un'] = $this->input->post('funit',TRUE);
			
			
			$info = $this->unit->edit_unit($data,$fid);
			
			if($info){
				$this->log->create('berhasil mengubah unit : '.$data['nm']);
				$this->session->set_flashdata('success',"berhasil mengubah unit !!");
				redirect('admin/man_unit');
			}else{
				$this->session->set_flashdata('error',"gagal mengubah unit !!");
				redirect('admin/man_unit_ubah/index/'.$fid);
			}
		
		}
	
	}
}

?>