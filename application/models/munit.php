<?php
class Munit extends CI_Model {

    public function delete($kode_unit) {
        $sql = "DELETE FROM tb_unit WHERE kode_unit = ?";
        return $this->db->query($sql, array($kode_unit));
    }

    public function update($kode_unit) {
        $sql = "UPDATE FROM tb_unit () VALUES () WHERE kode_unit = ?";
        $this->db->query($sql, array());
    }
	
	public function get_all_unit(){
		$this->load->library('pagination');		
		$sql = "SELECT * FROM tb_unit_saker";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/man_unit/index');
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$offset = (int) $this->uri->segment(4, 0);
		
		$sqlb = "SELECT * FROM tb_unit_saker LIMIT ?,?";
		
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
	
	public function get_unit_by_id($keyword){
		$this->load->library('pagination');
		$uri_segment = 6;
		$offset = (int) $this->uri->segment($uri_segment,0);	
		
		
		$total_seg = $this->uri->total_segments(); //print_r($total_seg);exit();
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
		
		$where = " WHERE nama_unit LIKE '%".$keyword."%' OR kode_unit LIKE '%".$keyword."%'";
		
		$sql = "SELECT * FROM tb_unit_saker $where
				ORDER BY id_unit_satker ASC";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/man_unit_cari/index').'/'.$url_add.'/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		
		
		$sqlb = "SELECT * FROM tb_unit_saker $where
				ORDER BY id_unit_satker ASC
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
	
	public function delete_unit($u){
		$cek = $this->db->query('SELECT id_unit_satker FROM tb_user WHERE id_unit_satker = ?
								 UNION 
								 SELECT id_unit_satker FROM tb_kon_unit_satker WHERE id_unit_satker = ?',array($u,$u))->num_rows();
								 
		if($cek > 0){
			$this->session->set_flashdata('error','terdapat keterkaitan dengan data yang lain');
			return false;
		}else{
			$this->db->query('DELETE FROM tb_unit_saker WHERE id_unit_satker = ?',array($u));
			if($this->db->affected_rows() > 0){
				$this->log->create('berhasil menghapus ID unit_satker : '.$u);
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
	
	public function get_list_unit(){
		//return $this->db->query("SELECT * FROM tb_unit LIMIT 0,50")->result();
		$result = array();
		$query = $this->db->query("SELECT * FROM tb_unit LIMIT 0,50")->result();
		foreach($query as $d){
			$result[$d->id_kementrian][$d->id_unit] = $d->nama_unit;
		}
		
		return $result;
	}
	
	public function get_list_kementrian(){
		return $this->db->query("SELECT id_kementrian, nama_kementrian FROM tb_kementrian")->result();
	}
	
	function add_unit($d){
		$sql = "INSERT INTO tb_unit_saker(kode_unit,nama_unit,anggaran) values(?,?,?)";
		$this->db->query($sql,array($d['kd'],$d['nm'],$d['ag']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Berhasil menambah data unit');
			$this->log->create('Berhasil menambah unit : '.$d['nm']);
			$id = $this->db->query('SELECT id_unit_satker FROM tb_unit_saker WHERE kode_unit = ? AND nama_unit = ? AND anggaran = ? ',array($d['kd'],$d['nm'],$d['ag']))->row();

			if($id != ''){
				$sql2 = "INSERT INTO tb_kon_unit_satker(id_unit_satker,id_kementrian,id_unit) values(?,?,?)";
				//$num_kon = 0;
				for( $i=0 ; $i<count($d['un']) ; $i++ ){
					$id_kem = substr($d['un'][$i],0,3);
					$id_un = substr($d['un'][$i],3,2);
					
					$this->db->query($sql2,array($id->id_unit_satker,$id_kem,$id_un));
				}
			}else{
				$this->session->set_flashdata('error','Gagal menambah data unit');
			}
			return true;
		}else{
			return false;
		}
	}
	
	function get_edited_by_id($u){
		$sql = "SELECT * FROM tb_unit_saker WHERE id_unit_satker = ? LIMIT 0,1";
		$unit_row = $this->db->query($sql,array($u))->row();
		
		$sql2 = "SELECT a.id_kon_unit_satker,a.id_unit_satker,a.id_kementrian,a.id_unit,b.nama_unit
				FROM tb_kon_unit_satker a,tb_unit b WHERE a.id_kementrian = b.id_kementrian AND a.id_unit = b.id_unit AND a.id_unit_satker = ?";
		$kon_unit_row = $this->db->query($sql2,array($u))->result();
		
		$data = array();
		$data['unit_1'] = $unit_row;
		$data['unit_2'] = $kon_unit_row;
		return $data;
	}
	
	function edit_unit($d,$f){
		$sql = "UPDATE tb_unit_saker SET kode_unit = ?, nama_unit = ?, anggaran = ? WHERE id_unit_satker = ?";
		$this->db->query($sql,array($d['kd'],$d['nm'],$d['ag'],$f));
		
		
			$this->session->set_flashdata('success','Berhasil mengubah data unit');
			$this->log->create('Berhasil megubah unit : '.$f);
			$id = $this->db->query('SELECT id_unit_satker FROM tb_unit_saker WHERE kode_unit = ? AND nama_unit = ? AND anggaran = ? ',array($d['kd'],$d['nm'],$d['ag']))->row();

			if($id != ''){
				$this->db->query("DELETE FROM tb_kon_unit_satker WHERE id_unit_satker = ?",array($id->id_unit_satker));
				$sql2 = "INSERT INTO tb_kon_unit_satker(id_unit_satker,id_kementrian,id_unit) values(?,?,?)";
				//$num_kon = 0;
				for( $i=0 ; $i<count($d['un']) ; $i++ ){
					$id_kem = substr($d['un'][$i],0,3);
					$id_un = substr($d['un'][$i],3,2);
					
					$this->db->query($sql2,array($id->id_unit_satker,$id_kem,$id_un));
				}
			}else{
				$this->session->set_flashdata('error','Gagal mengubah data unit');
			}
			return true;
		
	}
	
}