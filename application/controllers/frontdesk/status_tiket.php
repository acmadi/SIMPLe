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
		$this->load->helper('tanggal_helper');
        $data['result'] 	= $this->tiket->get_list_tiket();
        $data['title'] 		= 'Status Tiket';
        $data['content'] 	= 'frontdesk/status_tiket';
		
        $this->load->view('new-template', $data);
    }
}