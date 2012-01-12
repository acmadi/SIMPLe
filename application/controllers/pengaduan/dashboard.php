<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('msatker', 'satker');
        $this->load->model('mpengaduan', 'pengaduan');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    public function index()
    {
        $data['kementrian'] = $this->db->query('SELECT * FROM tb_kementrian ORDER BY id_kementrian');


        $sql = "SELECT * FROM tb_user a
                JOIN tb_lavel b
                ON a.id_lavel = b.id_lavel
                WHERE b.lavel != 1";
        $data['level'] = $this->db->query($sql);

        $data['title'] = 'Dashboard';
        $data['content'] = 'pengaduan/index';
        $this->load->view('new-template', $data);
    }

    public function save_identitas()
    {
        $this->form_validation->set_rules('nama_kl', 'Nama K/L', 'required');
        $this->form_validation->set_rules('eselon', 'Eselon', 'required');
        $this->form_validation->set_rules('kode_satker', 'Nama - Kode Satker', 'required');
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('jabatan_petugas', 'Jabatan Petugas', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('no_kantor', 'No Kantor', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pengaduan', 'Pengaduan', 'required');
        $this->form_validation->set_rules('kepada', 'Kepada', 'required');

        if ($this->form_validation->run() == TRUE) {

            $nama_petugas = $this->input->post('nama_petugas');
            $jabatan_petugas = $this->input->post('jabatan_petugas');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $no_kantor = $this->input->post('no_kantor');
            $tipe = $this->input->post('tipe');
            $pengaduan = $this->input->post('pengaduan');
            $kepada = $this->input->post('kepada');

            $kode_satker = explode(', ', $this->input->post('kode_satker'));
            array_pop($kode_satker);

            $this->db->trans_begin();

            // Save Identitas Petugas Satker
            $sql = "INSERT INTO tb_petugas_satker (nama_petugas, jabatan_petugas, no_hp, email, no_kantor, tipe)
                           VALUES ('{$nama_petugas}', '{$jabatan_petugas}', '{$no_hp}', '{$email}', '{$no_kantor}', '{$tipe}')";

            $this->db->query($sql);

            $petugas_id = $this->db->insert_id();

            $sql = "INSERT INTO tb_pengaduan (id_petugas_satker, id_lavel, pengaduan, tanggal)
                    VALUES(?, ?, ?, NOW())";
            $this->db->query($sql, array($petugas_id, $kepada, $pengaduan));

            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('/pengaduan/dashboard');


        } else {
            $this->index();
        }


    }

    public function antrian()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {
        */
        $dt['no_antrian'] = $this->satker->antrian_terakhir('E');

        $data['title'] = 'Dashboard';
        $data['content_html'] = $this->load->view('pengaduan/dashboard', $dt, TRUE);
        $this->load->view('new-template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }
        */
    }

    public
    function plusone()
    {
        $this->satker->plusone('E');
        redirect('pengaduan/dashboard');
    }


    public function identitas()
    {
        /*if ($this->session->userdata('login') == TRUE)
        {*/

        $dt['no_tiket'] = $this->satker->antrian_terakhir('E');
        $dt['petugas'] = $this->satker->get_petugas_satker();

        $data['title'] = 'Isi Identitas Satker';
        $data['content_html'] = $this->load->view('pengaduan/identitas', $dt, TRUE);
        $this->load->view('new-template', $data);
        /*}
       else
        {
            $this->load->view('login/login_view');
        }*/
    }

    public function tampil()
    {
        $data['pengaduans'] = $this->pengaduan->get();

        $this->load->view('pengaduan/tampil', $data);
    }

    public function form()
    {
        // form pengaduan
        $id = $this->input->post('id_petugas_satker');

        $data['id_petugas_satker'] = $id;
        $data['petugas'] = $this->satker->get_petugas_satker($id);
        $data['users'] = $this->pengaduan->get_users();

        $this->load->helper('form');

        $tpl['title'] = 'Form Pengaduan';
        $tpl['content_html'] = $this->load->view('pengaduan/form', $data, TRUE);
        $this->load->view('new-template', $tpl);
    }

    public function kirim_pengaduan()
    {
        // proses pengiriman pengaduan

        $post = $this->input->post();

        $this->pengaduan->add(
            $post['id_petugas_satker'],
            $post['id_user'],
            $post['pengaduan']);

        $this->session->set_flashdata('pesan', 'Pengaduan anda berhasil dikirim.');
        redirect('pengaduan/dashboard', 'location');
    }
}