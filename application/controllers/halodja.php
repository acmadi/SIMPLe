<?php
class Halodja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk');
        $this->load->model('munit');
    }

    public function dashboard() {
        redirect('halodja/index');
    }

    public function index()
    {
        $data['content'] = '';
        $this->load->view('new-template', $data);
    }

    public function status_tiket()
    {
        if ($_POST) {
            $sql = "SELECT  no_tiket_frontdesk, a.id_unit, nama_unit, a.id_kementrian, nama_kementrian, keputusan, status, tanggal_selesai
                    FROM tb_tiket_frontdesk a
                    JOIN tb_kementrian b ON b.id_kementrian = a.id_kementrian
                    JOIN tb_unit c ON c.id_unit = a.id_unit AND c.id_kementrian = a.id_kementrian
                    WHERE a.no_tiket_frontdesk = ?";
            $result = $this->db->query($sql, array($this->input->post('no_tiket')));

            if ($result->num_rows() == 0) {
                $this->session->set_flashdata('error', 'Tiket tidak ditemukan');
                redirect('/halodja/status_tiket');
            }

            $data['tiket'] = $result->row();
        }
        $data['title'] = 'Cek Tiket';
        $data['no_tiket'] = $this->input->post('no_tiket');
        $data['content'] = 'halodja/cek_tiket';

        $this->load->view('new-template', $data);
    }
}