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
        $data['content'] = 'frontdesk/man_forum/man_forum';
        $data['forums'] = $this->db->query(
            "SELECT * FROM tb_forum
             WHERE id_parent IS NULL
             ORDER BY tanggal DESC ");

        $this->load->view('master-template', $data);
    }

    function view($id)
    {
        $result_forum = $this->mforum->get_one($id);
        $result_childs = $this->mforum->get_childs($id);

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'frontdesk/man_forum/man_forum_view';
        $data['forums'] = $result_forum;
        $data['childs'] = $result_childs;
        $this->load->view('master-template', $data);
    }

    function kirim()
    {
        $arr = array(
            'id_kat_forum' => $this->input->post('id_kat_forum'),
            'judul_forum' => $this->input->post('judul_forum'),
            'isi_forum'   => $this->input->post('isi_forum'),
            'id_parent'   => $this->input->post('id_parent'),
            'id_user'     => $this->session->userdata('id_user'),
            );

        $referrer = $this->input->post('referrer');

        $this->mforum->add_forum_by_array($arr);

        redirect($referrer);
    }
}