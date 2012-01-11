<?php
class Man_unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Munit','unit');
    }

    var $title = 'Manajemen Unit';

    function index()
    {
		$page		= $this->unit->get_all_unit();
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
		
        $data['title'] = 'Manajemen Unit';
        $data['content'] = 'admin/man_unit/man_unit';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = $this->uri->uri_string();
        $bc[1]->label = $this->title;
        $data['breadcrumb'] = $bc;


        $this->load->view('admin/template', $data);
    }
	
	function delete($id){
		$id = trim($this->uri->segment(4,''));
		if(!empty($id)){
			$info = $this->unit->delete_unit($id);
			if($info['status']){
				$this->session->set_flashdata('success',"berhasil menghapus unit : ".$info['item']);
				redirect('admin/man_unit');
			}else{
				$this->session->set_flashdata('error',"gagal menghapus unit : ".$info['item']);
				redirect('admin/man_unit');
			}
		}
	
	}
	
	function cari(){
		if ($this->input->is_ajax_request()) {

            $term = $this->input->get('term');
            
            $sql = "SELECT id_unit_satker, nama_unit
					FROM tb_unit_saker WHERE id_unit_satker LIKE '%{$term}%' OR nama_unit LIKE '%{$term}%'"; 
			

            $result = $this->db->query($sql);

            $array = array();
            $i = 0;
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $value) {
                    $array[$i] = $value->id_unit_satker . ' - ' . $value->nama_unit;
                    $i++;
                }
            }
            echo json_encode($array);
        }
        exit();
	}
	
}

?>