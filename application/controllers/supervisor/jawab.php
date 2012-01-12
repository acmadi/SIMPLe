<?php
class Jawab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id)
    {
        $sql = "SELECT *
                FROM tb_tiket_helpdesk
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_satker = tb_petugas_satker.id_satker
                WHERE no_tiket_helpdesk = '{$id}'";

        $result = $this->db->query($sql);
        $result = $result->row();

        $data['title'] = 'Supervisor Jawab';
        $data['content'] = 'supervisor/jawab';

        $data['pertanyaan'] = $result;
        $this->load->view('master-template', $data);
    }

    public function eskalasi()
    {
        if ($this->input->post()) {

            $this->db->update('tb_tiket_helpdesk', array(
                'lavel' => 3
            ), array(
                'no_tiket_helpdesk' => $this->input->post('no_tiket_helpdesk')
            ));

            $this->_success(site_url('supervisor/list_pertanyaan'), 'Pertanyaan berhasil dieskalasi ke Kasi & Pelaksana', 5);

        }
    }

    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}