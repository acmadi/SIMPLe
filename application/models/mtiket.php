<?php
class Mtiket extends CI_Model {
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
		
		$sql = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker, tbf.is_active, tbf.id_unit, tbf.status
				FROM tb_unit tbu, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian $where ORDER BY tbf.status";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/frontdesk/status_tiket/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		
		$sqlb = "SELECT tbf.no_tiket_frontdesk,tbf.tanggal,tbu.nama_unit, tbf.id_satker, ts.nama_satker, tbf.is_active, tbf.id_unit, tbf.status
				FROM tb_unit tbu, tb_tiket_frontdesk tbf LEFT JOIN tb_satker ts ON ts.id_satker = tbf.id_satker
				WHERE tbu.id_unit =  tbf.id_unit AND tbu.id_kementrian = tbf.id_kementrian $where ORDER BY tbf.status
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
	
}