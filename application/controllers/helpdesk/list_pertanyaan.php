<?php
class List_pertanyaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    function index()
    {

        $result = $this->db->from('tb_tiket_helpdesk a')
            ->join('tb_satker b', 'b.id_satker = a.id_satker')
            ->order_by('prioritas DESC')
            ->order_by('status')
            ->get();

        $data['helpdesk'] = $result;

        $data['kementrian'] = $this->db->query('SELECT * FROM tb_kementrian ORDER BY id_kementrian');
        $data['title'] = 'List Pertanayaan';
        $data['content'] = 'helpdesk/list_pertanyaan';
        $this->load->view('new-template', $data);
    }
}