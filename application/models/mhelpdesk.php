<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mhelpdesk extends CI_Model
{

	/*
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
	*/

    public function count_all_tiket($status = 'open', $lavel)
    {
        $result = $this->db->query("SELECT no_tiket_helpdesk FROM tb_tiket_helpdesk WHERE status = '{$status}' AND lavel = '$lavel'");
        return $result->num_rows();
    }

    public function get_by_id($id)
    {
        $sql = "SELECT *
                FROM tb_tiket_helpdesk
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                WHERE no_tiket_helpdesk = ?";

        $result = $this->db->query($sql, array($id));


        return $result->row();
    }
	
	function get_all_tiket(){
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
				case 'tiket':
					$kolom = 'a.no_tiket_helpdesk';
					break;
				case 'petugas':
					$kolom = 'c.nama_petugas';
					break;
				default:
					$kolom = 'b.nama_satker';
					break;
					
			}
			
			$where = " AND $kolom LIKE '%".$num_key[1]."%'";
		}else{
			$where = " ";
		}

		$sql = "SELECT a.tanggal, a.no_tiket_helpdesk, b.nama_satker, a.pertanyaan, a.status
				FROM tb_tiket_helpdesk a LEFT JOIN tb_satker b ON a.id_satker = b.id_satker, tb_petugas_satker c
				WHERE a.id_petugas_satket = c.id_petugas_satker $where ORDER BY a.tanggal";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('/admin/helpdesk/index').'/'.$url_add;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);


		$sqlb = "SELECT a.tanggal, a.no_tiket_helpdesk, b.nama_satker, a.pertanyaan, a.status
				FROM tb_tiket_helpdesk a LEFT JOIN tb_satker b ON a.id_satker = b.id_satker, tb_petugas_satker c
				WHERE a.id_petugas_satket = c.id_petugas_satker $where ORDER BY a.tanggal
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['isian_form1'] = $keyword;
		$data['pagination1'] = $this->pagination->create_links();
		$data['nomor_item'] = $offset;

		return $data;
		/*
		$this->load->library('pagination');		
		$sql = "SELECT a.tanggal, a.no_tiket_helpdesk, b.nama_satker, a.pertanyaan, a.status
				FROM tb_satker b, tb_tiket_helpdesk a LEFT JOIN tb_petugas_satker c ON a.id_petugas_satket = c.id_petugas_satker
				WHERE a.id_satker = b.id_satker";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/helpdesk/index');
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$offset = (int) $this->uri->segment(4, 0);
		
		$sqlb = "SELECT a.tanggal, a.no_tiket_helpdesk, b.nama_satker, a.pertanyaan, a.status
				FROM tb_satker b, tb_tiket_helpdesk a LEFT JOIN tb_petugas_satker c ON a.id_petugas_satket = c.id_petugas_satker
				WHERE a.id_satker = b.id_satker LIMIT ?,?";
		
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();
		$data['nomor_item'] = $offset;

		return $data;
		*/
		
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
				case 'tiket':
					$kolom = 'a.no_tiket_helpdesk';
					break;
				case 'petugas':
					$kolom = 'c.nama_petugas';
					break;
				default:
					$kolom = 'b.nama_satker';
					break;
					
			}
			
			$where = " AND $kolom LIKE '%".$num_key[1]."%'";
		}else{
			$where = " ";
		}
		
		
		
		$sql = "SELECT a.tanggal, a.no_tiket_helpdesk, b.nama_satker, a.pertanyaan, a.status
				FROM tb_satker b, tb_tiket_helpdesk a LEFT JOIN tb_petugas_satker c ON a.id_petugas_satket = c.id_petugas_satker
				WHERE a.id_satker = b.id_satker $where "; 
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/helpdesk/search').'/'.$url_add.'/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		
		
		
		$sqlb = "SELECT a.tanggal, a.no_tiket_helpdesk, b.nama_satker, a.pertanyaan, a.status
				FROM tb_satker b, tb_tiket_helpdesk a LEFT JOIN tb_petugas_satker c ON a.id_petugas_satket = c.id_petugas_satker
				WHERE a.id_satker = b.id_satker $where
				LIMIT ?,?";
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();
		$data['nomor_item'] = $offset;
		$data['cari'] = $num_key[0];
		$data['keyword'] = $num_key[1];

		return $data;
	}


    // TODO: Ganti supaya bisa detect CS berdasarkan tb_level
    public function count_all_closed_ticket_by($level = 'cs')
    {
        // TODO: Ubah ke SQL biasa
        $result = $this->db->from("tb_histori_tiket")
                ->join('tb_user', 'tb_histori_tiket.id_user = tb_user.id_user')
                ->where('username', 'csa')
                ->or_where('username', 'csb')
                ->get();
        return $result->num_rows();

    }

}