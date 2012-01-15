<?php
class Eselon extends CI_Controller
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
            $result = $this->db->from('tb_unit a')
                    ->join('tb_kementrian b', 'b.id_kementrian = a.id_kementrian')
                    ->like('nama_kementrian', $this->input->get('cari'))
                    ->or_like('nama_unit', $this->input->get('cari'))
                    ->or_like('id_unit', $this->input->get('cari'))
                    ->get();

        } else {
            $config['per_page'] = 25;
            $config['total_rows'] = $this->db->count_all('tb_unit');
            $config['base_url'] = site_url('/admin/eselon/index/');
            $config['uri_segment'] = 4;
            $config['use_page_numbers'] = false;
            $config['num_links'] = 10;

            $this->pagination->initialize($config);

            $result = $this->db->from('tb_unit a')
                    ->join('tb_kementrian b', 'b.id_kementrian = a.id_kementrian')
            //->join('tb_petugas_satker c', 'c.id_satker = a.id_satker')
                    ->limit($config['per_page'], $id)
                    ->get();
        }

        $data['bla'] = $result;
        $data['title'] = 'Daftar Eselon';
        $data['content'] = 'admin/eselon';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/eselon';
        $bc[1]->label = 'Eselon';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function view_eselon($id_unit)
    {
        $result = $this->db->from('tb_unit a')
                ->join('tb_kementrian c', 'a.id_kementrian = c.id_kementrian')
                ->where('a.id_unit', $id_unit)
                ->get();

        $data['eselon'] = $result;

        $data['title'] = 'Lihat Eselon';
        $data['content'] = 'admin/view_eselon';

        $this->load->view('admin/template', $data);
    }

    public function edit($id_unit)
    {
        if (isset($_POST)) {

            $this->form_validation->set_rules('nama_unit', 'Nama Eselon', 'required');

            if ($this->form_validation->run()) {
                //SEKRETARIAT JENDERAL
                $this->db->update('tb_unit', array(
                    'nama_unit' => $this->input->post('nama_unit')
                ), array(
                    'id_unit' => $id_unit
                ));
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                $this->log->create("Mengubah data Eselon (id_unit => {$id_unit})");
            }
        }
        $result = $this->db->from('tb_unit a')

                ->join('tb_kementrian c', 'a.id_kementrian = c.id_kementrian')
                ->where('a.id_unit', $id_unit)
                ->get()->row();

        $data['eselon'] = $result;

        $data['title'] = 'Ubah Eselon';
        $data['content'] = 'admin/edit_eselon';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/eselon';
        $bc[1]->label = 'Eselon';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Ubah Data';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function add()
    {
        if (isset($_POST)) {

            $this->form_validation->set_rules('id_unit', 'Kode Eselon', 'required|numeric|min_length[2]|max_length[2]');
            $this->form_validation->set_rules('nama_unit', 'Nama Eselon', 'required');
            $this->form_validation->set_rules('id_kementrian', 'Nama Kementrian', 'required');

            if ($this->form_validation->run()) {

                $result = $this->db->insert('tb_unit', array(
                    'id_unit' => $this->input->post('id_unit'),
                    'nama_unit' => $this->input->post('nama_unit'),
                    'id_kementrian' => $this->input->post('id_kementrian'),
                ));
				
				

                if (!$result) {
                    $this->session->set_flashdata('error', 'Data gagal ditambahkan. ERROR: ' . $this->db->_error_message());
                    $this->log->create("Gagal menambahkan data Eselon. ERROR: " . $this->db->_error_message());
                } else {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    $this->log->create("Menambah data Eselon (id_unit => {$this->db->insert_id()})");
                }

            }
        }
        $result = $this->db->from('tb_kementrian')->get();
		
        $data['kementrian'] = $result;

        $data['title'] = 'Tambah Eselon';
        $data['content'] = 'admin/add_eselon';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/eselon';
        $bc[1]->label = 'Eselon';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Tambah Baru';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
}