<?php
class Mtiket extends CI_Model
{
    //F2D
    public function get_list_tiket()
    {	
		 $sql = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker,
					   tbf.is_active, tbf.id_unit, tbf.status, tl.nama_lavel,
				       tb_kementrian.id_kementrian, tb_kementrian.nama_kementrian,tbf.keputusan
				FROM tb_unit tbu, tb_lavel tl, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
                LEFT JOIN tb_kementrian ON tb_kementrian.id_kementrian = tbf.id_kementrian
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.lavel = tl.lavel
				GROUP BY tbf.no_tiket_frontdesk
				ORDER BY tbf.no_tiket_frontdesk DESC";
        $query = $this->db->query($sql);
		
		return $query;
    }
	
	public function get_list_tiket_masuk()
    {	
		 
		 $sql = "SELECT tbf.no_tiket_frontdesk,
						tbf.tanggal,
						tbu.nama_unit, 
						tbf.id_satker, 
						ts.nama_satker,
						tbf.is_active, 
						tbf.id_unit, 
						tbf.status, 
						tl.nama_lavel,
						tb_kementrian.id_kementrian, tb_kementrian.nama_kementrian,tbf.keputusan
				FROM tb_unit tbu, tb_lavel tl, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
                LEFT JOIN tb_kementrian ON tb_kementrian.id_kementrian = tbf.id_kementrian
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.lavel = tl.lavel 
						AND tbf.tanggal LIKE '%".date('Y-m-d')."%'  AND tbf.petugas_penerima = ?
				ORDER BY tbf.no_tiket_frontdesk DESC";
        $query = $this->db->query($sql,array($this->session->userdata('id_user')));
		
		return $query;
    }
	
	public function get_list_tiket_selesai()
    {	
		 $sql = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker,
					   tbf.is_active, tbf.id_unit, tbf.status, tl.nama_lavel,
				       tb_kementrian.id_kementrian, tb_kementrian.nama_kementrian,tbf.keputusan
				FROM tb_unit tbu, tb_lavel tl, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
                LEFT JOIN tb_kementrian ON tb_kementrian.id_kementrian = tbf.id_kementrian
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.lavel = tl.lavel 
				AND tbf.petugas_penerima = ? AND tbf.status = 'close' AND tbf.keputusan = 'disahkan'
				ORDER BY tbf.no_tiket_frontdesk DESC";
        $query = $this->db->query($sql,array($this->session->userdata('id_user')));
		
		return $query;
    }
	
	public function get_list_tiket_kembali()
    {	
		 $sql = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker,
					   tbf.is_active, tbf.id_unit, tbf.status, tl.nama_lavel,
				       tb_kementrian.id_kementrian, tb_kementrian.nama_kementrian,tbf.keputusan
				FROM tb_unit tbu, tb_lavel tl, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
                LEFT JOIN tb_kementrian ON tb_kementrian.id_kementrian = tbf.id_kementrian
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.lavel = tl.lavel 
				AND tbf.petugas_penerima = ? AND tbf.status = 'close' AND tbf.keputusan = 'ditolak' AND tbf.is_active = 3
				ORDER BY tbf.no_tiket_frontdesk DESC";
        $query = $this->db->query($sql,array($this->session->userdata('id_user')));
		
		return $query;
    }

    public function get_list_ambil_dokumen()
    {
		$sql = "SELECT tbf.no_tiket_frontdesk, tbf.id_kementrian, tb_kementrian.nama_kementrian, tbf.tanggal,tbu.nama_unit, tbf.id_satker, 
				ts.nama_satker, tbf.is_active,tbf.status,tbf.id_unit FROM tb_unit tbu, tb_tiket_frontdesk tbf 
				LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker JOIN tb_kementrian ON tbf.id_kementrian = tb_kementrian.id_kementrian 
				WHERE tbu.id_unit = tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.status = 'close' AND tbf.is_active = 1 AND tbf.keputusan = 'disahkan' 
				ORDER BY tbf.status";
        $query = $this->db->query($sql);
		
		return $query;
    }

