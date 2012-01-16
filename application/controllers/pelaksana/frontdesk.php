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
		$this->load->helper('tanggal_helper');
        $page		= $this->mfrontdesk->get_all_tiket_frontdesk();
		$pageData	= $page['query'];
		$pageLink	= $page['pagination1'];
		
		$data				= array('result'=>$pageData,'pageLink'=>$pageLink,);
        $data['title'] 		= 'Konsultasi Front Desk';
        $data['content'] 	= 'pelaksana/frontdesk';
		$data['isian_form']	= $page['isian_form1'];


        //TODO Masih ragu dengan query ini. Mesti di recheck lagi. Tapi untuk sementara bolehlah. Fuuu!!
        $sql = "SELECT * FROM `tb_tiket_frontdesk` a
                JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                WHERE
                c.anggaran = '{$this->session->userdata('anggaran')}'
                AND status = 'open' AND
                a.lavel = '{$this->session->userdata('lavel')}' AND
                c.id_unit_satker = '{$this->session->userdata('id_unit_satker')}'
                GROUP BY no_tiket_frontdesk
                ORDER BY tanggal";

        $result = $this->db->query($sql);

        $data['result'] = $result;

        $this->load->view('new-template', $data);
    }

    function diterima($id)
    {
		$this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 1 WHERE no_tiket_frontdesk = ?",array($id));
		redirect('pelaksana/frontdesk');
    }

    function diteruskan($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();
		
        $this->db->update('tb_tiket_frontdesk', array(
            'lavel' => 4,'is_active' => 2
        ), array(
            'no_tiket_frontdesk' => $id
        ));
		
        $this->_success(site_url('/pelaksana/dashboard'), 'Tiket berhasil diteruskan', 3);
    }

    function reject($id)
    {
        if (!$_POST) {
            $data['data'] = $this->mfrontdesk->get_tiket_frontdesk_by_id($id);
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
        }


        $data['title'] = 'Cek Tiket';
        $data['content'] = 'pelaksana/reject';
        $this->load->view('new-template', $data);
    }

    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}