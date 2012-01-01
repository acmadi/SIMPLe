<?php
class Kb_koordinator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mknowledge', 'knowledge');
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data['title'] = 'Tambah Knowledge Baru';
        $data['content'] = 'kb_koordinator/dashboard';
        // $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('master-template', $data);
    }

    public function knowledge_base()
    {

        $result = $this->db->from('tb_knowledge_base')
                ->get();

        $data['knowledge_base'] = $result;

        $data['title'] = 'Daftar Knowledge Baru';
        $data['content'] = 'kb_koordinator/knowledge_base';
        // $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('master-template', $data);

    }

    public function delete($id)
    {
        $this->db->delete('tb_knowledge_base', array('id_knowledge_base' => $id));
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        $this->log->create("Menghapus Knowledge_base dengan ID $id");
        redirect('/kb_koordinator/knowledge_base');
    }

    public function edit($id)
    {
        if ($this->input->post()) {

            $this->db->update('tb_knowledge_base', array(
                'jawaban' => $this->input->post('jawaban'),
                'judul' => $this->input->post('judul'),
                'is_public' => $this->input->post('is_public'),
                'nama_narasumber' => $this->input->post('nama_narasumber'),
                'jabatan_narasumber' => $this->input->post('jabatan_narasumber'),
                'id_kat_knowledge_base' => $this->input->post('id_kat_knowledge_base'),
            ), array(
                'id_knowledge_base' => $id
            ));

            $this->session->set_flashdata('success', 'Berhasil mengubah data ke knowledge base');
            $this->log->create("Mengubah Knowledge_base dengan ID {$id}");

            redirect('/kb_koordinator/edit/' . $id);
        }

        $result = $this->db->from('tb_knowledge_base')
                ->where('id_knowledge_base', $id)
                ->get();

        $data['kb'] = $result->row();

        $data['title'] = 'Ubah Knowledge Base';
        $data['content'] = 'kb_koordinator/edit';
        $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('master-template', $data);
    }

    public function add()
    {
        if ($this->input->post()) {

            $this->db->insert('tb_knowledge_base', array(
                'jawaban' => $this->input->post('jawaban'),
                'judul' => $this->input->post('judul'),
                'is_public' => $this->input->post('is_public'),
                'nama_narasumber' => $this->input->post('nama_narasumber'),
                'jabatan_narasumber' => $this->input->post('jabatan_narasumber'),
                'id_kat_knowledge_base' => $this->input->post('id_kat_knowledge_base'),
            ));

            $this->session->set_flashdata('success', 'Berhasil menambah data ke knowledge base');
            $this->log->create("Menambah Knowledge_base dengan ID {$this->db->insert_id()}");
            redirect('/kb_koordinator/add');
        }
        $data['title'] = 'Tambah Knowledge Baru';
        $data['content'] = 'kb_koordinator/add';
        $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('master-template', $data);

    }
}