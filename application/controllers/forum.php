<?php
class Forum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mforum');
        $this->load->helper('text');
    }

    function index($offset = 0)
    {
        $result = $this->mforum->get();

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'forum/index';


        // Pagination Setup
        $config['base_url'] = site_url('/forum/index/');
        $config['uri_segment'] = 3;
        $config['num_links'] = 10;
        $config['total_rows'] = $this->db->count_all('tb_forum');
        $config['per_page'] = $limit = 5;
//        $config['use_page_numbers'] = TRUE;

        $data['forums'] = $this->db->query("SELECT * FROM tb_forum ORDER BY tanggal DESC LIMIT ?, ?",
            array((int) $offset, (int) $config['per_page']));

        $this->pagination->initialize($config);

        $this->load->view('master-template', $data);
    }

    function view($id)
    {
        $result = $this->mforum->get_one($id);

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'frontdesk/man_forum/man_forum_view';
        $data['forums'] = $result;
        $this->load->view('master-template', $data);
    }
}