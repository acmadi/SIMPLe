<?php
class Knowledge_base extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mknowledge', 'knowledge');
        $this->load->library('Log');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    function index()
    {
        $data['title'] = 'Knowledge Base';
        $data['content'] = 'pelaksana/knowledge/knowledge_base';
        $data['result'] = $this->knowledge->get_all_data_category();
        $data['idsearch'] = "";
        $this->load->view('new-template', $data);
    }

    function lists($id_kat_knowledge_base = '')
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
        $this->load->view('new-template', $data);
    }

    function search_knowledge()
    {
        $this->form_validation->set_rules('fkat', 'Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/pelaksana/knowledge_base');
        }
        else
        {
            $category = $this->input->post('fkat', TRUE);
            $data['result'] = $this->knowledge->search_by_keyword($category);
            $data['title'] = 'Knowledge Base';
            $data['content'] = 'pelaksana/knowledge/knowledge_base';
            $data['part'] = 3;
            $data['idsearch'] = $category;
            $this->load->view('new-template', $data);
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
            $data['content'] = 'pelaksana/knowledge/knowledge_base';
            $data['result'] = $item;
            $data['idsearch'] = $keyword;
            $data['sel'] = true;
            $this->load->view('new-template', $data);
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
            echo "<div><input type=submit class='button blue-pill' value='Eskalasi' /></div>";
            echo "<div><input type=submit class='button blue-pill' value='Jawab' /></div>";
        }
        exit();
    }

    public function get_by_id($id)
    {
        $result = $this->db->query("SELECT * FROM tb_knowledge_base WHERE id_knowledge_base = '$id'");

        foreach ($result->result() as $value) {

            //            print_r($value);
            //            echo "<h1>{$value->kat_knowledge_base}</h1>";
            echo "<h2>{$value->judul}</h2>";
            //            echo "<div>{$value->desripsi}</div>";
            echo "<div>{$value->jawaban}</div>";
            //            echo "<div><input type=submit class='button blue-pill' value='Batal' /></div>";
            //            echo "<div><input type=submit class='button blue-pill' value='Eskalasi' /></div>";
            //            echo "<div><input type=submit class='button blue-pill' value='Jawab' /></div>";
            echo "<input type='hidden' name='jawaban' value='$value->id_knowledge_base' />";
        }
        exit();
    }

    public function one($id)
    {
        $data['title'] = 'Knowledge Base';
        $data['content'] = 'pelaksana/knowledge/knowledge_base_one';

        $result = $this->db->query("SELECT * FROM tb_knowledge_base WHERE id_knowledge_base = '{$id}' LIMIT 1");
        $result = $result->result();
        $result = $result[0];
        $data['result'] = $result;

        $this->load->view('new-template', $data);
    }

    public function search()
    {
        $cari = $this->input->get('cari');
        $result = $this->db->from('tb_knowledge_base a')
                ->like('judul', $cari)
                ->or_like('judul', $cari)
                ->get();

        //        echo json_encode($result->result(), JSON_FORCE_OBJECT);
        echo '<ul style="list-style: inside;">';
        foreach ($result->result() as $value) {
            echo "<li>
                    <a href=\"javascript:void(0)\" class=\"referensi-jawaban\" title=\"{$value->id_knowledge_base}\">{$value->judul}</a>
                 </li>";
        }
        echo '</ul>';
    }
}

?>