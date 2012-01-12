<?php
class Helpdesk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
    }

    function index()
    {
        $sql = "SELECT * FROM tb_tiket_helpdesk JOIN tb_satker
                                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                                WHERE status = 'open' AND
                                lavel = 4";

        $data['antrian'] = $this->db->query($sql);

        $data['title'] = 'Konsultasi Help Desk';
        $data['content'] = 'kasubdit/helpdesk';
        $this->load->view('master-template', $data);
    }

    function view($id)
    {
        $data['title'] = 'Cek Tiket';
        $data['content'] = 'kasubdit/helpdesk_view';
        $data['antrian'] = $this->mhelpdesk->get_by_id($id);

        $this->load->view('master-template', $data);
    }

}
