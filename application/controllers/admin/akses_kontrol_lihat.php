<?php
class Akses_kontrol_lihat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Akses Kontrol - Lihat';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$this->load->model('Makses', 'akses');
		
		$id = $this->uri->segment(4);
		$data['list_kontrol'] 	= $this->akses->get_akses_by_id($id);
		
        $data['title'] 			= 'Akses Kontrol - Lihat';
        $data['content'] 		= 'admin/akses_kontrol/akses_kontrol_lihat';
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>