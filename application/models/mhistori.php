<?php
class Mhistori extends CI_Model {

	public function get_all_history(){
		$this->load->library('pagination');		
		$sql = "SELECT a.id, a.created, b.nama, a.message
				FROM tb_logs a, tb_user b 
				WHERE a.id_user = b.id_user
				ORDER BY a.created DESC ";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/histori/index');
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$offset = (int) $this->uri->segment(4, 0);
		
		$sqlb = "SELECT a.id, a.created, b.nama, a.message
				FROM tb_logs a, tb_user b 
				WHERE a.id_user = b.id_user
				ORDER BY a.created DESC LIMIT ?,?";
		
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();
		$data['nomor_item'] = $offset;

		return $data;
	}
	
	function get_all_history_by_id($keyword){
		$this->load->library('pagination');
		$uri_segment = 6;
		$offset = (int) $this->uri->segment($uri_segment,0);	
		
		
		$total_seg = $this->uri->total_segments();
		$default = array("keyword");
		
		if($total_seg > 4){
			$this->terms = $this->uri->uri_to_assoc(4,$default);
			
			if($this->terms['keyword'] != ''){
				$keyword = $this->terms['keyword'];
			}else{
				$this->terms['keyword'] = $keyword;
			}
			
			$uriparams['keyword'] = $this->terms['keyword'];
			
			if(($total_seg % 2) > 0){
				$offset = (int) $this->uri->segment(6, 0);
			}
			
			$url_add = $this->uri->assoc_to_uri($uriparams);
		}else{
			$searchparams = array();
			$searchparams['keyword'] 	= $keyword; 
			$url_add = $this->uri->assoc_to_uri($searchparams);
		
		}
		
		//if from suggest
		$num_key = (!empty($keyword))?explode('_',$keyword):array();
		if(count($num_key)>1){
			$where = " AND DATE(a.created) BETWEEN '".trim($num_key[0])."' AND '".trim($num_key[1])."' ";
		}else{
			$where = " AND DATE(a.created) = '".trim($num_key[0])."' ";
		}
		
		
		
		$sql = "SELECT a.id, a.created, b.nama, a.message
				FROM tb_logs a, tb_user b 
				WHERE a.id_user = b.id_user $where 
				ORDER BY a.created DESC";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/histori/filter').'/'.$url_add.'/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		
		
		$sqlb = "SELECT a.id, a.created, b.nama, a.message
				FROM tb_logs a, tb_user b 
				WHERE a.id_user = b.id_user $where 
				ORDER BY a.created DESC
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();
		$data['tgl_m'] = $num_key[0];
		$data['tgl_a'] = $num_key[1];
		$data['nomor_item'] = $offset;

		return $data;
	}
	
	
	
}