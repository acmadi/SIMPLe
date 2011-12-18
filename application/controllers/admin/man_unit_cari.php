<?php
class Man_unit_cari extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Munit','unit');
    }

    var $title = 'Manajemen Unit';

    function index()
    {
		$keyword = $this->input->post('fcari',TRUE);
		$page		= $this->unit->get_unit_by_id($keyword);
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
		
        $data['title'] = 'Manajemen Unit';
        $data['content'] = 'admin/man_unit/man_unit';
        $this->load->view('admin/template', $data);
    }
}

?>