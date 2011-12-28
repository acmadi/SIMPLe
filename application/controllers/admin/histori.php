<?php
class Histori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mhistori','histori');
    }

    var $title = 'Histori';

    function index()
    {
		$page		= $this->histori->get_all_history(); 
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		$nomor		= $page['nomor_item'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,'nomor'=>$nomor,);
		
        $data['title'] = 'Histori';
        $data['content'] = 'admin/histori/histori';
        $this->load->view('admin/template', $data);
    }
	
	function filter(){
		$tgl_mulai = $this->input->post('ftglmulai',TRUE);
		$tgl_akhir = $this->input->post('ftglselesai',TRUE);
		
		
		
		$keyword	= $tgl_mulai.'_'.$tgl_akhir;
		
		$page		= $this->histori->get_all_history_by_id($keyword);
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		$mulai	= $page['tgl_m'];
		$akhir	= $page['tgl_a'];
		$nomor	= $page['nomor_item'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,'mulai'=>$mulai,'akhir'=>$akhir,'nomor'=>$nomor,);
		
		$data['title'] 	 = 'Histori Cari';
		$data['content'] = 'admin/histori/histori_cari';
		$this->load->view('admin/template', $data);
	}
}

?>