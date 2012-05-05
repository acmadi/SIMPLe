<?php
class Frontdesk extends CI_Controller
{
    public $title = 'Front Desk';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk', 'frontdesk');
    }

    public function index()
    {
        $key = $this->input->post('fcari');
        $value = $this->input->post('fkeyword');
        $page = $this->frontdesk->get_all_tiket();
        $pageData = $page['query']->result();
        $pageLink = $page['pagination1'];
        $nomor = $page['nomor_item'];

        $data = array('result' => $pageData, 'pageLink' => $pageLink, 'nomor' => $nomor,);
        $data['title'] = 'Help Desk';
        $data['pilihan'] = array(
            'noantrian' => 'No Tiket',
            'namasatker' => 'Nama Satker',
            'status' => 'Status',
        );
        $data['cari'] = $value;
        $data['keyword'] = $value;
        $data['nomor'] = $nomor;
        $data['content'] = 'admin/frontdesk/frontdesk';

        $bc = array();
        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/frontdesk';
        $bc[1]->label = 'Frontdesk';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function delete($no_tiket_frontdesk)
    {
        $sql = "DELETE FROM tb_tiket_frontdesk WHERE no_tiket_frontdesk = ?";
        $this->db->query($sql, array($no_tiket_frontdesk));
        redirect('admin/frontdesk');
    }
}