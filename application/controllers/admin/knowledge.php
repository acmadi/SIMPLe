<?php
class Knowledge extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mknowledge', 'knowledge');
    }

    var $title = 'Knowledge';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/

        $tabAktif = $this->uri->segment(4, 1);


        switch ($tabAktif) {
            case 2 :
                $tabAktif = '#tab2';
                break;
            case 3 :
                $tabAktif = '#tab3';
                break;
            case 4 :
                $tabAktif = '#tab4';
                break;
            default:
                $tabAktif = '#tab1';
                break;
        }

        $data['knowledges'] = $this->knowledge->get_all();
        $data['title'] = 'Knowledge';
        $data['tabAktif'] = $tabAktif;
        $data['content'] = 'admin/knowledge/knowledge';
        $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }

    public function add_category()
    {
        if ($_POST) {
            $this->form_validation->set_rules('category', 'Kategori', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('/admin/knowledge/add_category');
            }
            else
            {
                $category = $this->input->post('category', TRUE);
                $info = $this->knowledge->add_category($category);
                if ($info) {
                    $this->session->set_flashdata('success', "Kategori baru telah ditambahkan");
                    redirect('/admin/knowledge/index/2');
                } else {
                    $this->session->set_flashdata('error', "Kategori gagal ditambahkan");
                    redirect('/admin/knowledge/index/3');
                }

            }
        } else {
            $data['title'] = 'Tambah Knowledge Baru';
            $data['content'] = 'admin/knowledge/add_category';
            $this->load->view('admin/template', $data);
        }
    }

    public function add_knowledge()
    {	
		/*
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		exit;*/
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
            else
            {
                $data['flist'] = $this->input->post('flist2', TRUE);
                $data['fjudul'] = $this->input->post('fjudul2', TRUE);
                $data['fdesk'] = $this->input->post('fdesripsi2', TRUE);
                $data['fjawab'] = $this->input->post('fjawaban2', TRUE);
                $data['fsumb'] = $this->input->post('fsumber2', TRUE);
                $data['fjab'] = $this->input->post('fjabatan2', TRUE);
				
                $info = $this->knowledge->add_knowledge($data);
                if ($info) {
                    $this->session->set_flashdata('success', "Knowledge baru telah ditambahkan");
                    redirect('/admin/knowledge');
                } else {
                    $this->session->set_flashdata('error', "Knowledge baru gagal ditambahkan");
                    redirect('/admin/knowledge');
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
        else
        {
            $data['kat'] = $this->input->post('pkategori', TRUE);
            $data['id'] = $this->input->post('pidkat', TRUE);
            $info = $this->knowledge->do_edit_category($data);
            if ($info) {
                $this->session->set_flashdata('success', "Kategori berhasil diubah");
                redirect('/admin/knowledge/index/2');
            } else {
                $this->session->set_flashdata('error', "Kategori gagal diubah");
                redirect('/admin/knowledge/index/2');
            }
        }
    }
}

?>