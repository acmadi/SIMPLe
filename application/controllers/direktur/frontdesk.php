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
                        WHERE status = 'open' AND
                        lavel <= 2 AND
                        is_active = 1";
        $data['antrian'] = $this->db->query($sql);

        $data['title'] = 'Konsultasi Front Desk';
        $data['content'] = 'pelaksana/frontdesk';
        $this->load->view('master-template', $data);
    }

    function diterima($id)
    {
        $data['title'] = 'Cek Tiket';
        $data['content'] = 'pelaksana/frontdesk_view';
        $data['tiket'] = $this->mfrontdesk->get_by_id($id);

        $this->load->view('master-template', $data);
    }

    function diteruskan($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();

        $this->db->update('tb_tiket_frontdesk', array(
            'lavel' => $query->lavel + 1
        ), array(
            'no_tiket_frontdesk' => $id
        ));

        $this->_success(site_url('/helpdesk/dashboard'), 'Tiket berhasil diteruskan', 3);


//        $data['title'] = 'Cek Tiket';
//        $data['content'] = 'pelaksana/frontdesk_view';
//        $data['tiket'] = $this->mfrontdesk->get_by_id($id);
//
//        $this->load->view('master-template', $data);
    }

    function reject($id)
    {
        if (!$_POST) {
            $query = $this->db->from('tb_tiket_frontdesk')
                    ->join('tb_petugas_satker', 'tb_petugas_satker.id_petugas_satker = tb_tiket_frontdesk.id_petugas_satker')
                    ->join('tb_satker', 'tb_satker.id_satker = tb_tiket_frontdesk.id_satker')
                    ->where('no_tiket_frontdesk', $id)
                    ->get()->row();

            $data['data'] = $query;

        } else {

            $this->db->insert('tb_pengembalian_doc', array(
                'no_tiket_frontdesk' => $this->input->post('no_tiket_frontdesk'),
                'id_user' => $this->input->post('id_user'),
                'catatan' => $this->input->post('catatan'),
            ));

            $this->db->update('tb_tiket_frontdesk', array(
                'is_active' => 3,
                'status' => 'close'
            ), array(
                'no_tiket_frontdesk' => $this->input->post('no_tiket_frontdesk'),
            ));

            redirect('pelaksana/frontdesk');
            //            $this->_success(site_url('pelaksana/frontdesk'), 'Data ketidaklengkapan dokumen telah disimpan.', 3);
        }


        $data['title'] = 'Cek Tiket';
        $data['content'] = 'pelaksana/reject';


        $this->load->view('master-template', $data);
    }

    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}