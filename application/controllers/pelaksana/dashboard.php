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
        $data['helpdesk_total'] = $this->mhelpdesk->count_all_tiket();
        $data['frontdesk_total'] = $this->mfrontdesk->count_all_tiket();

        $result = $this->db->query("SELECT * FROM tb_tiket_frontdesk WHERE lavel = 1");
        $data['total_tiket_diterima_cs'] = $result->num_rows();

        $result = $this->db->query("SELECT * FROM tb_tiket_frontdesk WHERE lavel = 2");
        $data['total_tiket_diteruskan_cs'] = $result->num_rows();

        $result = $this->db->query("SELECT * FROM tb_tiket_frontdesk WHERE lavel = 3");
        $data['total_tiket_diterima_pelaksana'] = $result->num_rows();

        $result = $this->db->query("SELECT * FROM tb_tiket_frontdesk WHERE lavel > 3");
        $data['total_tiket_diteruskan_pelaksana'] = $result->num_rows();

        $data['title'] = 'Dashboard';
        $data['content'] = 'pelaksana/dashboard';
        $this->load->view('master-template', $data);
    }
}

?>