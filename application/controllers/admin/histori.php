<?php
class Histori extends CI_Controller
{
    public $title = 'Histori';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhistori', 'histori');
    }

    public function index()
    {
        $page = $this->histori->get_all_history();
        $pageData = $page['query']->result();
        $pageLink = $page['pagination1'];
        $nomor = $page['nomor_item'];

        $data = array('result' => $pageData, 'pageLink' => $pageLink, 'nomor' => $nomor,);

        $data['title'] = 'Histori';
        $data['content'] = 'admin/histori/index';

        $bc = array();
        @$bc[0]->link = 'admin/dashboard';
        @$bc[0]->label = 'Home';
        @$bc[1]->link = 'admin/histori';
        @$bc[1]->label = 'Histori';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function filter()
    {
        $tgl_mulai = $this->input->post('ftglmulai', TRUE);
        $tgl_akhir = $this->input->post('ftglselesai', TRUE);


        $keyword = $tgl_mulai . '_' . $tgl_akhir;

        $page = $this->histori->get_all_history_by_id($keyword);
        $pageData = $page['query']->result();
        $pageLink = $page['pagination1'];
        $mulai = $page['tgl_m'];
        $akhir = $page['tgl_a'];
        $nomor = $page['nomor_item'];

        $data = array('result' => $pageData, 'pageLink' => $pageLink, 'mulai' => $mulai, 'akhir' => $akhir, 'nomor' => $nomor,);

        $data['title'] = 'Histori Cari';
        $data['content'] = 'admin/histori/index';

        $bc = array();
        @$bc[0]->link = 'admin/dashboard';
        @$bc[0]->label = 'Home';
        @$bc[1]->link = 'admin/histori';
        @$bc[1]->label = 'Histori';
        @$bc[2]->link = $this->uri->uri_string();
        @$bc[2]->label = 'Hasil Pencarian';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
}