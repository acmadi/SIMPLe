<?php
class Man_user_cari extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
    }
	
	var $title = 'Manajemen User Cari';
	
	function index()
	{		
		$keyword = $this->input->post('fcari',TRUE);
		
		$this->load->model('Muser','muser');
		$page		= $this->muser->get_all_user_by_id($keyword);
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
		
		
		$data['title'] 	 = 'Manajemen User Cari';
		$data['content'] = 'admin/man_user/man_user_cari';
		$this->load->view('admin/template', $data);
	}
}
?>