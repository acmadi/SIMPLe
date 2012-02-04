<?php
class Mreportcs extends CI_Model
{
    function get_all_petugas(){
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
		if((isset($keyword)) and ($keyword != '')){
			$where = " AND b.nama LIKE '%".$keyword."%' ";
		}

		$sql = "SELECT b.nama, c.nama_lavel, 
				(SELECT COUNT(*) FROM tb_online_users d WHERE d.id_user = a.id_user AND MINUTE(TIMEDIFF(NOW(),d.aktifitas_terakhir)) <= 30 ) AS jml
				FROM tb_masa_kerja a 
				JOIN tb_user b ON a.id_user = b.id_user 
				JOIN tb_lavel c ON a.id_lavel = c.id_lavel 
				WHERE CURDATE() >= a.tanggal_mulai  AND CURDATE() <= a.tanggal_selesai $where ORDER BY b.nama";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/admin/man_kelengkapan_doc/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 30;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);

		$sqlb = "SELECT b.nama, c.nama_lavel, 
				(SELECT COUNT(*) FROM tb_online_users d WHERE d.id_user = a.id_user AND MINUTE(TIMEDIFF(NOW(),d.aktifitas_terakhir)) <= 30 ) AS jml
				FROM tb_masa_kerja a 
				JOIN tb_user b ON a.id_user = b.id_user 
				JOIN tb_lavel c ON a.id_lavel = c.id_lavel 
				WHERE CURDATE() >= a.tanggal_mulai  AND CURDATE() <= a.tanggal_selesai $where ORDER BY b.nama
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
		
}