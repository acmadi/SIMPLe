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
        $this->category();
    }

    public function category($id_kat_knowledge_base = '', $keyword = '', $prev_keyword = NULL)
    {
        if($keyword != '') :
            if ($prev_keyword != NULL) :
                $keyword = $prev_keyword . ' ' . $keyword;
            endif;
            $data['prev_keyword'] = $keyword;

            // bikin keyword buat klausa LIKE di SQL
            $like_keyword = '%' . str_replace(' ', '%', $keyword) . '%';

            $query = $this->db->query(
                "SELECT * FROM tb_knowledge_base WHERE 
                    judul    LIKE '$like_keyword'
                 OR desripsi LIKE '$like_keyword'
                 OR jawaban LIKE '$like_keyword'
                 ");

            $data['kb'] = $query->result();

            $data['keyword'] = $keyword;

        else :
            if ($id_kat_knowledge_base == '') {
                $data['kb'] = $this->db->from('tb_knowledge_base')->get()->result();
            } else {
                $data['kb'] = $this->db->from('tb_knowledge_base a')
                        ->join('tb_kat_knowledge_base b', 'a.id_kat_knowledge_base = b.id_kat_knowledge_base')
                        ->where('a.id_kat_knowledge_base', $id_kat_knowledge_base)
                        ->get()
                        ->result();

                $res =  $this->mknowledge->get_all_category(
                        "WHERE id_kat_knowledge_base=$id_kat_knowledge_base")->result()
                        ;
                $data['active_cat'] = $res[0]->kat_knowledge_base;
            }
        endif;

        $data['categories'] = $this->db->from('tb_kat_knowledge_base')->get()->result();

        $data['title'] = 'Knowledge Base';
        $data['content'] = 'knowledge/knowledge_base';
        $this->load->view($this->template, $data);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $prev_keyword = $this->input->post('prev_keyword');
        $this->category('', $keyword, $prev_keyword);
    }
}