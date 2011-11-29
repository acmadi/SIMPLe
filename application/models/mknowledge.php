<?php
class Mknowledge extends CI_Model
{

    /**
     * Ambil semua knowledge dan kategorinya.
     *
     * @return Object
     */
    public function get_all() {
        $sql = "SELECT tb_knowledge_base.*, tb_kat_knowledge_base.*
                FROM tb_knowledge_base
                LEFT JOIN tb_kat_knowledge_base
                ON tb_knowledge_base.id_kat_knowledge_base = tb_kat_knowledge_base.id_kat_knowledge_base";
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
        $sql = "INSERT INTO `tb_kat_knowledge_base`
                (`id_kat_knowledge_base`, `kat_knowledge_base`)
                VALUES (NULL, '$name')";

        $this->db->query($sql);
    }

    /**
     * Ambil kategori pada knowledge base
     *
     * @return Object
     */
    public function get_all_category()
    {
        $sql = "SELECT * FROM `tb_kat_knowledge_base` ORDER BY `kat_knowledge_base`";
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
     * Hapus kategori pada knowledge base
     *
     * @param $id Integer
     * @return void
     */
    public function delete_category($id)
    {
        // TODO: Buat validasi dan pengecekan user sudah login atau belum?

        //$sql = "DELETE FROM `tb_kat_knowledge_base` WHERE `tb_kat_knowledge_base`.`id_kat_knowledge_base` = '$id'";
        //$this->db->query($sql);
    }
}