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

        // update tabel tiket 
        $data = array(
            'id_knowledge_base' => $id_knowledge_base,
            'status' => 'close',
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->update('tb_tiket_helpdesk', $data, array('id' => $tiket_id));


        // update log tiket 
        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_tiket' => $tiket_id,
        );
        $this->db->insert('tb_tiket_log', $data);

        $this->log->create("Pertanyaan dengan tiket #{$tiket_id} telah dijawab.");

        // Nyari pertanyaan sebelumnya
        $result = $this->db->from('tb_tiket_helpdesk')
                ->where('no_tiket_helpdesk', $tiket_id)
                ->get();

        $pertanyaan_sebelumnya = array();

        foreach ($result->result() as $value) {
            $pertanyaan_sebelumnya[] = array(
                'pertanyaan' => $value->pertanyaan,
                'jawab' => $value->jawab
            );
        }

        $this->session->set_userdata('pertanyaan_sebelumnya', $pertanyaan_sebelumnya);

        $this->_success(site_url('/helpdesk/helpdesk_form_pertanyaan'), 'Jawaban berhasil dimasukkan', 3);
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
        $this->_success(site_url('/helpdesk/helpdesk_form_pertanyaan'), 'Pertanyaan berhasil dieskalasi', 3);
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
