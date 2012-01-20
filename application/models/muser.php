<?php
class Muser extends CI_Model
{
    function get_all_user(){
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
		$num_key = (!empty($keyword))?explode('-',$keyword):array();
		if(count($num_key)>1){
			$where = " AND id_user = '".trim($num_key[0])."' ";
		}else{
			$where = " AND (username LIKE '%".$keyword."%' OR nama LIKE '%".$keyword."%' OR id_user LIKE '%".$keyword."%' ) ";
		}

		$sql = "SELECT a.id_user, a.username, a.nama, a.email, a.no_tlp, b.nama_unit, a.id_lavel, c.nama_lavel
				FROM tb_user a, tb_unit_saker b,tb_lavel c WHERE a.id_lavel = c.id_lavel AND a.id_unit_satker = b.id_unit_satker
				 $where ORDER BY username ASC";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/admin/man_user/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 30;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);


		$sqlb = "SELECT a.id_user, a.username, a.nama, a.email, a.no_tlp, b.nama_unit, a.id_lavel, c.nama_lavel
				FROM tb_user a, tb_unit_saker b,tb_lavel c WHERE a.id_lavel = c.id_lavel AND a.id_unit_satker = b.id_unit_satker
				 $where ORDER BY username ASC
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}

    function get_all() {
        $sql = "SELECT *
                FROM tb_user
                JOIN tb_lavel
                ON tb_user.id_lavel = tb_lavel.id_lavel
                JOIN tb_unit_saker
                ON tb_unit_saker.id_unit_satker = tb_user.id_unit_satker
                ORDER BY id_user ASC";
        $query = $this->db->query($sql);
        return $query;
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
	
	function get_list_level(){
		return $this->db->query('SELECT * FROM tb_lavel')->result();
	}
	
	function get_list_unit(){
		return $this->db->query("SELECT * FROM tb_unit_saker")->result();
	}
	
	function reset_password($user){
		$cek = $this->db->query("select id_user from tb_user where id_user = ?", array($user))->num_rows();
		$info = false;

		if($cek > 0){
			if($this->db->query("UPDATE tb_user SET password = md5('12345') WHERE id_user = ?", array($user))){
				$info = true;
			}else{
				$info = false;
			}
		}
		
		return $info;
	}
	
	function delete_user($user){
		$cek = $this->db->query("select id_user from tb_user where id_user = ?", array($user))->num_rows();
		$info = false;

		if($cek > 0){
			if($this->db->query("DELETE FROM tb_user WHERE id_user = ?", array($user))){
				$info = true;
			}else{
				$info = false;
			}
		}
		
		return $info;
	}
	
	function add_user($d){
		$sql = "INSERT INTO tb_user(username,password,nama,email,no_tlp,id_unit_satker,id_lavel) values(?,?,?,?,?,?,?)";
		$this->db->query($sql,array($d['usr'],md5($d['pwd']),$d['nm'],$d['em'],$d['telp'],$d['dep'],$d['lev']));
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function get_edited_by_id($u){
		$sql = "SELECT id_user,username,nama,email,no_tlp,id_unit_satker,id_lavel FROM tb_user WHERE id_user = ? LIMIT 0,1";
		return $this->db->query($sql,array($u))->row();
	}
	
	function get_masa_kerja($u){
		$sql = "SELECT id_user,tanggal_mulai,tanggal_selesai
				FROM tb_masa_kerja
				WHERE id_user = ?
				ORDER BY id_masa_kerja DESC";
		return $this->db->query($sql,array($u))->result();
	}
	
	function edit_user($d){
		$sql = "UPDATE tb_user SET username = ?, nama = ?,email = ?, no_tlp = ?,id_unit_satker = ?,id_lavel = ? WHERE id_user = ?";
		$this->db->query($sql,array($d['usr'],$d['nm'],$d['em'],$d['telp'],$d['dep'],$d['lev'],$d['id']));
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function get_user_by_id($user){
		$sql = "SELECT a.id_user, a.username, a.nama, a.email, a.no_tlp, b.nama_unit, c.nama_lavel
				FROM tb_lavel c, tb_user a LEFT JOIN tb_unit_saker b ON a.id_unit_satker = b.id_unit_satker 
				WHERE a.id_lavel = c.id_lavel AND a.id_user = ? LIMIT 0,1";
		return $this->db->query($sql,array($user))->row();
	}
	
	function set_surat_kerja($d){
		$notvalid = array();
		
		$mulai = explode('-',$d['tgl_mulai']);
		$akhir = explode('-',$d['tgl_selesai']);
		
		if(!(checkdate($mulai[1],$mulai[0],$mulai[2]))){
			$notvalid[] = "tanggal awal tidak valid"; 
		}
		
		if(!(checkdate($akhir[1],$akhir[0],$akhir[2]))){
			$notvalid[] = "tanggal akhir tidak valid"; 
		}
		
		if(count($notvalid) < 1){
			
			$tgl_mulai		= $mulai[2].'-'.$mulai[1].'-'.$mulai[0];
			$tgl_selesai	= $akhir[2].'-'.$akhir[1].'-'.$akhir[0];
			
			$cek_tanggal_db = $this->db->query("SELECT id_user FROM tb_masa_kerja WHERE (( ?  BETWEEN tanggal_mulai AND tanggal_selesai) 
												OR ( ? BETWEEN tanggal_mulai AND tanggal_selesai)) AND id_user = ?",array($tgl_mulai,$tgl_selesai,$d['id']))->num_rows();
			
			if($cek_tanggal_db < 1){
				if(strtotime($tgl_mulai) > strtotime($tgl_selesai)){
					$this->session->set_flashdata('error',"tanggal awal lebih besar dari tanggal akhir");
				}else{
					$sql = "INSERT INTO tb_masa_kerja(id_user,tanggal_mulai,tanggal_selesai) VALUES(?,?,?)";
					$this->db->query($sql,array($d['id'],$tgl_mulai,$tgl_selesai));
					
					if($this->db->affected_rows() > 0){
						$this->log->create("suksee menambahkan data masa kerja user : ".$d['id']);
						$this->session->set_flashdata('success',"sukses");
						return true;
					}else{
						$this->session->set_flashdata('success',"gagal");
						return false;
					}
				}
			}else{
				$this->session->set_flashdata('error',"terdapat tanggal yang bersinggungan dengan tanggal masa kerja sebelumnya");
				return false;
			}

			
		}else{
			$this->session->set_flashdata('error',implode(', ',$notvalid));
			return false;
		}
		
		
	}
}