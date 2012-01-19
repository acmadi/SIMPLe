<?php
class List_pertanyaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
    }

    public function index()
    {
        $sort = '';
        $sql = '';
        
        if (isset($_GET['sort'])) {
            $sort = $this->input->get('sort');
            $sql = "SELECT * FROM tb_tiket_helpdesk
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                WHERE
                status = 'open' AND
                lavel = 2
                ORDER BY {$sort} DESC";
        } else {
            $sql = "SELECT * FROM tb_tiket_helpdesk
                LEFT JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                WHERE
                status = 'open' AND
                lavel = '2'";
        }
        
        $result = $this->db->query($sql);
        echo $this->db->last_query();

        $data['title'] = 'Knowledge Base';
        $data['content'] = 'supervisor/list_pertanyaan';
        $data['pertanyaan'] = $result;
        $this->load->view('new-template', $data);

    }
}