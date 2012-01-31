<?php
class Status_tiket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->model('Mtiket','tiket');
		$this->load->helper('tanggal_helper');
    }

    function index()
    {
        $data['result'] 	= $this->tiket->get_list_tiket();
        $data['title'] 		= 'Status Tiket';
        $data['content'] 	= 'frontdesk/status_tiket';
		
        $this->load->view('new-template', $data);
    }
	
	function masuk(){
		$data['result'] 	= $this->tiket->get_list_tiket_masuk();
        $data['title'] 		= 'Status Tiket';
        $data['content'] 	= 'frontdesk/status_tiket';
		
        $this->load->view('new-template', $data);
	}
	
	function selesai(){
		$data['result'] 	= $this->tiket->get_list_tiket_selesai();
        $data['title'] 		= 'Status Tiket';
        $data['content'] 	= 'frontdesk/status_tiket';
		
        $this->load->view('new-template', $data);
	}
	
	function kembali(){
		$data['result'] 	= $this->tiket->get_list_tiket_kembali();
        $data['title'] 		= 'Status Tiket';
        $data['content'] 	= 'frontdesk/status_tiket';
		
        $this->load->view('new-template', $data);
	}
}