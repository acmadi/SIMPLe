<?php
class Knowledge extends CI_Controller
{
    public $title = 'Knowledge Base';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mknowledge', 'knowledge');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    public function index()
    {
        $data['knowledges'] = $this->knowledge->get_all();
        $data['title'] = 'Knowledge';
        $data['content'] = 'admin/knowledge/index';
        $data['categories'] = $this->knowledge->get_all_category();

        $bc = array();
        @$bc[0]->link = 'admin/dashboard';
        @$bc[0]->label = 'Home';
        @$bc[1]->link = $this->uri->uri_string();
        @$bc[1]->label = $this->title;
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function add_category()
    {
        if ($_POST) {
            $this->form_validation->set_rules('category', 'Kategori', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('/admin/knowledge/add_category');
            }
            else {
                $category = $this->input->post('category', TRUE);
                $info = $this->knowledge->add_category($category);
                if ($info) {
                    $this->log->create('Menambah kategori baru ' . $category);
                    $this->session->set_flashdata('success', "Kategori : " . $category . " telah ditambahkan");
                    redirect('/admin/knowledge/add_category');
                } else {
                    $this->session->set_flashdata('error', "Kategori : " . $category . " gagal ditambahkan");
                    redirect('/admin/knowledge/add_category');
                }

            }
        } else {
            $data['title'] = 'Tambah Knowledge Baru';
            $data['content'] = 'admin/knowledge/add_category';

            $bc = array();
            @$bc[0]->link = 'admin/dashboard';
            @$bc[0]->label = 'Home';
            @$bc[1]->link = 'admin/knowledge';
            @$bc[1]->label = 'Knowledge Base';
            @$bc[2]->link = $this->uri->uri_string();
            @$bc[2]->label = 'Tambah Kategori';
            $data['breadcrumb'] = $bc;

            $this->load->view('admin/template', $data);
        }
    }

    public function add_knowledge()
    {
        $bc = array();
        @$bc[0]->link = 'admin/dashboard';
        @$bc[0]->label = 'Home';
        @$bc[1]->link = 'admin/knowledge';
        @$bc[1]->label = 'Knowledge Base';
        @$bc[2]->link = $this->uri->uri_string();
        @$bc[2]->label = 'Tambah Baru';
        $data['breadcrumb'] = $bc;

        if ($_POST) {
            $this->form_validation->set_rules('flist2', 'Kategori', 'required|numeric');
            $this->form_validation->set_rules('fjudul2', 'Judul', 'required');
            $this->form_validation->set_rules('fdesripsi2', 'Deskripsi', 'required');
            $this->form_validation->set_rules('fjawaban2', 'Jawaban', 'required');
//            $this->form_validation->set_rules('fsumber2', 'Sumber', 'required');
//            $this->form_validation->set_rules('fjabatan2', 'Jabatan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('/admin/knowledge/add_knowledge');
            }
            else {
                $data['flist'] = $this->input->post('flist2', TRUE);
                $data['fjudul'] = $this->input->post('fjudul2', TRUE);
                $data['fdesk'] = $this->input->post('fdesripsi2', TRUE);
                $data['fjawab'] = $this->input->post('fjawaban2', TRUE);
                $data['fsumb'] = $this->input->post('fsumber2', TRUE);
                $data['fjab'] = $this->input->post('fjabatan2', TRUE);
                $data['is_public'] = $this->input->post('is_public', TRUE);

                $info = $this->knowledge->add_knowledge($data);

                if ($info) {
                    $this->log->create('Menambah knowledge baru ' . $data['fjudul']);
                    $this->session->set_flashdata('success', "Knowledge baru berjudul '" . $data['fjudul'] . "' telah ditambahkan");
                    redirect('/admin/knowledge/add_knowledge');
                } else {
                    $this->session->set_flashdata('error', "Knowledge baru berjudul '" . $data['fjudul'] . "' gagal ditambahkan");
                    redirect('/admin/knowledge/add_knowledge');
                }
            }
        } else {
            $data['title'] = 'Tambah Knowledge Baru';
            $data['content'] = 'admin/knowledge/add_knowledge';
            $data['categories'] = $this->knowledge->get_all_category();

            $this->load->view('admin/template', $data);
        }
    }

    public function delete_category($id)
    {
        $info = $this->knowledge->delete_category($id);
        switch ($info) {
            case 1:
                $this->log->create('Menghapus kategori ID ' . $id);
                $this->session->set_flashdata('success', "Berhasil dihapus");
                break;
            case 2:
                $this->session->set_flashdata('error', "Gagal dihapus");
                break;
            default:
                $this->session->set_flashdata('notice', "Terdapat keterkaitan dengan data lain");
                break;
        }

        redirect('/admin/knowledge/index/2');
    }

    public function delete($id)
    {
        $info = $this->knowledge->delete_knowledge($id);

        switch ($info) {
            case 1:
                $this->log->create('Menghapus ID ' . $id);
                $this->session->set_flashdata('success', "Berhasil dihapus");
                break;
            case 2:
                $this->session->set_flashdata('error', "Gagal dihapus");
                break;
            default:
                $this->session->set_flashdata('notice', "Terdapat keterkaitan dengan data lain");
                break;
        }

        redirect('/admin/knowledge');
    }

    public function edit_category()
    {
        $this->form_validation->set_rules('pidkat', 'ID', 'required|numeric');
        $this->form_validation->set_rules('pkategori', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/admin/knowledge/index/2');
        }
        else {
            $data['kat'] = $this->input->post('pkategori', TRUE);
            $data['id'] = $this->input->post('pidkat', TRUE);
            $info = $this->knowledge->do_edit_category($data);
            if ($info) {
                $this->log->create('Mengubah kategori ID ' . $data['id']);
                $this->session->set_flashdata('success', "Kategori berhasil diubah");
                redirect('/admin/knowledge/index/2');
            } else {
                $this->session->set_flashdata('error', "Kategori gagal diubah");
                redirect('/admin/knowledge/index/2');
            }
        }
    }
}