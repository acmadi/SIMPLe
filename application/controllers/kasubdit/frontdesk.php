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
        $page = $this->mfrontdesk->get_all_tiket_frontdesk(4, '  AND (tf.is_active = 1 OR tf.is_active = 2 ) ');
        $pageData = $page['query'];
        $pageLink = $page['pagination1'];

        $data = array('result' => $pageData, 'pageLink' => $pageLink,);
        $data['title'] = 'Kasubdit Front Desk';
        $data['content'] = 'kasubdit/frontdesk';
        $data['isian_form'] = $page['isian_form1'];

        //TODO Masih ragu dengan query ini. Mesti di recheck lagi. Tapi untuk sementara bolehlah. Fuuu!!
        $sql = "SELECT * FROM `tb_tiket_frontdesk` a
                        JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                        JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                        JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                        WHERE
                        c.anggaran = '{$this->session->userdata('anggaran')}'
                        AND status = 'open' AND
                        a.lavel = '{$this->session->userdata('lavel')}' AND
                        c.id_unit_satker = '{$this->session->userdata('id_unit_satker')}' AND
                        a.is_active = '4'
                        GROUP BY no_tiket_frontdesk
                        ORDER BY tanggal";

        //1 = diterima, 2 = diteruskan , 3= ditolak (bag pelaksana), 4= terima (bag subdit anggaran) , 5 = terima (bag subdit dadutek)

        $result = $this->db->query($sql);

        $data['result'] = $result;

        $this->load->view('new-template', $data);
    }

    function diterima($id)
    {
        $this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 1 WHERE no_tiket_frontdesk = ?", array($id));
        redirect('kasubdit/frontdesk');
    }

    function diteruskan($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();

        $this->db->update('tb_tiket_frontdesk', array(
            'lavel' => $query->lavel, 'is_active' => 5
        ), array(
            'no_tiket_frontdesk' => $id
        ));

        $this->_success(site_url('/kasubdit/dashboard'), 'Tiket berhasil diteruskan', 3);
    }

    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}