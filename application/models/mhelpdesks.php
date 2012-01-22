<?php 

class Mhelpdesks extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}

	public function get_by_id($id)
	{
		$sql = "SELECT *
				FROM tb_tiket_helpdesk
				LEFT JOIN tb_petugas_satker
				ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
				LEFT JOIN tb_satker
				ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
				WHERE id = ?";

		$result = $this->db->query($sql, array($id));


		return $result->row();
	}

	public function eskalasi($id)
	{
		$my_lavel = $this->session->userdata('lavel');

		if ((int) $my_lavel	< 7 ) : 
			$sql = "UPDATE tb_tiket_helpdesk SET lavel = (lavel + 1) WHERE id={$id}";
			$update_result = $this->db->query($sql);

			if($update_result) : 
				$sql = "SELECT * FROM tb_lavel
	                WHERE lavel = $my_lavel + 1
	                LIMIT 1";
	        	return $this->db->query($sql)->row()->nama_lavel;
        	endif;
		endif;

		return FALSE;
	}

}

?>