<?php
class Mdirjen extends CI_Model
{
	//butuh perubahan
	/*public function get_jml_trm($ang = 1, $ex = '', $lev, $inc = ''){
		$kecuali	= " NOT IN($ex) ";
		$termasuk	= " IN($inc) ";
		return $this->db->query("SELECT a.no_tiket_frontdesk
								FROM tb_tiket_frontdesk a, tb_kon_unit_satker b
								WHERE a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ?
								AND ((a.is_active $kecuali AND lavel = ?) OR (lavel > ?) OR (a.is_active $termasuk AND lavel = ?))
								",array($ang,$lev,$lev,$lev))->num_rows;
	}*/
	
	public function count_all_tiket_frontdesk($status = '',$level = '', $act = '',$kep = '',$anggaran = ''){
		$optional_sql = '';
		if(!empty($anggaran)):
			$optional_sql = " AND c.anggaran = '{$anggaran}'";
		endif;
		
		if(!empty($act)){
			$optional_sql .= " AND a.is_active = '{$act}' ";
		}
		
		if(!empty($kep)){
			$optional_sql .= " AND a.keputusan = '{$kep}' ";
		}
	
        $sql = "SELECT a.no_tiket_frontdesk FROM `tb_tiket_frontdesk` a
                JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                WHERE
                 status = '{$status}' AND
                a.lavel = '{$level}'
				$optional_sql
                GROUP BY no_tiket_frontdesk
                ORDER BY tanggal";
		

		return $this->db->query($sql)->num_rows();
	}
	
	public function get_tiket_by_level($status = '',$level = '', $act = '',$kep = '',$anggaran = ''){
		$optional_sql = '';
		if(!empty($anggaran)):
			$optional_sql = " AND c.anggaran = '{$anggaran}'";
		endif;
		
		if(!empty($act)){
			$optional_sql .= " AND a.is_active = '{$act}' ";
		}
		
		if(!empty($kep)){
			$optional_sql .= " AND a.keputusan = '{$kep}' ";
		}
	
        $sql = "SELECT * FROM `tb_tiket_frontdesk` a
                JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                WHERE
                 status = '{$status}' AND
                a.lavel = '{$level}'
				$optional_sql
                GROUP BY no_tiket_frontdesk
                ORDER BY tanggal";
		
		return $this->db->query($sql);
	}
	
	
	
	public function get_jml_trs($anggaran,$level){
		return $this->db->query("SELECT a.no_tiket_frontdesk FROM tb_tiket_frontdesk a, tb_kon_unit_satker b 
								WHERE a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian 
								AND (SELECT c.anggaran FROM tb_unit_saker c 
								WHERE b.id_unit_satker = c.id_unit_satker ) = ? AND lavel > ?
								",array($anggaran,$level))->num_rows;
	}
	
	function get_jml_trs_sub($anggaran,$level){
		return $this->db->query("SELECT a.no_tiket_frontdesk FROM tb_tiket_frontdesk a, tb_kon_unit_satker b 
								WHERE a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ? 
								AND ((a.is_active >= 4 AND a.lavel > ?) OR (a.lavel > ?))
								",array($anggaran,$level,$level))->num_rows;
	}
	
	function get_jml_setuju($anggaran,$level){
		return $this->db->query("SELECT a.no_tiket_frontdesk FROM tb_tiket_frontdesk a, tb_kon_unit_satker b 
								WHERE a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ? 
								AND a.is_active = 6 AND a.status = 'close' AND a.lavel = ?
								",array($anggaran,$level))->num_rows;
	}
	
	function get_jml_tolak($anggaran,$level){
		return $this->db->query("SELECT a.no_tiket_frontdesk FROM tb_tiket_frontdesk a, tb_kon_unit_satker b 
								WHERE a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ? 
								AND a.is_active = 0 AND a.status = 'close' AND a.lavel = ?
								",array($anggaran,$level))->num_rows;
	}
    
}