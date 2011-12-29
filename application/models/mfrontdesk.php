<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfrontdesk extends CI_Model
{

    public function get_all_tiket($key = '', $value = '')
    {
		$this->load->library('pagination');		
		$sql = "SELECT a.tanggal, a.no_tiket_frontdesk, b.nama_satker, a.tanggal_selesai, a.status, a.no_antrian
				FROM tb_satker b, tb_tiket_frontdesk a LEFT JOIN tb_petugas_satker c ON a.id_petugas_satker = c.id_petugas_satker
				WHERE a.id_satker = b.id_satker";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/frontdesk/index');
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$offset = (int) $this->uri->segment(4, 0);
		
		$sqlb = "SELECT a.tanggal, a.no_tiket_frontdesk, b.nama_satker, a.tanggal_selesai, a.status,a.no_antrian
				FROM tb_satker b, tb_tiket_frontdesk a LEFT JOIN tb_petugas_satker c ON a.id_petugas_satker = c.id_petugas_satker
				WHERE a.id_satker = b.id_satker LIMIT ?,?";
		
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();
		$data['nomor_item'] = $offset;

		return $data;
	
    }

    public function count_all_tiket($status = 'open')
    {
        $result = $this->db->query("SELECT no_tiket_frontdesk FROM tb_tiket_frontdesk WHERE status = '{$status}'");
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
	
	function get_all_tiket_by_keyword($keyword){
		$this->load->library('pagination');
		$uri_segment = 6;
		$offset = (int) $this->uri->segment($uri_segment,0);	
		
		
		$total_seg = $this->uri->total_segments();
		$default = array("keyword");
		
		if($total_seg > 4){
			$this->terms = $this->uri->uri_to_assoc(4,$default);
			
			if($this->terms['keyword'] != ''){
				$keyword = $this->terms['keyword'];
			}else{
				$this->terms['keyword'] = $keyword;
			}
			
			$uriparams['keyword'] = $this->terms['keyword'];
			
			if(($total_seg % 2) > 0){
				$offset = (int) $this->uri->segment(6, 0);
			}
			
			$url_add = $this->uri->assoc_to_uri($uriparams);
		}else{
			$searchparams = array();
			$searchparams['keyword'] 	= $keyword; 
			$url_add = $this->uri->assoc_to_uri($searchparams);
		
		}
		
		//if from suggest
		$num_key = (!empty($keyword))?explode('_',$keyword):array();
		if(count($num_key)>1){
			switch($num_key[0]){
				case 'noantrian':
					$kolom = 'a.no_antrian';
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
		
		
		
		$sql = "SELECT a.tanggal, a.no_tiket_frontdesk, b.nama_satker, a.tanggal_selesai, a.status,a.no_antrian
				FROM tb_satker b, tb_tiket_frontdesk a LEFT JOIN tb_petugas_satker c ON a.id_petugas_satker = c.id_petugas_satker
				WHERE a.id_satker = b.id_satker $where "; 
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/frontdesk/search').'/'.$url_add.'/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		
		
		$sqlb = "SELECT a.tanggal, a.no_tiket_frontdesk, b.nama_satker, a.tanggal_selesai, a.status,a.no_antrian
				FROM tb_satker b, tb_tiket_frontdesk a LEFT JOIN tb_petugas_satker c ON a.id_petugas_satker = c.id_petugas_satker
				WHERE a.id_satker = b.id_satker $where
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();
		$data['nomor_item'] = $offset;
		$data['cari'] = $num_key[0];
		$data['keyword'] = $num_key[1];

		return $data;
	}
}