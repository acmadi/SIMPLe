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

    public function lihat_dokumen($nomor_tiket_frontdesk) {
        redirect(base_url('output/pengajuan_' . $nomor_tiket_frontdesk . '.pdf'), null, false);
    }

    public function status_tiket()
    {
        if ($_POST) {
            $sql = "SELECT no_tiket_frontdesk, a.id_unit, nama_unit, a.id_kementrian, nama_kementrian, keputusan,
                           status, tanggal_selesai, nomor_surat_usulan, a.tanggal, d.nip
                    FROM tb_tiket_frontdesk a
                    JOIN tb_kementrian b ON b.id_kementrian = a.id_kementrian
                    JOIN tb_unit c ON c.id_unit = a.id_unit AND c.id_kementrian = a.id_kementrian
                    JOIN tb_petugas_satker d ON a.id_petugas_satker = d.id_petugas_satker
                    WHERE a.no_tiket_frontdesk LIKE ?
                    OR a.nomor_surat_usulan LIKE ?
                    OR d.nip LIKE ?
                    OR b.nama_kementrian LIKE ?
                    OR c.nama_unit LIKE ?
                    ";
            $result = $this->db->query($sql, array(
                "%{$this->input->post('pencarian')}%",
                "%{$this->input->post('pencarian')}%",
                "%{$this->input->post('pencarian')}%",
                "%{$this->input->post('pencarian')}%",
                "%{$this->input->post('pencarian')}%",
            ));

            if ($result->num_rows() == 0) {
                $this->session->set_flashdata('error', 'Tiket tidak ditemukan');
                redirect('/halodja/status_tiket');
            }

            $data['tikets'] = $result;
        }
        $data['title'] = 'Cek Tiket';
        $data['no_tiket'] = $this->input->post('no_tiket');
        $data['content'] = 'halodja/cek_tiket';

        $this->load->view('new-template', $data);
    }
}