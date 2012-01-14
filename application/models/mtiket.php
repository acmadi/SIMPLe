<?php
class Mtiket extends CI_Model {
	//F2D
	public function get_list_tiket(){
		//@F2D
		$keyword = $this->input->post('keyword',TRUE);

		$this->load->library('pagination');

		$total_seg = $this->uri->total_segments();
		$default = array("keyword");
		$this->terms = $this->uri->uri_to_assoc(4,$default);

		if(($this->terms['keyword'] != '') OR ($keyword != '')){
			$uri_segment = 6;
			$offset = (int) $this->uri->segment($uri_segment,0);

			if($this->terms['keyword'] != ''){
				$keyword = $this->terms['keyword'];
			}else{
				$this->terms['keyword'] = $keyword;
			}

			$uriparams['keyword'] = $this->terms['keyword'];

			if(($total_seg % 2) > 0){
				$offset = (int) $this->uri->segment(6, 0);
			}

			$url_add = $this->uri->assoc_to_uri($uriparams).'/';
		}else{
			$uri_segment = 4;
			$offset = (int) $this->uri->segment($uri_segment,0);
			$url_add = '';

		}

		//if from suggest
		$where = '';
		if(!empty($keyword)){
			$where = " AND tbu.nama_unit LIKE '%".$keyword."%'";
		}

		$sql = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker, 
					   tbf.is_active, tbf.id_unit, tbf.status, tl.nama_lavel
				FROM tb_unit tbu, tb_lavel tl, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.lavel = tl.lavel $where ORDER BY tbf.status";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/frontdesk/status_tiket/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);


		$sqlb = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker, 
					   tbf.is_active, tbf.id_unit, tbf.status, tl.nama_lavel
				FROM tb_unit tbu, tb_lavel tl, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.lavel = tl.lavel $where ORDER BY tbf.status
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}

	public function get_list_ambil_dokumen(){
		//@F2D
		$keyword = $this->input->post('keyword',TRUE);

		$this->load->library('pagination');

		$total_seg = $this->uri->total_segments();
		$default = array("keyword");
		$this->terms = $this->uri->uri_to_assoc(4,$default);

		if(($this->terms['keyword'] != '') OR ($keyword != '')){
			$uri_segment = 6;
			$offset = (int) $this->uri->segment($uri_segment,0);

			if($this->terms['keyword'] != ''){
				$keyword = $this->terms['keyword'];
			}else{
				$this->terms['keyword'] = $keyword;
			}

			$uriparams['keyword'] = $this->terms['keyword'];

			if(($total_seg % 2) > 0){
				$offset = (int) $this->uri->segment(6, 0);
			}

			$url_add = $this->uri->assoc_to_uri($uriparams).'/';
		}else{
			$uri_segment = 4;
			$offset = (int) $this->uri->segment($uri_segment,0);
			$url_add = '';

		}

		//if from suggest
		$where = '';
		if(!empty($keyword)){
			$where = " AND tbu.nama_unit LIKE '%".$keyword."%'";
		}

		$sql = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker, tbf.is_active,tbf.status,tbf.id_unit
				FROM tb_unit tbu, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.status = 'close' AND tbf.is_active = 1 $where 
				ORDER BY tbf.status";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/frontdesk/ambil_dokumen/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);


		$sqlb = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker, tbf.is_active,tbf.status,tbf.id_unit
				FROM tb_unit tbu, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.status = 'close' AND tbf.is_active = 1 $where 
				ORDER BY tbf.status
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}

