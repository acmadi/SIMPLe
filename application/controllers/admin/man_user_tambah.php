<?php
class Man_user_tambah extends CI_Controller
{

    var $title = 'Tambah User';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Muser', 'muser');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    function index()
    {
        $data['list_level'] = $this->muser->get_list_level();
        $data['list_unit'] = $this->muser->get_list_unit();
        $data['title'] = $this->title;
        $data['content'] = 'admin/man_user/man_user_tambah';

        $bc = array();
        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/man_user';
        $bc[1]->label = 'Manajemen User';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = $this->title;
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('fnama', 'Nama', 'required');
        $this->form_validation->set_rules('fpassword', 'Password', 'required');
        $this->form_validation->set_rules('fpassword2', 'Ulangi Password', 'required|matches[fpassword]');
        $this->form_validation->set_rules('femail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('fusername', 'Username', 'required');
        $this->form_validation->set_rules('ftelp', 'No Telp', 'required');
        $this->form_validation->set_rules('flevel', 'Level', 'required');
        $this->form_validation->set_rules('fdepartemen', 'Departemen', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/man_user_tambah');
        } else {
            $data['usr'] = trim($this->input->post('fusername', TRUE));
            $data['nm'] = trim($this->input->post('fnama', TRUE));
            $data['pwd'] = trim($this->input->post('fpassword', TRUE));
            $data['em'] = trim($this->input->post('femail', TRUE));
            $data['telp'] = trim($this->input->post('ftelp', TRUE));
            $data['lev'] = trim($this->input->post('flevel', TRUE));
            $data['dep'] = trim($this->input->post('fdepartemen', TRUE));

            $info = $this->muser->add_user($data);

            if ($info) {
                $this->log->create('berhasil menambah user : ' . $data['nm']);
                $this->session->set_flashdata('success', "berhasil menambah user baru !!");
                redirect('admin/man_user');
            } else {
                $this->session->set_flashdata('error', "gagal menambah user baru !!");
                redirect('admin/man_user');
            }
        }
    }

    function pilih_departemen($id_lavel)
    {

        echo $id_lavel;
        $sql = "SELECT * FROM tb_unit_saker
                JOIN tb_lavel ON tb_unit_saker.id_lavel = tb_lavel.lavel
                WHERE lavel = ?";
        $result = $this->db->query($sql, array($id_lavel))->result();

        //        echo $this->db->last_query();
        foreach ($result as $value) {
            echo sprintf('<option value="%s">%s</option>', $value->id_unit_satker, $value->nama_unit);
        }
    }
}