<?php
class Mknowledge extends CI_Model
{

    /**
     * Ambil semua knowledge dan kategorinya.
     *
     * @return Object
     */
    public function get_all() {
        $sql = "SELECT a.id_knowledge_base,a.judul,a.desripsi,a.jawaban,b.kat_knowledge_base
				FROM tb_knowledge_base a,tb_kat_knowledge_base b
				WHERE a.id_kat_knowledge_base = b.id_kat_knowledge_base";
        return $this->db->query($sql);
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
    public function add_knowledge($data = array())
    {
        $sql = "INSERT INTO tb_knowledge_base(id_kat_knowledge_base,judul,desripsi,jawaban) 
				VALUES(?,?,?,?);";

        $query = $this->db->query($sql,array($data['flist'],$data['fjudul'],$data['fdesk'],$data['fjawab']));
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
        $query = $this->db->query("SELECT 	id_knowledge_base,
											id_kat_knowledge_base,
											judul,
											desripsi,
											jawaban
									FROM tb_knowledge_base
									WHERE
									 id_knowledge_base = '".$id."'");
		return $query->row();
    }
	
	
	/**
     * ubah knowledge base
     *
     * @param $data array
     * @return Row
     */
	public function edit_data_by_id($data = array()){
		$sql = "UPDATE tb_knowledge_base SET id_kat_knowledge_base = ? , judul = ? , desripsi = ? , jawaban = ? WHERE id_knowledge_base = ?";
		$query	= $this->db->query($sql, array($data['fkategori'],$data['fjudul'],$data['fdeskripsi'], $data['fjawaban'], $data['id']));
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
	public function delete_knowledge($id){
		$sql = "SELECT no_tiket_helpdesk
				FROM tb_tiket_helpdesk 
				WHERE id_knowledge_base = ?";
		
		$query	= $this->db->query($sql, array($id));
		
		if($query->num_rows()>0){
			return 3;
		}else{
			$sql2 = "DELETE FROM tb_knowledge_base WHERE id_knowledge_base = ?";
			$this->db->query($sql2, array($id));
			
			if($this->db->affected_rows() > 0){ 
				return 1;
			}else{ 
				return 2;
			}
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
	
	
}