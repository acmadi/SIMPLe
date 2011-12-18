<?php
class Man_unit_tambah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Munit','unit');
    }

    var $title = 'Manajemen Unit - Tambah';

    function index()
    {
        $data['title'] = 'Manajemen Unit - Tambah';
        $data['content'] = 'admin/man_unit/man_unit_tambah';
		$data['list_unit'] = $this->unit->get_list_unit();
        $this->load->view('admin/template', $data);
    }
	
	function add(){
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		
	
	}
	
}

?>