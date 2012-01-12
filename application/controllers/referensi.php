<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
Class Referensi extends CI_Controller
{
    public function Referensi()
    {
        parent::__construct();
        $this->load->model('mreferensi');
        $this->load->helper('dom_helper');
    }

    public function index()
    {
    	redirect('referensi/search');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');

    	$data['title'] = 'Referensi Peraturan';
    	$data['keyword'] = $keyword;
    	$data['result_array'] = $this->mreferensi->cari($keyword);
        $data['content'] = 'referensi/search';
        $this->load->view('master-template', $data);
    }
}
