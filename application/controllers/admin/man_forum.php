<?php
class Man_forum extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mforum');
        $this->load->library('form_validation');
    }

    var $title = 'Manajemen Forum';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'admin/man_forum/man_forum';
        $data['categories'] = $this->mforum->get();
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }

    public function add_category() {
        $kat_forum = $this->input->post('kat_forum', TRUE);

        $this->form_validation->set_rules('kat_forum', 'Kategori Forum', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $sql = "INSERT INTO tb_kat_forum VALUES (NULL, ?)";
            $this->db->query($sql, array($kat_forum));
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
            redirect('/admin/man_forum');
        } else {
            $this->session->set_flashdata('error', 'Kategori gagal ditambahkan');
            redirect('/admin/man_forum');
        }
    }
}

?>