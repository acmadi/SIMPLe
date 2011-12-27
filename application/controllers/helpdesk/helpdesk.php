<?php
class Helpdesk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
    }

    public function index() {

    }

    public function done($tiket_id, $id_knowledge_base) {
        $data = array(
            'id_knowledge_base' => $id_knowledge_base,
            'status' => 'close',
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->update('tb_tiket_helpdesk', $data, array('no_tiket_helpdesk' => $tiket_id));

        $this->_success(site_url('/helpdesk/identitas_satker'), 'Jawaban berhasil dimasukkan', 3);
    }

    private function _success($url, $message, $time) {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}
