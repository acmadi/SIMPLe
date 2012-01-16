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
        $page = $this->mfrontdesk->get_all_tiket_frontdesk(5, '');
        $pageData = $page['query'];
        $pageLink = $page['pagination1'];

        $data = array('result' => $pageData, 'pageLink' => $pageLink,);
        $data['title'] = 'Konsultasi Front Desk';
        $data['content'] = 'direktur/frontdesk';
        $data['isian_form'] = $page['isian_form1'];

        //TODO Masih ragu dengan query ini. Mesti di recheck lagi. Tapi untuk sementara bolehlah. Fuuu!!
        $sql = "SELECT * FROM `tb_tiket_frontdesk` a
                        JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                        JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                        JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                        WHERE
                        c.anggaran = '{$this->session->userdata('anggaran')}'
                        AND status = 'open' AND
                        a.lavel = '{$this->session->userdata('lavel')}'

                        GROUP BY no_tiket_frontdesk
                        ORDER BY tanggal";

        $result = $this->db->query($sql);

        $data['result'] = $result;

        $this->load->view('new-template', $data);
    }

    function diterima($id)
    {
        $this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 1 WHERE no_tiket_frontdesk = ?", array($id));
        redirect('direktur/frontdesk');
    }

    function diteruskan($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();

        $this->db->update('tb_tiket_frontdesk', array(
            'lavel' => 6, 'is_active' => 2
        ), array(
            'no_tiket_frontdesk' => $id
        ));

        $this->_success(site_url('/direktur/dashboard'), 'Tiket berhasil diteruskan', 3);
    }

    function accept($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();

        $this->db->update('tb_tiket_frontdesk', array(
            'status' => 'close', 'is_active' => 6
        ), array(
            'no_tiket_frontdesk' => $id
        ));
        $this->_success(site_url('/direktur/dashboard'), 'Tiket berhasil ditetapkan', 3);
    }

    function reject($id)
    {
        $this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 0 ,status = 'close' WHERE no_tiket_frontdesk = ?", array($id));
        redirect('direktur/dashboard');
    }


    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}