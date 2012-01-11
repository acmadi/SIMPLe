<?php
class Man_unit_cari extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Munit','unit');
    }

    var $title = 'Hasil Pencarian';

    function index()
    {
		$keyword = $this->input->post('fcari',TRUE);
		$page		= $this->unit->get_unit_by_id($keyword);
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
		
        $data['title'] = 'Manajemen Unit';
        $data['content'] = 'admin/man_unit/man_unit';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/man_unit';
        $bc[1]->label = 'Manajemen Unit';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = $this->title;
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
}

?>