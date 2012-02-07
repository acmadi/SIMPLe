<?php
class Telepon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('numeric', '%s harus angka');
    }

    public function index()
    {
        $result = $this->db->query("SELECT * FROM tb_telepon WHERE approved = 1");

        $data['telepon'] = $result;
        $data['title'] = 'Daftar Telepon';
        $data['content'] = 'telepon/index';
        $this->load->view('new-template', $data);
    }

    public function add() {
        if ($_POST) {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('telepon1', 'Telepon #1', 'required|numeric|trim');
            $this->form_validation->set_rules('telepon2', 'Telepon #2', 'trim|numeric');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

            if ($this->form_validation->run()) {
                $sql = "INSERT INTO tb_telepon (nama, telepon1, telepon2, keterangan, approved) VALUES (?, ?, ?, ?, 0)";
                $this->db->query($sql, array(
                    $this->input->post('nama'),
                    $this->input->post('telepon1'),
                    $this->input->post('telepon2'),
                    $this->input->post('keterangan'),
                ));
                $this->session->set_flashdata('success', 'Data telepon baru telah dikirim');
                $this->log->create('Menambahkan telepon baru ID: ' . $this->db->insert_id());
                redirect('telepon/add');
            }
        }

        $data['title'] = 'Tambah Telepon';
        $data['content'] = 'telepon/add';
        $this->load->view('new-template', $data);
    }
}