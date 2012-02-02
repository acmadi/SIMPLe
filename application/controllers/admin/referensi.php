<?php
class Referensi extends CI_Controller
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
            $result = $this->db->from('tb_referensi a')
					->join('tb_referensi_kat b', 'b.id_referensi_kat = a.id_referensi_kat')
                    ->like('nama_ref', $this->input->get('cari'))
                    ->or_like('id_referensi', $this->input->get('cari'))
					->or_like('nama_file', $this->input->get('cari'))
                    ->get();

        } else {
            $config['per_page'] = 25;
            $config['total_rows'] = $this->db->count_all('tb_referensi');
            $config['base_url'] = site_url('/admin/referensi/index/');
            $config['uri_segment'] = 4;
            $config['use_page_numbers'] = false;
            $config['num_links'] = 10;

            $this->pagination->initialize($config);

            $result = $this->db->from('tb_referensi a')
                    ->join('tb_referensi_kat b', 'b.id_referensi_kat = a.id_referensi_kat')
                    ->limit($config['per_page'], $id)
                    ->get();
        }

        $data['bla'] = $result;
        $data['title'] = 'Daftar Referensi';
        $data['content'] = 'admin/referensi';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/referensi';
        $bc[1]->label = 'Referensi';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function view_referensi($id_referensi)
    {
        $result = $this->db->from('tb_referensi a')
				->join('tb_referensi_kat b', 'b.id_referensi_kat = a.id_referensi_kat')
                ->where('id_referensi', $id_referensi)
                ->get();

        $data['referensi'] = $result;

        $data['title'] = 'Lihat Referensi';
        $data['content'] = 'admin/view_referensi';

        $this->load->view('admin/template', $data);
    }

    public function edit($id_referensi)
    {
        if (isset($_POST)) {

            $this->form_validation->set_rules('nama_ref', 'Nama Referensi', 'required|trim');

            if ($this->form_validation->run()) {
                //SEKRETARIAT JENDERAL
                $this->db->update('tb_referensi', array(
                    'nama_ref' => $this->input->post('nama_referensi')
                ), array(
                    'id_referensi' => $id_referensi
                ));
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                $this->log->create("Mengubah data Referensi (id_referensi => {$id_referensi})");


            }
            $result = $this->db->from('tb_referensi a')
					->join('tb_referensi_kat b', 'b.id_referensi_kat = a.id_referensi_kat')
                    ->where('id_referensi', $id_referensi)
                    ->get()->row();

            $data['referensi'] = $result;

            $data['title'] = 'Ubah Referensi';
            $data['content'] = 'admin/edit_referensi';

            $bc[0]->link = 'admin/dashboard';
            $bc[0]->label = 'Home';
            $bc[1]->link = 'admin/referensi';
            $bc[1]->label = 'Referensi';
            $bc[2]->link = $this->uri->uri_string();
            $bc[2]->label = 'Ubah Data';
            $data['breadcrumb'] = $bc;

            $this->load->view('admin/template', $data);
        }
    }

    public function add()
    {
        if (isset($_POST)) {

            // $this->form_validation->set_rules('id_referensi', 'Kode Referensi', 'required|numeric|min_length[11]|max_length[11]');
            $this->form_validation->set_rules('nama_ref', 'Nama Referensi', 'required|trim');
			 // $this->form_validation->set_rules('file', 'File', 'required');
			  $this->form_validation->set_rules('id_referensi_kat', 'Kode Referensi Kategori', 'required');


            if ($this->form_validation->run()) {


                $upload_config['upload_path'] = './upload/referensi/';
                $upload_config['allowed_types'] = 'doc|docx|pdf';

                $this->upload->initialize($upload_config);
                $upload_data = array();

                if ($this->upload->do_upload('file')) {
                    $upload_data = $this->upload->data();
                } else {
                    echo $this->upload->display_errors();
                }

                $upload_filename = '';
                if (isset($upload_data['file_name'])) {
                    $upload_filename = $upload_data['file_name'];
                }

                $result = $this->db->insert('tb_referensi', array(
                    // 'id_referensi' => $this->input->post('id_referensi'),
                    'nama_ref' => $this->input->post('nama_ref'),
					'nama_file' => $upload_filename,
					'id_referensi_kat' => $this->input->post('id_referensi_kat'),

                ));

                if (!$result) {
                    $this->session->set_flashdata('error', 'Data gagal ditambahkan. ERROR: ' . $this->db->_error_message());
                    $this->log->create("Gagal menambahkan data Referensi. ERROR: " . $this->db->_error_message());
                    redirect('admin/referensi/add');
                } else {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    $this->log->create("Menambah data Referensi (id_referensi => {$this->db->insert_id()})");
                    redirect('admin/referensi/add');
                }

            }
        }
        $result = $this->db->from('tb_referensi_kat')->get();

        $data['kategori'] = $result;

        $data['title'] = 'Tambah Referensi';
        $data['content'] = 'admin/add_referensi';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/referensi';
        $bc[1]->label = 'Referensi';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Tambah Baru';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
}