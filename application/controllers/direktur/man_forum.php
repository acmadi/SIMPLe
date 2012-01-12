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
        $data['content'] = 'direktur/man_forum/man_forum';
        $data['forums'] = $this->db->query(
            "SELECT f.*, u.nama FROM tb_forum f LEFT JOIN tb_user u
             ON (f.id_user = u.id_user)
             WHERE f.id_parent IS NULL
             ORDER BY tanggal DESC ");

        $this->load->view('new-template', $data);
    }

    function view($id)
    {
        $result_forum = $this->mforum->get_one_with_poster($id);
        $result_childs = $this->mforum->get_childs($id);

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'direktur/man_forum/man_forum_view';
        $data['forums'] = $result_forum;
        $data['childs'] = $result_childs;
        $this->load->view('new-template', $data);
    }

    function kirim()
    {

        $id_parent = ( ! $this->input->post('id_parent') ) ? NULL : $this->input->post('id_parent');
        $referrer = $this->input->post('referrer');

        // upload file
        // $config['file_name'] = date('isdm') . '_' . $_FILES['file']['name'];
        // $config['upload_path'] = BASEPATH . 'upload/forum/';
        // $config['allowed_types'] = 'doc|docx|xls|xlsx|ppt|pptx|txt|rtf|jpg';
        // $config['max_size'] = '10000';

        // $this->load->library('upload', $config);

        // $this->upload->do_upload();

        $nmBr = '';
        if (isset($_FILES['file']['name'])){
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