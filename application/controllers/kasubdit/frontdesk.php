<?php
class Frontdesk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk');
    }

    public function index()
    {
        $sql = "SELECT * FROM tb_tiket_frontdesk JOIN tb_satker
                        ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker
                        WHERE status = 'open'";
        $data['antrian'] = $this->db->query($sql);

        $data['title'] = 'Konsultasi Front Desk';
        $data['content'] = 'kasubdit/frontdesk';
        $this->load->view('new-template', $data);
    }

    function diterima($id)
    {
        $data['title'] = 'Cek Tiket';
        $data['content'] = 'kasubdit/frontdesk_view';
        $data['tiket'] = $this->mfrontdesk->get_by_id($id);

        $this->load->view('new-template', $data);
    }

    function diteruskan($id)
    {
        $data['title'] = 'Cek Tiket';
        $data['content'] = 'kasubdit/frontdesk_view';
        $data['tiket'] = $this->mfrontdesk->get_by_id($id);

        $this->load->view('new-template', $data);
    }
}