<?php
class Forum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mforum');
        $this->load->helper('text');
        $this->load->library('pagination');
    }

    function index()
    {
        $this->halaman(1);
    }

    function halaman($page = 1)
    {
        $result = $this->mforum->get();

        $this->load->library('pagination');

        $config['base_url'] = site_url('forum/halaman/');
        $config['total_rows'] = $this->mforum->count_forums();
        $config['per_page'] = 5; 
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config); 

        $data['pagination'] = $this->pagination->create_links();

        $data['referrer'] = 'forum';
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'forum/index';

        $offset = ((int)$page - 1) * $config['per_page'];
        $data['forums'] = $this->db->query(
            "SELECT f.*, u.nama FROM tb_forum f LEFT JOIN tb_user u
             ON (f.id_user = u.id_user)
             WHERE f.id_parent IS NULL
             ORDER BY tanggal DESC
             LIMIT $offset, 5");

        $this->load->view('new-template', $data);
    }

    function view($id)
    {
        $result_forum = $this->mforum->get_one_with_poster($id);
        $result_childs = $this->mforum->get_childs($id);

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'forum/view';
        $data['forums'] = $result_forum;
        $data['childs'] = $result_childs;
        $this->load->view('new-template', $data);
    }

    function edit($id_forum)
    {
        // $forum = $this->mforum->
    }
    function kirim()
    {

        $id_parent = ( ! $this->input->post('id_parent') ) ? NULL : $this->input->post('id_parent');
        $referrer = $this->input->post('referrer');

        $nmBr = '';
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
            $unik = date('isdm').'_';
            $nmBr = $unik . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/forum/'. $nmBr);
        }

        $arr = array(
            'id_kat_forum' => $this->input->post('id_kat_forum'),
            'judul_forum'  => $this->input->post('judul_forum'),
            'isi_forum'    => $this->input->post('isi_forum'),
            'id_parent'    => $id_parent,
            'id_user'      => $this->session->userdata('id_user'),
            'file'         => $nmBr,
            );


        $this->mforum->add_forum_by_array($arr);

        redirect($referrer);
    }
}