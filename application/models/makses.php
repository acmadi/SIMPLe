<?php
class Makses extends CI_Model
{

    /**
     * Ambil semua knowledge dan kategorinya.
     *
     * @return Object
     */
    public function get_all() {
        $sql = "SELECT * FROM tb_lavel";
        return $this->db->query($sql);
    }

	/**
     * Ambil semua knowledge dan kategorinya.
     *
     * @return Object
     */
    public function get_akses_by_id($id) {
        $sql = "SELECT id_user,nama, username, kode_unit, id_lavel
				FROM tb_user WHERE kode_unit = ?";
		$sql2 = "SELECT kode_unit,nama_unit
				FROM tb_unit_saker WHERE kode_unit = ? LIMIT 0,1";

        $data['result'] = $this->db->query($sql, array($id));
        $data['result2'] = $this->db->query($sql2, array($id))->row();

		return $data;

    }

    /**
     * Untuk menambah kategori baru pada knowledge base
     *
     * @param $name string
     * @return void
     */
    public function add_category($name)
    {
        $sql = "INSERT INTO tb_kat_knowledge_base
                (kat_knowledge_base)
                VALUES (?)";

        $query = $this->db->query($sql,array($name));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

	/**
     * Untuk menambah  knowledge
     *
     * @param $data array
     * @return void
     */
    public function add_akses($data = array())
    {
        $sql = "INSERT INTO tb_unit_saker(kode_unit,nama_unit)
				VALUES(?,?);";

        $query = $this->db->query($sql,array($data['fid'],$data['fnamalevel']));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

    /**
     * Ambil kategori pada knowledge base
     *
     * @return Object
     */
    public function get_all_category()
    {
        $sql = "SELECT * FROM tb_kat_knowledge_base ORDER BY kat_knowledge_base";
        return $this->db->query($sql);
    }

	/**
     * datapatkan knowledge base
     *
	 * @param $id integer
     * @return Row
     */
    public function get_edit_by_id($id)
    {
        $query = $this->db->query("SELECT kode_unit,nama_unit
								   FROM tb_unit_saker WHERE kode_unit =  '".$id."'");
		return $query->row();
    }


	/**
     * ubah knowledge base
     *
     * @param $data array
     * @return Row
     */
	public function edit_data_by_id($data = array()){
		$sql = "UPDATE tb_unit_saker SET nama_unit = ? WHERE kode_unit = ?";
		$query	= $this->db->query($sql, array($data['fnamalevel'],$data['fid']));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	}

	/**
     * ubah kategori knowledge base
     *
     * @param $data array
     * @return Row
     */
	public function do_edit_category($data = array()){
		$sql = "UPDATE tb_kat_knowledge_base SET kat_knowledge_base = ? WHERE id_kat_knowledge_base = ?";
		$query	= $this->db->query($sql, array($data['kat'],$data['id']));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	}

	/**
     * hapus knowledge base
     *
     * @param $data integer
     * @return boolean
     */
	public function delete($id){
		$sql = "DELETE * FROM tb_user WHERE id_user = ?";

		$query	= $this->db->query($sql, array($id));

		if($this->db->affected_rows() > 0){
			$this->log->create("Menghapus user ".$id);
			$this->session->set_flashdata('');
		}else{
			return 2;
		}
	}

	/**
     * hapus kategori knowledge base
     *
     * @param $data integer
     * @return boolean
     */
	public function delete_category($id){
		$sql = "SELECT id_knowledge_base
				FROM tb_knowledge_base
				WHERE id_kat_knowledge_base = ?";

		$query	= $this->db->query($sql, array($id));

		if($query->num_rows()>0){
			return 3;
		}else{
			$sql2 = "DELETE FROM tb_kat_knowledge_base WHERE id_kat_knowledge_base = ?";
			$query2	= $this->db->query($sql2, array($id));

			if($this->db->affected_rows() > 0){
				return 1;
			}else{
				return 2;
			}
		}

	}

	/**
     * search kategori knowledge base
     *
     * @param $data integer
     * @return boolean
     */
	public function search_by_category($id, $limit = ''){
		$sql = "SELECT a.judul,a.id_kat_knowledge_base
				FROM tb_knowledge_base a,tb_kat_knowledge_base b
				WHERE a.id_kat_knowledge_base = b.id_kat_knowledge_base AND a.id_kat_knowledge_base = ? $limit";

		$data['result'] = $this->db->query($sql, array($id));

		$sql2 = "SELECT kat_knowledge_base
				FROM tb_kat_knowledge_base WHERE id_kat_knowledge_base = ?
				";

		$query2 	= $this->db->query($sql2, array($id));
		if ($query2->num_rows() > 0)
		{
		   $row = $query2->row();
		   $data['name'] = $row->kat_knowledge_base;

		}

		return $data;
	}

    /**
     * Ambil semua user berdasarkan level id.
     *
     * @param $id level id
     * @return Object
     */
    public function get_all_users_by_level($id) {
        $sql = "SELECT * FROM tb_user
                JOIN tb_lavel
                ON tb_user.id_lavel = tb_lavel.id_lavel
                JOIN tb_unit_saker
                ON tb_unit_saker.id_unit_satker = tb_user.id_unit_satker
                WHERE tb_user.id_lavel = ?";
        $result = $this->db->query($sql, array($id));
        return $result;
    }
	
	public function get_info_kontrol($id){
		$query = $this->db->query("SELECT id_lavel,nama_lavel FROM tb_lavel WHERE id_lavel = ?", array($id));
		return $query->row();
	}
	
	public function update_akses($data){
		$sql = "UPDATE tb_lavel SET nama_lavel = ? WHERE id_lavel = ? ";
		$query = $this->db->query($sql, array($data['fnamalevel'],$data['fid']));
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
		
	function get_user_by_id($user){
		$sql = "SELECT a.id_user,a.username,a.nama,a.email,a.no_tlp, c.nama_lavel 
				FROM tb_user a, tb_lavel c
				WHERE a.id_lavel = c.id_lavel AND a.id_user = ? LIMIT 0,1";
		return $this->db->query($sql,array($user))->row();
	}
	
	function get_masa_kerja($u){
		$sql = "SELECT id_user,username,nama,email,no_tlp,kode_unit,id_lavel FROM tb_user WHERE id_user = ? LIMIT 0,1";
		return $this->db->query($sql,array($u))->row();
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
	
}