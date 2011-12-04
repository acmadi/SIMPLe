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
        $data['categories'] = $this->mforum->get_categories();
        $data['forums'] = $this->mforum->get();
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }

    public function add_category()
    {
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

    public function add_forum()
    {
        $id_kat_forum = $this->input->post('id_kat_forum');
        $judul_forum = $this->input->post('judul_forum');
        $isi_forum = $this->input->post('isi_forum');
        $file = $this->input->post('file');

        $config['upload_path'] = './upload';
        $config['allowed_types'] = '*';
        //$config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {

        } else {
            //$this->session->set_flashdata('error', 'Data gagal ditambahkan s');
        }

        if (isset($_FILES['lampiran']['name']))
            $file = $_FILES['lampiran']['name'];

        $result = $this->mforum->add_forum($id_kat_forum, $judul_forum, $isi_forum, $file);

        if ($result) {
            $this->session->set_flashdata('success', 'Data sukses ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        }

        redirect('/admin/man_forum');
    }
}

?>