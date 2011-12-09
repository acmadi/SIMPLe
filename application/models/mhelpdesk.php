<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mhelpdesk extends CI_Model
{

	public function get_all_tiket($key = '', $value = '')
	{
		$cond = '';
		if ($key != '' AND $value != '') : 
			$cond = ' WHERE ' . $key . " LIKE '%" . $value . "%' ";  
		endif;

		$q = $this->db->query(
			'SELECT *, concat(no_tiket_helpdesk, \' \', no_antrian) AS no_tiket
			 FROM tb_tiket_helpdesk tkt JOIN tb_petugas_satker ptgs JOIN tb_satker stkr
			 ON (tkt.id_petugas_satket = ptgs.id_petugas_satker)
			 AND (ptgs.id_satker = stkr.id_satker)
			' . $cond
			);

		return $q->result();
	}

}