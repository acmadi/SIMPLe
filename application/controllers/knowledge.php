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

    public function index()
    {
		$result = $this->db->query("SELECT * FROM tb_knowledge_base a 
									JOIN tb_kat_knowledge_base b 
									ON a.id_kat_knowledge_base = b.id_kat_knowledge_base");


		$data['knowledgebase'] = $result;

		$data['title'] = 'List Pertanayaan';
		$data['content'] = 'knowledge/knowledge_base';
		$this->load->view('new-template', $data);
		
    }
}