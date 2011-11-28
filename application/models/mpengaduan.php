<?php

class mpengaduan extends CI_Model {

	// Nama tabel: tb_pengaduan 

	function get()
	{
		$query = $this->db->query(
			'SELECT *, pengaduan AS isi FROM tb_pengaduan tbp JOIN tb_user tbu 
			ON (tbp.id_user = tbu.id_user) ORDER BY id_pengaduan');

		if ($query->num_rows > 0) :
			return $query->result();
		else :
			return FALSE;
		endif;
	}
	function get_one()
	{
		$query = $this->db->query(
			'SELECT * FROM tb_pengaduan ORDER BY id_pengaduan'
			)->row();

		if ($query->num_rows > 0) :
			return $query->row();
		else :
			return FALSE;
		endif;
	}
	function get_users()
	{
		// mengembalikan semua user dari tabel tb_user beserta nama lavelnya
		return $this->db->query(
			'SELECT id_user, nama, nama_lavel FROM tb_user tbu JOIN tb_lavel tbl 
			ON (tbu.id_lavel = tbl.id_lavel)'
			)->result();
	}

	function add($id_petugas_satker, $id_user, $pengaduan)
	{
		$this->db->query(
			"INSERT INTO tb_pengaduan(id_petugas_satker, id_user, pengaduan) 
			VALUES($id_petugas_satker, $id_user, '$pengaduan') ");
	}

}