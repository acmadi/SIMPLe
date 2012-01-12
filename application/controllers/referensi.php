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
    	redirect('referensi/category');
    }

    public function category($cat = NULL)
    {
        if($cat != NULL) :
            $data['items'] = $this->mreferensi->get_by_category($cat);
        endif;

        $data['title'] = 'Referensi Peraturan';
        $data['categories'] = $this->mreferensi->get_categories();
        $data['content'] = 'referensi/category';
        $this->load->view('master-template', $data);
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
