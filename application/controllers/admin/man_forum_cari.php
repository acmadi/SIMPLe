<?php
class Man_forum_cari extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('mforum');
    }

    var $title = 'Manajemen Forum';

    function index()
    {
		$keyword = $this->input->post('fcari',TRUE);
		$page		= $this->mforum->get_by_keyword($keyword);
		//echo $this->db->last_query(); exit;
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
        $data['title'] = 'Manajemen Forum';
        $data['content'] = 'admin/man_forum/man_forum_cari';
		$data['categories'] = $this->mforum->get_categories();
		
        $this->load->view('admin/template', $data);
    }
}

?>