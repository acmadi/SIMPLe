<?php
class Helpdesk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk', 'helpdesk');
    }

    var $title = 'Help Desk';

    function index()
    {
	  $page		= $this->helpdesk->get_all_tiket(); 
	  $pageData	= $page['query']->result();
	  $pageLink	= $page['pagination1'];
	  $nomor	= $page['nomor_item'];
	
	  $data		= array('result'=>$pageData,'pageLink'=>$pageLink,'nomor'=>$nomor,);
      $data['title'] = 'Help Desk';
	  $data['pilihan'] = array(
                  'tiket'  => 'No Tiket',
                  'petugas'    => 'Nama Petugas',
                  'satker'   => 'Nama Satker',
                );
	  $data['cari'] ='';$data['keyword'] = '';
	  $data['content'] = 'admin/helpdesk/helpdesk';

    $bc[0]->link = 'admin/dashboard';
    $bc[0]->label = 'Home';
    $bc[1]->link = 'admin/helpdesk';
    $bc[1]->label = 'Helpdesk';
    $data['breadcrumb'] = $bc;

    $this->load->view('admin/template', $data);
    }
    function search()
    {
      /*if ($this->session->userdata('login') == TRUE)
        {*/
      $key = $this->input->post('fcari');
      $value = $this->input->post('fkeyword');

	  $keyword = $key.'_'.$value;
	    
		$page		= $this->helpdesk->get_all_tiket_by_keyword($keyword);
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		$nomor	= $page['nomor_item'];
		$cari	= $page['cari'];
		$keyword	= $page['keyword'];
		
		
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,'nomor'=>$nomor,'cari'=>$cari,'keyword'=>$keyword,);
		
		$data['title'] 	 = 'Histori Cari';
		$data['pilihan'] = array(
                  'tiket'  => 'No Tiket',
                  'petugas'    => 'Nama Petugas',
                  'satker'   => 'Nama Satker',
                );
		$data['content'] = 'admin/helpdesk/helpdesk';

    $bc[0]->link = 'admin/dashboard';
    $bc[0]->label = 'Home';
    $bc[1]->link = 'admin/helpdesk';
    $bc[1]->label = 'Helpdesk';
    $bc[2]->link = $this->uri->uri_string();
    $bc[2]->label = 'Hasil Pencarian';
    $data['breadcrumb'] = $bc;

		$this->load->view('admin/template', $data);
	  
      /*}
        else
        {
            $this->load->view('login/login_view');
        }*/
    }
}

?>