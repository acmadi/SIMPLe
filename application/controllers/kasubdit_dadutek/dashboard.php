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
        $data['helpdesk_total_cs'] = $this->mhelpdesk->count_all_tiket('close', 1);
        $data['helpdesk_total_supervisor'] = $this->mhelpdesk->count_all_tiket('close', 2);
        $data['helpdesk_total_pelaksana'] = $this->mhelpdesk->count_all_tiket('close', 3);
        $data['helpdesk_total'] = $this->mhelpdesk->count_all_tiket('open', 4);

        $sql = "SELECT * FROM `tb_tiket_frontdesk` a
                JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                WHERE
                c.anggaran = '{$this->session->userdata('anggaran')}'
                AND status = 'open' AND
                a.lavel = '{$this->session->userdata('lavel')}' AND
                c.id_unit_satker = '{$this->session->userdata('id_unit_satker')}' AND
                a.is_active = '5'
                GROUP BY no_tiket_frontdesk
                ORDER BY tanggal";
        $result = $this->db->query($sql);

        $data['frontdesk_total'] = $result->num_rows();
        $data['total_tiket_diterima_cs'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',1,1);
        $data['total_tiket_diteruskan_cs'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',3,2);
        $data['total_tiket_diterima_pelaksana'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',3,1);
        $data['total_tiket_diteruskan_pelaksana'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,2);
		
		$data['total_tiket_diterima_kasubdit'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,1);
        $data['total_tiket_diteruskan_kasubdit'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,4);
		
		$data['total_tiket_diterima_dadutek'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,5);
        $data['total_tiket_diteruskan_dadutek'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',5,2);
		
		$data['total_tiket_open_cs'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',1);
		$data['total_tiket_open_pelaksana'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',3);
		$data['total_tiket_open_kasubdit'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,'1,2');
		$data['total_tiket_open_dadutek'] = $this->mfrontdesk->count_all_tiket_frontdesk('open',4,'4,5');

        $data['title'] = 'Dashboard';
        $data['content'] = 'kasubdit_dadutek/dashboard';
        $this->load->view('new-template', $data);
    }
}

?>