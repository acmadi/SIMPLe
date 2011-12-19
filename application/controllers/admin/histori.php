<?php
class Histori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mhistori','histori');
    }

    var $title = 'Histori';

    function index()
    {
		$page		= $this->histori->get_all_history(); 
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
		
        $data['title'] = 'Histori';
        $data['content'] = 'admin/histori/histori';
        $this->load->view('admin/template', $data);
    }
}

?>