<?php
class Forum extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mforum');
        $this->load->helper('text');
        $this->load->library('pagination');
    }

    function index()
    {
        //$this->halaman(1);

        $data['kategori'] = $this->mforum->get_categories();


        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'forum/index';
        $this->load->view('new-template', $data);
    }

    function halaman($page = 1)
    {
        $result = $this->mforum->get();

        $this->load->library('pagination');

        $config['base_url'] = site_url('forum/halaman/');
        $config['total_rows'] = $this->mforum->count_forums();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $data['referrer'] = 'forum';
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'forum/index';

        $offset = ((int)$page - 1) * $config['per_page'];
        $data['forums'] = $this->db->query(
            "SELECT f.*, u.nama FROM tb_forum f LEFT JOIN tb_user u
             ON (f.id_user = u.id_user)
             WHERE f.id_parent IS NULL
             ORDER BY tanggal DESC
             LIMIT $offset, 5");

        $this->load->view('new-template', $data);
    }

    function view($id)
    {
        $result_forum = $this->mforum->get_one_with_poster($id);
        $result_childs = $this->mforum->get_childs($id);

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'forum/view';
        $data['forums'] = $result_forum;
        $data['childs'] = $result_childs;
        $this->load->view('new-template', $data);
    }

    function edit($id_forum)
    {
        // $forum = $this->mforum->
    }

    function kirim()
    {

        $id_parent = (!$this->input->post('id_parent')) ? NULL : $this->input->post('id_parent');
        $referrer = $this->input->post('referrer');

        $nmBr = '';
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
            $unik = date('isdm') . '_';
            $nmBr = $unik . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], 'upload/forum/' . $nmBr);
        }

        $arr = array(
            'id_kat_forum' => $this->input->post('id_kat_forum'),
            'judul_forum' => $this->input->post('judul_forum'),
            'isi_forum' => $this->input->post('isi_forum'),
            'id_parent' => $id_parent,
            'id_user' => $this->session->userdata('id_user'),
            'file' => $nmBr,
        );


        $this->mforum->add_forum_by_array($arr);

        redirect($referrer);
    }

    public function category($id)
    {
        $sql = "SELECT *
                FROM tb_forum a
                JOIN tb_user b ON a.id_user = b.id_user
                WHERE a.id_kat_forum = ?
                AND a.id_parent IS NULL
                ORDER BY a.tanggal
                ";
        $forum = $this->db->query($sql, array($id));

        $sql = "SELECT * FROM tb_kat_forum WHERE id_kat_forum = ?";
        $kategori = $this->db->query($sql, array($id))->row();

        $jumlah_thread = array();
        foreach ($forum->result() as $value) {
            $sql = "SELECT * FROM tb_forum WHERE id_parent = ?";
            $temp = $this->db->query($sql, array($value->id_forum));
            $jumlah_thread[$value->id_forum] = $temp->num_rows();
        }

        $data['jumlah_thread'] = $jumlah_thread;
        $data['kategori'] = $kategori;
        $data['forum'] = $forum;
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'forum/category';
        $this->load->view('new-template', $data);
    }

    public function download($filename)
    {
        // FIXME: Kalau nama file mengandung # masih error
        $filename = url_title($filename);
        $file = file_get_contents(FCPATH . 'upload/forum/' . $filename);
        force_download($filename, $file);
    }

    public function add($forum_id)
    {

        if ($_POST) {
            $this->form_validation->set_rules('judul_forum', 'Judul Forum', 'required|trim');
            $this->form_validation->set_rules('isi_forum', 'Isi Forum', 'required|trim');

            if ($this->form_validation->run()) {

                $upload_config['upload_path'] = FCPATH . 'upload/forum/';
                $upload_config['allowed_types'] = 'rar|zip|pdf|jpg|png';

                $this->upload->initialize($upload_config);

                $upload_data = null;
                if ($this->upload->do_upload('file')) {
                    $upload_data = $this->upload->data();
                } else {
                    echo $this->upload->display_errors();
                }

                if ($upload_data != null) {
                    $sql = "INSERT INTO tb_forum (judul_forum, isi_forum, id_kat_forum, tanggal, id_parent, id_user, file)
                            VALUES (?, ?, ?, NOW(), NULL, ?, ?)";
                    $this->db->query($sql, array(
                        $this->input->post('judul_forum'),
                        $this->input->post('isi_forum'),
                        $forum_id,
                        $this->session->userdata('id_user'),
                        $upload_data['file_name']
                    ));
                } else {
                    $sql = "INSERT INTO tb_forum (judul_forum, isi_forum, id_kat_forum, tanggal, id_parent, id_user)
                            VALUES (?, ?, ?, NOW(), NULL, ?)";
                    $this->db->query($sql, array(
                        $this->input->post('judul_forum'),
                        $this->input->post('isi_forum'),
                        $forum_id,
                        $this->session->userdata('id_user'),
                    ));
                }
                $last_id = $this->db->insert_id();
                $this->session->set_flashdata('success', 'Berhasil menambahkan forum baru');
                $this->log->create('Menambahkan forum baru ID ' . $last_id);
                redirect('forum/view/' . $last_id);
            }
        }

        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'forum/add';
        $this->load->view('new-template', $data);
    }
}