    public function get_detail_tiket_by_id($no_tiket)
    {
        return $this->db->query("SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker, tbf.is_active,tbf.status,tbf.id_unit,
									   tbs.nama_petugas,tbs.jabatan_petugas,tbs.no_hp,tbs.no_kantor,tbs.email, tbf.id_kementrian, tm.nama_kementrian
								FROM tb_unit tbu, tb_petugas_satker tbs, tb_kementrian tm, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
								WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.id_petugas_satker = tbs.id_petugas_satker
									  AND tbf.id_kementrian = tm.id_kementrian AND tbf.status = 'close' AND tbf.is_active = 6 AND tbf.no_tiket_frontdesk = ?
								ORDER BY tbf.status ", array($no_tiket));
    }

    public function set_selesai($no_tiket)
    {
        $sql = "UPDATE tb_tiket_frontdesk SET is_active = 3 WHERE no_tiket_frontdesk = ?";
        $this->db->query($sql, array($no_tiket));
        $this->log->create("Cetak bukti pengambilan dokumen");
    }

    public function get_list_pengembalian_dokumen()
    {
		$sql = "SELECT  ttf.no_tiket_frontdesk, ttf.id_kementrian, tb_kementrian.nama_kementrian, ttf.tanggal, ttf.id_satker, ts.nama_satker, tpd.id_pengembalian_doc, ttf.id_unit, tu.nama_unit, tpd.sudah_diambil
				FROM tb_pengembalian_doc tpd, tb_tiket_frontdesk ttf
				LEFT JOIN tb_satker ts ON ts.id_satker = ttf.id_satker
				LEFT JOIN tb_unit tu ON tu.id_unit = ttf.id_unit AND tu.id_kementrian = ttf.id_kementrian
                LEFT JOIN tb_kementrian ON tb_kementrian.id_kementrian = ttf.id_kementrian
				WHERE tpd.no_tiket_frontdesk = ttf.no_tiket_frontdesk AND ttf.is_active = 3 AND ttf.status = 'close'
				GROUP BY tpd.no_tiket_frontdesk";
        $query = $this->db->query($sql);
		
		return $query;
    }

    public function get_detail_pengembalian_by_id($id)
    {
        return $this->db->query("SELECT  ttf.no_tiket_frontdesk, ttf.tanggal, ttf.nomor_surat_usulan, ttf.tanggal_surat_usulan, ttf.id_satker, ts.nama_satker, tpd.id_pengembalian_doc,
                                ttf.id_unit, tu.nama_unit,ttf.id_kementrian, tm.nama_kementrian, tbs.nip, tbs.nama_petugas, tbs.jabatan_petugas,
                                tbs.no_hp, tbs.no_kantor, tbs.email, tpd.catatan, tpd.sudah_diambil
								FROM tb_pengembalian_doc tpd, tb_kementrian tm, tb_petugas_satker tbs, tb_tiket_frontdesk ttf 
								LEFT JOIN tb_satker ts ON ts.id_satker = ttf.id_satker
								LEFT JOIN tb_unit tu ON tu.id_unit = ttf.id_unit AND tu.id_kementrian = ttf.id_kementrian
								WHERE tpd.no_tiket_frontdesk = ttf.no_tiket_frontdesk AND tpd.id_pengembalian_doc = ?
                                AND ttf.id_kementrian = tm.id_kementrian AND ttf.id_petugas_satker = tbs.id_petugas_satker
								GROUP BY tpd.no_tiket_frontdesk ", array($id));

    }

    public function set_selesai_pengembalian($no_tiket)
    {
        $sql = "UPDATE tb_pengembalian_doc SET sudah_diambil = 1 WHERE id_pengembalian_doc = ?";
        $this->db->query($sql, array($no_tiket));
        $this->log->create("Mencetak bukti dokumen yang dikembalikan");
    }
}