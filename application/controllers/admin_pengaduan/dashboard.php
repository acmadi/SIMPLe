<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mpengaduan', 'pengaduan');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Admin Pengaduan';

    function index()
    {
        $data['list_pengaduan'] = $this->pengaduan->get_list_pengaduan();
        $data['title'] = 'Daftar Pengaduan';
		$data['content'] = 'admin_pengaduan/dashboard';
        $this->load->view('new-template',$data);
    }
	
	function view(){
		$id = $this->uri->segment(4,TRUE);
		$data['detail_pengaduan'] = $this->pengaduan->get_detail_pengaduan_by_id($id);
		$data['title'] 		= 'Detail Pengaduan';
		$data['content']	= 'admin_pengaduan/detail';
		$this->load->view('new-template',$data);
	}
}

?>