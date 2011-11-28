<?php
class Knowledge extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Knowledge';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/

        $this->load->model('Mknowledge', 'knowledge');

        $data['title'] = 'Knowledge';
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
        // TODO: Tambah validasi

        $category = $this->input->post('category', TRUE);

        $this->load->model('Mknowledge', 'knowledge');

        $this->knowledge->add_category($category);

        $this->session->set_flashdata('Kategori baru telah ditambahkan.');

        redirect('/admin/knowledge');
    }

    public function delete_category($id)
    {
        // TODO: Buat validasi dan pengecekan user sudah login atau belum?

        $this->load->model('Mknowledge', 'knowledge');
        $this->knowledge->delete_category($id);

        $this->session->set_flashdata('Kategori telah dihapus.');

    }
}

?>