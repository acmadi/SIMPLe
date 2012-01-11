<?php
class Status_tiket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->model('Mtiket','tiket');

    }

    function index()
    {
        $page		= $this->tiket->get_list_tiket();
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
        $data['title'] 		= 'Status Tiket';
        $data['isian_form']	= $page['isian_form1'];
        $data['content'] 	= 'frontdesk/status_tiket';
		
        $this->load->view('master-template', $data);
    }
}