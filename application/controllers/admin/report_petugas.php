<?php
class Report_petugas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mreportcs','reportcs');
    }

    var $title = 'Report petugas CS';

    function index()
    {
		$page		= $this->reportcs->get_all_petugas();
		$pageData	= $page['query']->result();
		
		//print_r($pageData);EXIT;
		
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
		
        $data['title'] 		= 'Report Petugas CS';
        $data['content'] 	= 'admin/report/petugas';
		$data['isian_form']	= $page['isian_form1'];
		
        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = $this->uri->uri_string();
        $bc[1]->label = $this->title;
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
       
    }
}

?>