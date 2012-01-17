<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mreferensi extends CI_Model
{

	public function fetch_url($url)
	{
	  $ch = curl_init();
	  $timeout = 5;
	  curl_setopt($ch,CURLOPT_URL,$url);
	  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
	}

	public function cari($keyword)
	{
		return $this->get_by_keyword($keyword);
	}

	function get_all()
	{
		$q = "SELECT * FROM tb_referensi r
			  LEFT JOIN tb_referensi_kat k
			  ON (r.id_referensi_kat = k.id_referensi_kat)
		";
		$refs = $this->db->query($q)->result();

		return $refs;
	}
	function get_categories()
	{
		$q = "SELECT * FROM tb_referensi_kat";
		$kats = $this->db->query($q)->result();

		foreach ($kats as &$kat) :
			$kat->href = 'referensi/category/' . $kat->id_referensi_kat;
		endforeach;

		return $kats;
	}

	function get_by_category($cat)
	{

		$q = "SELECT * FROM tb_referensi WHERE id_referensi_kat='$cat'";
		$refs = $this->db->query($q)->result();

		foreach($refs as &$ref) :
			$ref->href= base_url('upload/referensi/' . $ref->nama_file);
		endforeach;

		return $refs;
	}
	function get_by_keyword($keyword)
	{
		$q = "SELECT * FROM tb_referensi WHERE nama_ref LIKE '%$keyword%'";
		$refs = $this->db->query($q)->result();

		foreach($refs as &$ref) :
			$ref->href= base_url('upload/referensi/' . $ref->nama_file);
		endforeach;

		return $refs;
	}
}