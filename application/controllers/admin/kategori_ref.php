<?php
class Kategori_ref extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
        $this->form_validation->set_message('numeric', '<strong>%s</strong> harus angka.');
        $this->form_validation->set_message('min_length', '<strong>%s</strong> harus %s angka.');
        $this->form_validation->set_message('max_length', '<strong>%s</strong> harus %s angka.');
    }

    public function index($id = 0)
    {
        if ($this->input->get('submit')) {
            $result = $this->db->from('tb_referensi_kat')
                    ->like('nama_kat', $this->input->get('cari'))
                    ->or_like('id_referensi_kat', $this->input->get('cari'))
                    ->get();

        } else {
            $config['per_page'] = 25;
            $config['total_rows'] = $this->db->count_all('tb_referensi_kat');
            $config['base_url'] = site_url('/admin/kategori_ref/index/');
            $config['uri_segment'] = 4;
            $config['use_page_numbers'] = false;
            $config['num_links'] = 10;

            $this->pagination->initialize($config);

            $result = $this->db->from('tb_referensi_kat')
            //->join('tb_petugas_satker c', 'c.id_satker = a.id_satker')
                    ->limit($config['per_page'], $id)
                    ->get();
        }

        $data['bla'] = $result;
        $data['title'] = 'Daftar Kategori Referensi';
        $data['content'] = 'admin/kategori_ref';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/kategori_ref';
        $bc[1]->label = 'Kategori Referensi';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function view_kategotri_ref($id_referensi_kat)
    {
        $result = $this->db->from('tb_referensi_kat')
                ->where('id_referensi_kat', $id_referensi_kat)
                ->get();

        $data['kategori_ref'] = $result;

        $data['title'] = 'Lihat Kategori Referensi';
        $data['content'] = 'admin/view_kategori_ref';

        $this->load->view('admin/template', $data);
    }

    public function edit($id_referensi_kat)
    {
        if (isset($_POST)) {

            $this->form_validation->set_rules('nama_kat', 'Nama Kategori Referensi', 'required');

            if ($this->form_validation->run()) {
                //SEKRETARIAT JENDERAL
                $this->db->update('tb_referensi_kat', array(
                    'nama_kat' => $this->input->post('nama_kat')
                ), array(
                    'id_referensi_kat' => $id_referensi_kat
                ));
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                $this->log->create("Mengubah data Kategori Referensi (id_referensi_kat => {$id_referensi_kat})");


            }
            $result = $this->db->from('tb_referensi_kat')
                    ->where('id_referensi_kat', $id_referensi_kat)
                    ->get()->row();

            $data['kategori_ref'] = $result;

            $data['title'] = 'Ubah Kategori Referensi';
            $data['content'] = 'admin/edit_kategori_ref';

            $bc[0]->link = 'admin/dashboard';
            $bc[0]->label = 'Home';
            $bc[1]->link = 'admin/kategori_ref';
            $bc[1]->label = 'Kategori Referensi';
            $bc[2]->link = $this->uri->uri_string();
            $bc[2]->label = 'Ubah Data';
            $data['breadcrumb'] = $bc;

            $this->load->view('admin/template', $data);
        }
    }

    public function add()
    {
        if (isset($_POST)) {

            $this->form_validation->set_rules('nama_kat', 'Nama Kategori', 'required');


            if ($this->form_validation->run()) {

                $result = $this->db->insert('tb_referensi_kat', array(
                    'nama_kat' => $this->input->post('nama_kat'),

                ));

                if (!$result) {
                    $this->session->set_flashdata('error', 'Data gagal ditambahkan. ERROR: ' . $this->db->_error_message());
                    $this->log->create("Gagal menambahkan data Kategori Referensi. ERROR: " . $this->db->_error_message());
                    redirect('admin/kategori_ref/add');
                } else {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    $this->log->create("Menambah data Kategori Referensi (id_referensi_kat=> {$this->db->insert_id()})");
                    redirect('admin/kategori_ref/add');
                }

            }
        }
        $result = $this->db->from('tb_referensi_kat')->get();

        $data['kategori_ref'] = $result;

        $data['title'] = 'Tambah Kategori Referensi';
        $data['content'] = 'admin/add_kategori_ref';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/kategori_ref';
        $bc[1]->label = 'Kategori Referensi';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Tambah Baru';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
}