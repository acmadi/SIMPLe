<?php
class Man_forum_ubah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mforum','mforum');
    }

    var $title = 'Manajemen Ubah Forum';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$id = $this->uri->segment(4,'');
        $data['title'] = 'Manajemen Ubah Forum';
        $data['content'] = 'admin/man_forum/man_forum_view';
		$data['categories'] = $this->mforum->get_categories();
		$data['forum'] = $this->mforum->get_by_id($id);
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function view_kategori(){
		$id = $this->uri->segment(4,'');
        $data['title'] = 'Manajemen Ubah Forum';
        $data['content'] = 'admin/man_forum/man_forum_view_kategori';
		$data['categories'] = $this->mforum->get_categories();
		$data['forum'] = $this->mforum->get_by_id($id);
        $this->load->view('admin/template', $data);
	}
}

?>
