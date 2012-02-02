<?php
class Telpon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $result = $this->db->query("SELECT * FROM tb_telpon");

        $data['telpon'] = $result;
        $data['title'] = 'Daftar Telpon';
        $data['content'] = 'admin/telpon/index';
        $this->load->view('admin/template', $data);
    }

    public function add()
    {
        if ($_POST) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('telpon', 'Telpon #1', 'required|numeric|trim');
            $this->form_validation->set_rules('telpon2', 'Telpon #2', 'numeric|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

            if ($this->form_validation->run() == TRUE) {
                $this->db->insert('tb_telpon', array(
                    'nama' => $this->input->post('nama'),
                    'telpon1' => $this->input->post('telpon'),
                    'telpon2' => $this->input->post('telpon2'),
                    'keterangan' => $this->input->post('keterangan'),
                ));
                $this->log->create('Menambah telpon baru ID ' . $this->db->insert_id());
                $this->session->set_flashdata('success', 'Telpon baru telah dimasukkan');
                redirect('admin/telpon/add');
            }
        }

        $data['title'] = 'Tambah Telpon';
        $data['content'] = 'admin/telpon/add';
        $this->load->view('admin/template', $data);
    }

    public function edit($id)
    {
        if ($_POST) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('telpon', 'Telpon #1', 'required|numeric|trim');
            $this->form_validation->set_rules('telpon2', 'Telpon #2', 'numeric|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

            if ($this->form_validation->run() == TRUE) {
                $this->db->update('tb_telpon', array(
                    'nama' => $this->input->post('nama'),
                    'telpon1' => $this->input->post('telpon'),
                    'telpon2' => $this->input->post('telpon2'),
                    'keterangan' => $this->input->post('keterangan'),
                ), array(
                    'id' => $id
                ));
                $this->log->create('Mengubah telpon ID ' . $this->db->insert_id());
                $this->session->set_flashdata('success', 'Telpon telah diubah');
                redirect('admin/telpon/edit/' . $id);
            }
        }

        $telpon = $this->db->from('tb_telpon')->where('id', $id)->get()->row();

        $data['telpon'] = $telpon;
        $data['title'] = 'Ubah Telpon';
        $data['content'] = 'admin/telpon/edit';
        $this->load->view('admin/template', $data);
    }

    public function delete($id)
    {
        $this->db->delete('tb_telpon', array(
            'id' => $id
        ));
        $this->log->create('Menghapus telpon ID ' . $id);
        $this->session->set_flashdata('success', 'Telpon telah dihapus');
        redirect('admin/telpon');
    }
}