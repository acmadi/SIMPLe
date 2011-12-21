<?php
class Helpdesk_form_pertanyaan_lanjut extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title'] = 'Helpdesk Form - Pertanyaan';
        $data['result'] = $this->db->query("SELECT * FROM tb_knowledge_base WHERE judul LIKE '%{$pertanyaan}%' OR desripsi LIKE '%{$pertanyaan}%'");
        $data['content'] = 'helpdesk/helpdesk/helpdesk_form_pertanyaan_lanjut';
        $this->load->view('master-template', $data);
    }
}

?>