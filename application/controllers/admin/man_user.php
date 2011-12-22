<?php
class Man_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Muser','muser');
    }

    var $title = 'Manajemen User';

    function index()
    {
		$page		= $this->muser->get_all_user();
		$pageData	= $page['query']->result();
		$pageLink	= $page['pagination1'];
		
		$data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
		
        $data['title'] 		= 'Manajemen User';
        $data['content'] 	= 'admin/man_user/man_user';
        $this->load->view('admin/template', $data);
       
    }
	
	function reset_password(){
		$user	= trim($this->uri->segment(4,''));
		if(!empty($user)){
			$info = $this->muser->reset_password($user);
			if($info){
				$this->session->set_flashdata('success',"berhasil mereset password ID User : ".$user);
				redirect('admin/man_user');
			}else{
				$this->session->set_flashdata('error',"gagal mereset password ID User : ".$user);
				redirect('admin/man_user');
			}
		}
	}
	
	function delete($user){
		$user = trim($this->uri->segment(4,''));
		if(!empty($user)){
			$info = $this->muser->delete_user($user);
			if($info){
				$this->session->set_flashdata('success',"berhasil menghapus ID user : ".$user);
				redirect('admin/man_user');
			}else{
				$this->session->set_flashdata('error',"gagal menghapus ID user : ".$user);
				redirect('admin/man_user');
			}
		}
	}
	
	function cari()
    {
        if ($this->input->is_ajax_request()) {

            $term = $this->input->get('term');
            
            $sql = "SELECT id_user, username
					FROM tb_user WHERE id_user LIKE '%{$term}%' OR username LIKE '%{$term}%' ORDER BY id_user"; 
			

            $result = $this->db->query($sql);

            $array = array();
            $i = 0;
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $value) {
                    $array[$i] = $value->id_user . ' - ' . $value->username;
                    $i++;
                }
            }
            echo json_encode($array);
        }
        exit();
    }
}

?>