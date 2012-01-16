<?php
class Kementrian extends CI_Controller
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
            $result = $this->db->from('tb_kementrian')
                    ->like('nama_kementrian', $this->input->get('cari'))
                    ->or_like('id_kementrian', $this->input->get('cari'))
                    ->get();

        } else {
            $config['per_page'] = 25;
            $config['total_rows'] = $this->db->count_all('tb_kementrian');
            $config['base_url'] = site_url('/admin/kementrian/index/');
            $config['uri_segment'] = 4;
            $config['use_page_numbers'] = false;
            $config['num_links'] = 10;

            $this->pagination->initialize($config);

            $result = $this->db->from('tb_kementrian')
            //->join('tb_petugas_satker c', 'c.id_satker = a.id_satker')
                    ->limit($config['per_page'], $id)
                    ->get();
        }

        $data['bla'] = $result;
        $data['title'] = 'Daftar Kementrian';
        $data['content'] = 'admin/kementrian';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/kementrian';
        $bc[1]->label = 'Kementrian';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function view_kementrian($id_kementrian)
    {
        $result = $this->db->from('tb_kementrian')
                ->where('id_kementrian', $id_kementrian)
                ->get();

        $data['kementrian'] = $result;

        $data['title'] = 'Lihat Kementrian';
        $data['content'] = 'admin/view_kementrian';

        $this->load->view('admin/template', $data);
    }

    public function edit($id_kementrian)
    {
        if (isset($_POST)) {

            $this->form_validation->set_rules('nama_kementrian', 'Nama Kementrian', 'required');

            if ($this->form_validation->run()) {
                //SEKRETARIAT JENDERAL
                $this->db->update('tb_kementrian', array(
                    'nama_kementrian' => $this->input->post('nama_kementrian')
                ), array(
                    'id_kementrian' => $id_kementrian
                ));
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                $this->log->create("Mengubah data Kementrian (id_kementrian => {$id_kementrian})");


            }
            $result = $this->db->from('tb_kementrian')
                    ->where('id_kementrian', $id_kementrian)
                    ->get()->row();

            $data['kementrian'] = $result;

            $data['title'] = 'Ubah Kementrian';
            $data['content'] = 'admin/edit_kementrian';

            $bc[0]->link = 'admin/dashboard';
            $bc[0]->label = 'Home';
            $bc[1]->link = 'admin/kementrian';
            $bc[1]->label = 'Kementrian';
            $bc[2]->link = $this->uri->uri_string();
            $bc[2]->label = 'Ubah Data';
            $data['breadcrumb'] = $bc;

            $this->load->view('admin/template', $data);
        }
    }

    public function add()
    {
        if (isset($_POST)) {

            $this->form_validation->set_rules('id_kementrian', 'Kode Kementrian', 'required|numeric|min_length[3]|max_length[3]');
            $this->form_validation->set_rules('nama_kementrian', 'Nama Kementrian', 'required');


            if ($this->form_validation->run()) {

                $result = $this->db->insert('tb_kementrian', array(
                    'id_kementrian' => $this->input->post('id_kementrian'),
                    'nama_kementrian' => $this->input->post('nama_kementrian'),

                ));

                if (!$result) {
                    $this->session->set_flashdata('error', 'Data gagal ditambahkan. ERROR: ' . $this->db->_error_message());
                    $this->log->create("Gagal menambahkan data Kementrian. ERROR: " . $this->db->_error_message());
                    redirect('admin/kementrian/add');
                } else {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    $this->log->create("Menambah data Kementrian (id_kementrian => {$this->db->insert_id()})");
                    redirect('admin/kementrian/add');
                }

            }
        }
        $result = $this->db->from('tb_kementrian')->get();

        $data['kementrian'] = $result;

        $data['title'] = 'Tambah Kementrian';
        $data['content'] = 'admin/add_kementrian';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/kementrian';
        $bc[1]->label = 'Kementrian';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Tambah Baru';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
}