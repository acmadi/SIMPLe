<?php
class Referensi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mreferensi');
    }

    var $title = 'Manajemen Referensi Peraturan';

    function index()
    {
    	$data['refs'] = $this->mreferensi->get_all();
    	$data['title'] = 'Manajemen Ubah Forum';
        $data['content'] = 'admin/referensi/show';

        $this->load->view('admin/template', $data);
    }

}