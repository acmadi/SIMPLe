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

	public function jawab($arr) 
	{
		$id = $arr['id_tiket'];

		// tambahkan jawaban ke dalam tb_knowledge_base
		$arr_knowledge = array(
			'judul'                 => $arr['pertanyaan'],
			'desripsi'              => $arr['description'],
			'jawaban'               => $arr['jawaban'],
			'nama_narasumber'       => $arr['nama_narasumber'],
			'jabatan_narasumber'    => $arr['jabatan'],
			'id_kat_knowledge_base' => $arr['id_kat_knowledge_base'],
			'bukti_file'            => $arr['bukti_file'],
			);	
		$this->db->insert('tb_knowledge_base', $arr_knowledge);
		$id_knowledge_base = $this->db->insert_id();
		
		$sent = isset($arr['sendmail'])?1:0;
		
		// update tiket
		$arr_tiket = array(
			'id_knowledge_base'     => $id_knowledge_base,
			'id_kat_knowledge_base' => $arr['id_kat_knowledge_base'],
			'jawab'                 => $arr['jawaban'],
			'sumber'                => $arr['nama_narasumber'],
			'tanggal_selesai'       => date('Y-m-d H:i:s'),
			'lavel'                 => 1,
			'id_user'               => $this->session->userdata('id_user'),
			'sent'               	=> $sent
			);
		$this->db->where('id', $id);
		$this->db->update('tb_tiket_helpdesk', $arr_tiket);

	}

}

?>