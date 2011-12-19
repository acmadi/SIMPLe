<?php
class Mhistori extends CI_Model {

	public function get_all_history(){
		$this->load->library('pagination');		
		$sql = "SELECT a.id, a.created, a.user, a.message
				FROM tb_logs a
				ORDER BY created DESC ";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/histori/index');
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$offset = (int) $this->uri->segment(4, 0);
		
		$sqlb = "SELECT a.id, a.created, a.user, a.message
				FROM tb_logs a
				ORDER BY created DESC LIMIT ?,?";
		
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
	
	
	
}