	public function get_detail_tiket_by_id($no_tiket){
		return $this->db->query("SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker, tbf.is_active,tbf.status,tbf.id_unit,
									   tbs.nama_petugas,tbs.jabatan_petugas,tbs.no_hp,tbs.no_kantor,tbs.email, tbf.id_kementrian, tm.nama_kementrian
								FROM tb_unit tbu, tb_petugas_satker tbs, tb_kementrian tm, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
								WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian AND tbf.id_petugas_satker = tbs.id_petugas_satker
									  AND tbf.id_kementrian = tm.id_kementrian AND tbf.status = 'close' AND tbf.is_active = 1 AND tbf.no_tiket_frontdesk = ?
								ORDER BY tbf.status ",array($no_tiket));
	}

	public function set_selesai($no_tiket){
		$sql = "UPDATE tb_tiket_frontdesk SET is_active = 3 WHERE no_tiket_frontdesk = ?";
        $this->db->query($sql,array($no_tiket));
        $this->log->create("Cetak bukti pengambilan dokumen");
	}

	public function get_list_pengembalian_dokumen(){
		//@F2D
		$keyword = $this->input->post('keyword',TRUE);

		$this->load->library('pagination');

		$total_seg = $this->uri->total_segments();
		$default = array("keyword");
		$this->terms = $this->uri->uri_to_assoc(4,$default);

		if(($this->terms['keyword'] != '') OR ($keyword != '')){
			$uri_segment = 6;
			$offset = (int) $this->uri->segment($uri_segment,0);

			if($this->terms['keyword'] != ''){
				$keyword = $this->terms['keyword'];
			}else{
				$this->terms['keyword'] = $keyword;
			}

			$uriparams['keyword'] = $this->terms['keyword'];

			if(($total_seg % 2) > 0){
				$offset = (int) $this->uri->segment(6, 0);
			}

			$url_add = $this->uri->assoc_to_uri($uriparams).'/';
		}else{
			$uri_segment = 4;
			$offset = (int) $this->uri->segment($uri_segment,0);
			$url_add = '';

		}

		//if from suggest
		$where = '';
		if(!empty($keyword)){
			$where = " AND tu.nama_unit LIKE '%".$keyword."%'";
		}

		$sql = "SELECT  ttf.no_tiket_frontdesk, ttf.tanggal, ttf.id_satker, ts.nama_satker, tpd.id_pengembalian_doc, ttf.id_unit, tu.nama_unit
				FROM tb_pengembalian_doc tpd, tb_tiket_frontdesk ttf 
				LEFT JOIN tb_satker ts ON ts.id_satker = ttf.id_satker
				LEFT JOIN tb_unit tu ON tu.id_unit = ttf.id_unit AND tu.id_kementrian = ttf.id_kementrian
				WHERE tpd.no_tiket_frontdesk = ttf.no_tiket_frontdesk AND tpd.sudah_diambil = 0 $where
				GROUP BY tpd.no_tiket_frontdesk";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/frontdesk/pengembalian_dokumen/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);


		$sqlb = "SELECT  ttf.no_tiket_frontdesk, ttf.tanggal, ttf.id_satker, ts.nama_satker, tpd.id_pengembalian_doc, ttf.id_unit, tu.nama_unit
				FROM tb_pengembalian_doc tpd, tb_tiket_frontdesk ttf 
				LEFT JOIN tb_satker ts ON ts.id_satker = ttf.id_satker
				LEFT JOIN tb_unit tu ON tu.id_unit = ttf.id_unit AND tu.id_kementrian = ttf.id_kementrian
				WHERE tpd.no_tiket_frontdesk = ttf.no_tiket_frontdesk AND tpd.sudah_diambil = 0 $where
				GROUP BY tpd.no_tiket_frontdesk
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}

	public function get_detail_pengembalian_by_id($id){
		return $this->db->query("SELECT  ttf.no_tiket_frontdesk, ttf.tanggal, ttf.id_satker, ts.nama_satker, tpd.id_pengembalian_doc, 
											ttf.id_unit, tu.nama_unit,ttf.id_kementrian, tm.nama_kementrian, tbs.nip, tbs.nama_petugas, tbs.jabatan_petugas, 
											tbs.no_hp, tbs.no_kantor, tbs.email, tpd.catatan
								FROM tb_pengembalian_doc tpd, tb_kementrian tm, tb_petugas_satker tbs, tb_tiket_frontdesk ttf 
								LEFT JOIN tb_satker ts ON ts.id_satker = ttf.id_satker
								LEFT JOIN tb_unit tu ON tu.id_unit = ttf.id_unit AND tu.id_kementrian = ttf.id_kementrian
								WHERE tpd.no_tiket_frontdesk = ttf.no_tiket_frontdesk AND tpd.sudah_diambil = 0 AND tpd.id_pengembalian_doc = ?
									  AND ttf.id_kementrian = tm.id_kementrian AND ttf.id_petugas_satker = tbs.id_petugas_satker
								GROUP BY tpd.no_tiket_frontdesk ",array($id));

	}

	public function set_selesai_pengembalian($no_tiket){
		$sql = "UPDATE tb_pengembalian_doc SET sudah_diambil = 1 WHERE id_pengembalian_doc = ?";
        $this->db->query($sql,array($no_tiket));
        $this->log->create("Mencetak bukti dokumen yang dikembalikan");
	}
}