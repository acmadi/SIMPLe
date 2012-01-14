<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk');
        $this->load->model('mhelpdesk');
    }

    function index()
    {
        //status, lavel, is_active
        $data['helpdesk_total'] = $this->mhelpdesk->count_all_tiket('open', 4);
        $data['frontdesk_total'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',6); 
        $data['total_tiket_diterima_cs'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',1,1); 
        $data['total_tiket_diteruskan_cs'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',3,2);
        $data['total_tiket_diterima_pelaksana'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',3,1);
        $data['total_tiket_diteruskan_pelaksana'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,2);
		
		$data['total_tiket_diterima_kasubdit'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,1);
        $data['total_tiket_diteruskan_kasubdit'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,4);
		
		$data['total_tiket_diterima_dadutek'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,5);
        $data['total_tiket_diteruskan_dadutek'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',5,2);
		
		$data['total_tiket_diterima_direktur'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',5,1);
        $data['total_tiket_diteruskan_direktur'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',6,2);
		
		$data['total_tiket_open_cs'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',1);
		$data['total_tiket_open_pelaksana'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',3);
		$data['total_tiket_open_kasubdit'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,'1,2');
		$data['total_tiket_open_dadutek'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,'4,5');
		$data['total_tiket_open_direktur'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',5);

        $data['title'] = 'Dashboard';
        $data['content'] = 'direktur/dashboard';
        $this->load->view('new-template', $data);
    }
}

?>