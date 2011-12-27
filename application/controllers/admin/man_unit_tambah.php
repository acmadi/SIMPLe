<?php
class Man_unit_tambah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Munit', 'unit');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Manajemen Unit - Tambah';

    function index()
    {
        $data['title'] = 'Manajemen Unit - Tambah';
        $data['content'] = 'admin/man_unit/man_unit_tambah';
        $data['list_unit'] = $this->unit->get_list_unit();
        $data['list_kementrian'] = $this->unit->get_list_kementrian();
        $this->load->view('admin/template', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('fkode', 'Kode Unit', 'required');
        $this->form_validation->set_rules('fnama', 'Nama Unit', 'required');
        $this->form_validation->set_rules('fanggaran', 'Anggaran', 'required');
        $this->form_validation->set_rules('funit', 'Unit', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/man_unit_tambah');
        } else {

            $data['kd'] = trim($this->input->post('fkode', TRUE));
            $data['nm'] = trim($this->input->post('fnama', TRUE));
            $data['ag'] = trim($this->input->post('fanggaran', TRUE));
            $data['un'] = $this->input->post('funit', TRUE);
            //print_r($data);exit;
            $info = $this->unit->add_unit($data);

            if ($info) {
                $this->log->create('berhasil menambah unit : ' . $data['nm']);
                $this->session->set_flashdata('success', "berhasil menambah unit : ".$data['nm']);
                redirect('admin/man_unit_tambah');
            } else {
                $this->session->set_flashdata('error', "gagal menambah unit : ".$data['nm']);
                redirect('admin/man_unit_tambah');
            }

        }

    }

}

?>