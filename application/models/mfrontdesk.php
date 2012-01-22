<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfrontdesk extends CI_Model
{
	//
	public function count_all_tiket_frontdesk($status = '',$level = '', $act = '',$kep = ''){
		$optional_sql = '';
		if($this->session->userdata('lavel') != '7'):
			$optional_sql = " AND c.anggaran = '{$this->session->userdata('anggaran')}' 
							  AND c.id_unit_satker = '{$this->session->userdata('id_unit_satker')}' ";
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
	
	//dapatkan jumlah tiket yang sudah lewat batas waktu
	public function get_tiket_lewat_waktu(){
		$optional_sql = '';
		if($this->session->userdata('lavel') != '7'):
			$optional_sql = " AND c.anggaran = '{$this->session->userdata('anggaran')}' 
							  AND c.id_unit_satker = '{$this->session->userdata('id_unit_satker')}' ";
		endif;
		
        $sql = "SELECT * FROM `tb_tiket_frontdesk` a
                JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                WHERE
                 status = 'open' AND
                a.lavel = '{$this->session->userdata('lavel')}' AND
				(( (DATEDIFF(NOW(),a.tanggal) - ( (DATEDIFF(NOW(),a.tanggal)/7) * 2 )) - 
                      (SELECT COUNT(id) FROM tb_calendar f WHERE holiday BETWEEN a.tanggal AND NOW())  )) > 5 
				$optional_sql
                GROUP BY no_tiket_frontdesk
                ORDER BY tanggal";
				
        $result = $this->db->query($sql);
		
		return $result->num_rows();
	}
	
	public function get_all_tiket_frontdesk($level = 3,$optional = '', $isCount = FALSE){
		//@F2D
		$utkAnggr = $this->db->query("SELECT id_unit_satker
					FROM tb_user 
					WHERE id_user = ?",array($this->session->userdata('id_user')))->row()->id_unit_satker;
					
		//print_r($this->db->last_query());exit;
		//print_r($this->session->all_userdata());exit;
		//if(!$anggaran) redirect(base_url());
		$where_ang = ' AND FALSE ';
		//if(!$anggaran) $anggaran = ''
		if($utkAnggr != NULL) $where_ang = " AND (SELECT c.id_unit_satker FROM tb_kon_unit_satker c WHERE c.id_unit = tf.id_unit AND c.id_kementrian = tf.id_kementrian LIMIT 1) = $utkAnggr";
		//print_r($utkAnggr);exit;
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
		$where2 = '';
		if(!empty($keyword)){
			$where = " AND tu.nama_unit LIKE '%".$keyword."%'";
		}
		
		if(!empty($optional)){
			$where2 = $optional;
		}
		$sql = "SELECT tf.no_tiket_frontdesk, tf.tanggal,tf.id_unit, tu.nama_unit, tm.nama_kementrian,tf.is_active
				FROM tb_tiket_frontdesk tf 
				LEFT JOIN tb_unit tu 
					ON(tu.id_unit = tf.id_unit)  
				LEFT JOIN tb_kementrian tm 
					ON (tu.id_kementrian = tf.id_kementrian) 
				WHERE tf.status = 'open' 
				AND tf.lavel = ? AND tm.id_kementrian = tf.id_kementrian $where $where2 $where_ang
				ORDER BY tf.status"; //print_r($this->db->last_query());//exit;
				
		$query = $this->db->query($sql,array($level));

		$config['base_url'] = site_url('/pelaksana/frontdesk/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		
		$sqlb = "SELECT tf.no_tiket_frontdesk, tf.tanggal,tf.id_unit, tu.nama_unit, tm.nama_kementrian,tf.is_active
				FROM tb_tiket_frontdesk tf 
				LEFT JOIN tb_unit tu 
					ON(tu.id_unit = tf.id_unit)  
				LEFT JOIN tb_kementrian tm 
					ON (tm.id_kementrian = tf.id_kementrian) 
				WHERE tf.status = 'open' 
				AND tf.lavel = ? $where $where2 $where_ang
				LIMIT ?,?"; //print_r($this->db->last_query());
		$data["query"] = $this->db->query($sqlb, array($level,$offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();

		if ($isCount) :
			return $data["query"]->num_rows();
		endif;

		return $data;
	}
	
    public function get_all_tiket()
    {
		//@F2D
		
		$key = $this->input->post('fcari');
		$value = $this->input->post('fkeyword');

		$keyword = ((!empty($key) && (!empty($value))))?$key.'_'.$value:'';

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
		$num_key = (!empty($keyword))?explode('_',$keyword):array();
		if(count($num_key)>1){
			switch($num_key[0]){
				case 'noantrian':
					$kolom = 'a.no_tiket_frontdesk';
					break;
				case 'status':
					$kolom = 'a.status';
					break;
				default:
					$kolom = 'b.nama_satker';
					break;
					
			}
			
			$where = " AND $kolom LIKE '%".$num_key[1]."%'";
		}else{
			$where = " ";
		}

		$sql = "SELECT a.tanggal, a.no_tiket_frontdesk, a.tanggal_selesai, a.status, a.is_active, a.no_antrian, e.nama_kementrian, d.nama_unit, b.nama_satker
				FROM tb_tiket_frontdesk a LEFT JOIN tb_satker b ON a.id_satker = b.id_satker, tb_petugas_satker c, tb_unit d,tb_kementrian e
				WHERE a.id_unit = d.id_unit AND a.id_kementrian = e.id_kementrian 
				AND a.id_kementrian = d.id_kementrian AND c.id_petugas_satker = a.id_petugas_satker $where ORDER BY a.tanggal";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/admin/frontdesk/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);


		$sqlb = "SELECT a.tanggal, a.no_tiket_frontdesk, a.tanggal_selesai, a.status, a.is_active, a.no_antrian, e.nama_kementrian, d.nama_unit, b.nama_satker
				FROM tb_tiket_frontdesk a LEFT JOIN tb_satker b ON a.id_satker = b.id_satker, tb_petugas_satker c, tb_unit d,tb_kementrian e
				WHERE a.id_unit = d.id_unit AND a.id_kementrian = e.id_kementrian 
				AND a.id_kementrian = d.id_kementrian AND c.id_petugas_satker = a.id_petugas_satker $where ORDER BY a.tanggal
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();
		$data['nomor_item'] = $offset;

		return $data;
    }

    public function count_all_tiket($status = 'open', $lavel, $optional = '')
    {
        $result = $this->db->query("SELECT no_tiket_frontdesk FROM tb_tiket_frontdesk WHERE status = '{$status}'
         AND lavel = $lavel $optional");
        return $result->num_rows();
    }

    public function get_by_id($id)
    {
        $sql = "SELECT *
                FROM tb_tiket_frontdesk
                JOIN tb_petugas_satker
                ON tb_tiket_frontdesk.id_petugas_satker = tb_petugas_satker.id_petugas_satker
                JOIN tb_satker
                ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker
                WHERE no_tiket_frontdesk = ?";

        $result = $this->db->query($sql, array($id));
        $result = $result->result();
        return $result[0];
    }
	
	function get_tiket_frontdesk_by_id($id){
		return $this->db->query("SELECT tf.no_tiket_frontdesk, tf.id_unit,tf.id_kementrian, tm.nama_kementrian, tu.nama_unit,tf.id_satker,ts.nama_satker
								FROM  tb_unit tu, tb_kementrian tm,tb_petugas_satker tr,tb_tiket_frontdesk tf LEFT JOIN tb_satker ts ON tf.id_satker = ts.id_satker
								WHERE tf.id_unit = tu.id_unit AND tf.id_kementrian = tu.id_kementrian AND tf.id_kementrian = tm.id_kementrian 
								AND tr.id_petugas_satker = tf.id_petugas_satker AND tf.no_tiket_frontdesk = ?",array($id))->row();
	}
}