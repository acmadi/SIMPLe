<?php
class Man_kelengkapan_doc extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mdokumen','dokumen');
    }

    var $title = 'Manajemen Dokumen';

    function index()
    {
		$page		= $this->dokumen->get_all_kelengkapan();
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
		
        $data['title'] 		= 'Manajemen Kelengkapan';
        $data['content'] 	= 'admin/man_kelengkapan/man_kelengkapan';
		$data['isian_form']	= $page['isian_form1'];
		
        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = $this->uri->uri_string();
        $bc[1]->label = $this->title;
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
       
    }
		
	function delete($kel){
		$kel = trim($this->uri->segment(4,''));
		if(!empty($kel)){
			$info = $this->dokumen->delete_kelengkapan($kel);
			if($info){
				$this->session->set_flashdata('success',"berhasil menghapus kelengkapan dokumen");
				redirect('admin/man_kelengkapan_doc');
			}else{
				$this->session->set_flashdata('error',"gagal menghapus kelengkapan dokumen ");
				redirect('admin/man_kelengkapan_doc');
			}
		}
	}
	
	function cari()
    {
        if ($this->input->is_ajax_request()) {

            $term = $this->input->get('term');
            
            $sql = "SELECT *
					FROM tb_kelengkapan_doc WHERE nama_kelengkapan LIKE '%{$term}%' AND id_kelengkapan != 0 ORDER BY id_kelengkapan"; 
			
		
            $result = $this->db->query($sql);

            $array = array();
            $i = 0;
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $value) {
                    $array[$i] = $value->nama_kelengkapan;
                    $i++;
                }
            }
			
            echo json_encode($array);
        }
        exit();
    }
}

?>