<?php
class Knowledge extends CI_Controller
{
    public $template = 'new-template.php';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mknowledge');
        $this->load->helper('tanggal');
    }

    public function index($id_kat_knowledge_base = '')
    {
        if ($id_kat_knowledge_base == '') {
            $data['kb'] = $this->db->from('tb_knowledge_base')->get()->result();
        } else {
            $data['kb'] = $this->db->from('tb_knowledge_base a')
                    ->join('tb_kat_knowledge_base b', 'a.id_kat_knowledge_base = b.id_kat_knowledge_base')
                    ->where('a.id_kat_knowledge_base', $id_kat_knowledge_base)
                    ->get()
                    ->result();
        }
        $data['categories'] = $this->db->from('tb_kat_knowledge_base')->get()->result();

        $data['title'] = 'Knowledge Base';
        $data['content'] = 'knowledge/knowledge_base';
        $this->load->view($this->template, $data);
    }
}