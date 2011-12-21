<?php
class Man_forum extends CI_Controller
{

    function Man_forum()
    {
        parent::__construct();
        $this->load->model('mforum');
        $this->load->helper('text');
    }

    function index()
    {
        $result = $this->mforum->get();

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'csa/man_forum/man_forum';
        $data['forums'] = $this->db->query("SELECT * FROM tb_forum ORDER BY tanggal DESC");

        $this->load->view('master-template', $data);
    }

    function view($id)
    {
        $result = $this->mforum->get_one($id);

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'csa/man_forum/man_forum_view';
        $data['forums'] = $result;
        $this->load->view('master-template', $data);
    }
}