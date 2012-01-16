<?php
class Helpdesk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
    }

    public function index()
    {

    }

    public function done($tiket_id, $id_knowledge_base)
    {
        $data = array(
            'id_knowledge_base' => $id_knowledge_base,
            'status' => 'close',
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->update('tb_tiket_helpdesk', $data, array('id' => $tiket_id));
        $this->log->create("Pertanyaan dengan tiket #{$tiket_id} telah dijawab.");
        $this->_success(site_url('/helpdesk/dashboard'), 'Jawaban berhasil dimasukkan', 3);
    }

    public function next($tiket_id, $id_knowledge_base)
    {
        $data = array(
            'id_knowledge_base' => $id_knowledge_base,
            'status' => 'close',
            'tanggal' => date('Y-m-d H:i:s'),
            'no_tiket_helpdesk' => $this->session->userdata('no_tiket')
        );
        $this->db->update('tb_tiket_helpdesk', $data, array('id' => $this->session->userdata('id_satker')));

        $temp = $this->db->from('tb_tiket_helpdesk')->where('id', $this->session->userdata('id_tiket'))->limit(1)->get();

        $temp = ($temp->row());

        unset($data);

        //        $data = array(
        //            'id_satker' => $temp->id_satker,
        //            'id_petugas_satket' => $temp->id_petugas_satket,
        //            'lavel' => $temp->lavel,
        //            'tanggal' => date('Y-m-d H:i:s'),
        //            'parent_id' => $this->session->userdata('tiket')
        //        );

        //        $this->db->insert('tb_tiket_helpdesk', $data);

        $this->_success(site_url('/helpdesk/helpdesk_form_pertanyaan'), 'Jawaban berhasil dimasukkan', 100);
    }

    public function eskalasi($id_tiket)
    {
        $query = $this->db->get_where('tb_tiket_helpdesk', array('id' => $id_tiket))->row();

        $lavel = $query->lavel;

        $data = array(
            'lavel' => $lavel + 1
        );
        $this->db->update('tb_tiket_helpdesk', $data, array('id' => $id_tiket));
        $this->log->create("Pertanyaan dengan tiket #{$id_tiket} telah dieskalasi");
        $this->_success(site_url('/helpdesk/dashboard'), 'Pertanyaan berhasil dieskalasi', 3);
    }

    public function eskalasi_next($id)
    {

    }

    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}
