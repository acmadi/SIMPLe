<?php
class Telepon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = $this->db->query("SELECT * FROM tb_telepon");

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/telepon';
        $bc[1]->label = 'Telepon';
        $data['breadcrumb'] = $bc;

        $data['telepon'] = $result;
        $data['title'] = 'Daftar Telepon';
        $data['content'] = 'admin/telepon/index';
        $this->load->view('admin/template', $data);
    }

    public function add()
    {
        if ($_POST) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('telepon', 'Telepon #1', 'required|numeric|trim');
            $this->form_validation->set_rules('telepon2', 'Telepon #2', 'numeric|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

            if ($this->form_validation->run() == TRUE) {
                $this->db->insert('tb_telepon', array(
                    'nama' => $this->input->post('nama'),
                    'telepon1' => $this->input->post('telepon'),
                    'telepon2' => $this->input->post('telepon2'),
                    'keterangan' => $this->input->post('keterangan'),
                ));
                $this->log->create('Menambah telepon baru ID ' . $this->db->insert_id());
                $this->session->set_flashdata('success', 'Telepon baru telah dimasukkan');
                redirect('admin/telepon/add');
            }
        }

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/telepon';
        $bc[1]->label = 'Telepon';
        $bc[2]->link = 'admin/telepon/add';
        $bc[2]->label = 'Tambah';
        $data['breadcrumb'] = $bc;

        $data['title'] = 'Tambah Telepon';
        $data['content'] = 'admin/telepon/add';
        $this->load->view('admin/template', $data);
    }

    public function edit($id)
    {
        if ($_POST) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('telepon', 'Telepon #1', 'required|numeric|trim');
            $this->form_validation->set_rules('telepon2', 'Telepon #2', 'numeric|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

            if ($this->form_validation->run() == TRUE) {
                $this->db->update('tb_telepon', array(
                    'nama' => $this->input->post('nama'),
                    'telepon1' => $this->input->post('telepon'),
                    'telepon2' => $this->input->post('telepon2'),
                    'keterangan' => $this->input->post('keterangan'),
                    'approved' => $this->input->post('approved'),
                ), array(
                    'id' => $id
                ));
                $this->log->create('Mengubah telepon ID ' . $this->db->insert_id());
                $this->session->set_flashdata('success', 'Telepon telah diubah');
                redirect('admin/telepon/edit/' . $id);
            }
        }

        $telepon = $this->db->from('tb_telepon')->where('id', $id)->get()->row();

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/telepon';
        $bc[1]->label = 'Telepon';
        $bc[2]->link = 'admin/telepon/edit/' . $this->uri->segment(4);
        $bc[2]->label = 'Ubah';
        $data['breadcrumb'] = $bc;

        $data['telepon'] = $telepon;
        $data['title'] = 'Ubah Telepon';
        $data['content'] = 'admin/telepon/edit';
        $this->load->view('admin/template', $data);
    }

    public function delete($id)
    {
        $this->db->delete('tb_telepon', array(
            'id' => $id
        ));
        $this->log->create('Menghapus telepon ID ' . $id);
        $this->session->set_flashdata('success', 'Telepon telah dihapus');
        redirect('admin/telepon');
    }
}