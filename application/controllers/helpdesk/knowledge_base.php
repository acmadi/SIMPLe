<?php
class Knowledge_base extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mknowledge', 'knowledge');
        $this->load->library('Log');
    }

    function index()
    {
        $data['title'] = 'Knowledge Base';
        $data['content'] = 'helpdesk/knowledge/knowledge_base';
        $data['result'] = $this->knowledge->get_all_data_category();
        $data['idsearch'] = "";
        $this->load->view('master-template', $data);
    }

    function search_knowledge()
    {
        $this->form_validation->set_rules('fkat', 'Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/helpdesk/knowledge_base');
        }
        else
        {
            $category = $this->input->post('fkat', TRUE);
            $data['result'] = $this->knowledge->search_by_keyword($category);
            $data['title'] = 'Knowledge Base';
            $data['content'] = 'helpdesk/knowledge/knowledge_base';
            $data['part'] = 3;
            $data['idsearch'] = $category;
            $this->load->view('master-template', $data);
        }
    }

    function search_all($cat = '', $keyword = '')
    {
        $cat = $this->uri->segment(4, '');
        $keyword = $this->uri->segment(5, '');

        if (!empty($cat) OR !empty($limit)) {
            $item = $this->knowledge->search_by_category($cat, $keyword);
            $data['title'] = 'Knowledge Base';

            //            if (!empty($cat) {
            //
            //            }
            $data['content'] = 'helpdesk/knowledge/knowledge_base';
            $data['result'] = $item;
            $data['idsearch'] = $keyword;
            $data['sel'] = true;
            $this->load->view('master-template', $data);
        }

    }


    public function get_by_category_id($category_id)
    {
        $result = $this->knowledge->get_by_category_id($category_id);

        foreach ($result->result() as $value) {
            echo "<h1>{$value->kat_knowledge_base}</h1>";
            echo "<h2>{$value->judul}</h2>";
            echo "<div>{$value->desripsi}</div>";
            echo "<div>{$value->jawaban}</div>";
            echo "<div><input type=submit class='button blue-pill' value='Batal' /></div>";
            echo "<div><input type=submit class='button blue-pill' value='Ekskalasi' /></div>";
            echo "<div><input type=submit class='button blue-pill' value='Jawab' /></div>";
        }
        exit();
    }

    public function get_by_id($id)
    {
        $result = $this->knowledge->get_by_id($id);

        foreach ($result->result() as $value) {

            //            print_r($value);
            echo "<h1>{$value->kat_knowledge_base}</h1>";
            echo "<h2>{$value->judul}</h2>";
            echo "<div>{$value->desripsi}</div>";
            echo "<div>{$value->jawaban}</div>";
            echo "<div><input type=submit class='button blue-pill' value='Batal' /></div>";
            echo "<div><input type=submit class='button blue-pill' value='Ekskalasi' /></div>";
            echo "<div><input type=submit class='button blue-pill' value='Jawab' /></div>";
        }
        exit();
    }

    public function search()
    {
        $pertanyaan = $this->input->get('cari');
        $result = $this->db->query("SELECT * FROM tb_knowledge_base WHERE judul LIKE '%{$pertanyaan}%' OR desripsi LIKE '%{$pertanyaan}%' OR jawaban LIKE '%{$pertanyaan}%'");

        foreach ($result->result() as $value) {
            echo sprintf('<h2><a href="javascript:void(0)" onclick="popUpReferensiJawaban(%s)">%s</a></h2>', $value->id_knowledge_base, $value->judul );
            echo sprintf('<p><em>%s</em></p>', $value->judul);
            echo '<hr/>';
        }
    }
}

?>