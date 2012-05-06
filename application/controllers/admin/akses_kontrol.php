<?php
class Akses_kontrol extends CI_Controller
{
    public $title = 'Akses Kontrol';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Makses', 'akses');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    public function index()
    {
        $data['list_kontrol'] = $this->akses->get_all();
        $data['title'] = 'Akses Kontrol';
        $data['content'] = 'admin/akses_kontrol/index';

        $bc = array();
        @$bc[0]->link = 'admin/dashboard';
        @$bc[0]->label = 'Home';
        @$bc[1]->link = 'admin/akses_kontrol';
        @$bc[1]->label = 'Akses Kontrol';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    /**
     * Update only. There's no add new access control.
     *
     * @param $id integer
     * @return void
     */
    protected function _update()
    {
        $this->form_validation->set_rules('fid', 'ID', 'required|numeric');
        $this->form_validation->set_rules('fnamalevel', 'Nama Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        }
        else {
            $data['fid'] = $this->input->post('fid', TRUE);
            $data['fnamalevel'] = $this->input->post('fnamalevel', TRUE);

            $this->load->model('Makses', 'akses');
            $info = $this->akses->update_akses($data);
            if ($info) {
                $this->session->set_flashdata('success', "Akses baru telah diubah!");
            } else {
                $this->session->set_flashdata('error', "Akses baru gagal diubah!");
            }
            redirect('/admin/akses_kontrol');
        }
    }

    public function delete($id)
    {
        $info = $this->akses->delete($id);

        switch ($info) {
            case 1:
                $this->session->set_flashdata('success', "Berhasil dihapus");
                break;
            case 2:
                $this->session->set_flashdata('error', "Gagal dihapus");
                break;
            default:
                $this->session->set_flashdata('warning', "Terdapat keterkaitan dengan data lain");
                break;
        }

        redirect('/admin/akses_kontrol');
    }

    public function view_form()
    {
        $data1['fid'] = $this->input->post('fid', TRUE);
        $data1['fnamalevel'] = $this->input->post('fnamalevel', TRUE);

        $data['tambah'] = (object)$data1;
        $data['title'] = 'Akses Kontrol';
        $data['content'] = 'admin/akses_kontrol/add';
        $this->load->view('admin/template', $data);

    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->_update();
        }
        $result = $this->db->query("SELECT * FROM tb_lavel WHERE id_lavel = ?", array($id));
        $result = $result->row();
        $data['ubah'] = $result;

        $bc = array();
        @$bc[0]->link = 'admin/dashboard';
        @$bc[0]->label = 'Home';
        @$bc[1]->link = 'admin/akses_kontrol';
        @$bc[1]->label = 'Akses Kontrol';
        @$bc[2]->link = $this->uri->uri_string();
        @$bc[2]->label = 'Edit Lavel: ' . $result->nama_lavel;
        $data['breadcrumb'] = $bc;
        $data['title'] = "Akses Kontrol - Ubah - {$result->nama_lavel}";
        $data['content'] = 'admin/akses_kontrol/edit';
        $this->load->view('admin/template', $data);
    }

    public function view($id)
    {
        $data['info_kontrol'] = $this->akses->get_info_kontrol($id);
        $data['list_kontrol'] = $this->akses->get_all_users_by_level($id);

        $data['title'] = "Akses Kontrol - {$data['info_kontrol']->nama_lavel} ";
        $data['content'] = 'admin/akses_kontrol/view';

        $bc = array();
        @$bc[0]->link = 'admin/dashboard';
        @$bc[0]->label = 'Home';
        @$bc[1]->link = 'admin/akses_kontrol';
        @$bc[1]->label = 'Akses Kontrol';
        @$bc[2]->link = $this->uri->uri_string();
        @$bc[2]->label = 'Lihat Level';
        $data['breadcrumb'] = $bc;
        $this->load->view('admin/template', $data);
    }

    public function reset_password()
    {
        $user = trim($this->uri->segment(4, ''));
        $level = trim($this->uri->segment(5, ''));

        if (!empty($user)) {
            $info = $this->akses->reset_password($user);
            if ($info) {
                $this->session->set_flashdata('success', "berhasil reset password");
                redirect('admin/akses_kontrol/view/' . $level);
            } else {
                $this->session->set_flashdata('error', "gagal reset password");
                redirect('admin/akses_kontrol/view' . $level);
            }
        }
    }

    public function delete_user()
    {
        $user = trim($this->uri->segment(4, ''));
        $level = trim($this->uri->segment(5, ''));

        if (!empty($user)) {
            $info = $this->akses->delete_user($user);
            if ($info) {
                $this->session->set_flashdata('success', "berhasil menghapus user");
                redirect('admin/akses_kontrol/view/' . $level);
            } else {
                $this->session->set_flashdata('error', "gagal menghapus user");
                redirect('admin/akses_kontrol/view' . $level);
            }
        }
    }
}