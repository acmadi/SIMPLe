<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfrontdesk extends CI_Model
{

	public function get_all_tiket($key = '', $value = '')
	{
		$cond = '';
		if ($key != '' AND $value != '') : 
			$cond = ' WHERE ' . $key . " LIKE '%" . $value . "%' ";  
		endif;

		$q = $this->db->query(
			'SELECT *
			 FROM tb_tiket_frontdesk tkt JOIN tb_satker stkr
			 ON (tkt.id_satker = stkr.id_satker)
			' . $cond
			);

		return $q->result();
	}

}