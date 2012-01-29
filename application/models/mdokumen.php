<?php
class Mdokumen extends CI_Model
{
    function get_all_kelengkapan(){
		//@F2D
		$keyword = $this->input->post('keyword',TRUE);

		$this->load->library('pagination');

		$total_seg = $this->uri->total_segments();
		$default = array("keyword");
		$this->terms = $this->uri->uri_to_assoc(4,$default);

		if(($this->terms['keyword'] != '') OR ($keyword != '')){
			$uri_segment = 6;
			$offset = (int) $this->uri->segment($uri_segment,0);

			if($this->terms['keyword'] != ''){
				$keyword = $this->terms['keyword'];
			}else{
				$this->terms['keyword'] = $keyword;
			}

			$uriparams['keyword'] = $this->terms['keyword'];

			if(($total_seg % 2) > 0){
				$offset = (int) $this->uri->segment(6, 0);
			}

			$url_add = $this->uri->assoc_to_uri($uriparams).'/';
		}else{
			$uri_segment = 4;
			$offset = (int) $this->uri->segment($uri_segment,0);
			$url_add = '';

		}

		//if from suggest
		$where = '';
		if((isset($keyword)) and ($keyword != '')){
			$where = " AND nama_kelengkapan LIKE '%".$keyword."%' ";
		}

		$sql = "SELECT * FROM tb_kelengkapan_doc WHERE id_kelengkapan != 0 $where ORDER BY id_kelengkapan";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/admin/man_kelengkapan_doc/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 30;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);


		$sqlb = "SELECT * FROM tb_kelengkapan_doc WHERE id_kelengkapan != 0 $where ORDER BY id_kelengkapan
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
	
	function get_all_user_by_id($keyword){
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
		$num_key = (!empty($keyword))?explode('-',$keyword):array();
		if(count($num_key)>1){
			$where = " WHERE id_user = '".trim($num_key[0])."' ";
		}else{
			$where = " WHERE username LIKE '%".$keyword."%' OR nama LIKE '%".$keyword."%' OR id_user LIKE '%".$keyword."%' ";
		}
		
		
		
		
		$sql = "SELECT id_user, username, nama, email, no_tlp, nama_unit, id_lavel
				FROM tb_user a LEFT JOIN tb_unit_saker b on a.id_unit_satker = b.id_unit_satker $where
				ORDER BY id_user ASC";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/man_user_cari/index').'/'.$url_add.'/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 3;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		
		
		$sqlb = "SELECT id_user, username, nama, email, no_tlp, nama_unit, id_lavel
				FROM tb_user a LEFT JOIN tb_unit_saker b on a.id_unit_satker = b.id_unit_satker $where
				ORDER BY id_user ASC
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
	
	
	function delete_kelengkapan($dokumen){
		$cek = $this->db->query("select id_kelengkapan from tb_kelengkapan_doc where id_kelengkapan = ?", array($dokumen))->num_rows();
		$info = false;

		if($cek > 0){
			if($this->db->query("DELETE FROM tb_kelengkapan_doc WHERE id_kelengkapan = ?", array($dokumen))){
				$info = true;
			}else{
				$info = false;
			}
		}
		
		return $info;
	}
	
	function add_kelengkapan($d){
		$sql = "INSERT INTO tb_kelengkapan_doc(nama_kelengkapan) values(?)";
		$this->db->query($sql,array($d['kel']));
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function get_edited_by_id($u){
		$sql = "SELECT * FROM tb_kelengkapan_doc WHERE id_kelengkapan = ? LIMIT 0,1";
		return $this->db->query($sql,array($u))->row();
	}
	

	
	function edit_kelengkapan($d){
		$sql = "UPDATE tb_kelengkapan_doc SET nama_kelengkapan = ? WHERE id_kelengkapan = ?";
		$this->db->query($sql,array($d['nm'],$d['id']));
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
}