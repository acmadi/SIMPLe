<?php
class Dirjen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
		//$ang = 1, $ex = '', $lev, $inc = '' 
		$this->load->model('Mdirjen','dirjen');
        // ========== A1 ==========
        $data['a1_cs_diterima'] = $this->dirjen->get_jml_trm(1, 2, 1,1);

        $data['a1_pelaksana_diterima'] = $this->dirjen->get_jml_trm(1, 2, 3,1);
        $data['a1_pelaksana_diteruskan'] = $this->dirjen->get_jml_trs(1,1);

        $data['a1_subdit_anggaran_diterima'] = $this->dirjen->get_jml_trm(1, 2, 4, '1,4,5');
        $data['a1_subdit_anggaran_diteruskan'] = $this->dirjen->get_jml_trs(1,3);

        $data['a1_subdit_dadutek_diterima'] = $this->dirjen->get_jml_trm(1, '1,2,4', 4,5); 
        $data['a1_subdit_dadutek_diteruskan'] = $this->dirjen->get_jml_trs_sub(1,3);

        $data['a1_direktur_diterima'] = $this->dirjen->get_jml_trm(1, 2, 5,1);
        $data['a1_direktur_diteruskan'] = $this->dirjen->get_jml_trs(1,4);

        $data['a1_dirjen_diterima'] = $this->dirjen->get_jml_trm(1, 2, 6,1);


        // ========== A2 ==========
        $data['a2_cs_diterima'] = $this->dirjen->get_jml_trm(2, 2, 1,1);

        $data['a2_pelaksana_diterima'] = $this->dirjen->get_jml_trm(2, 2, 3,1);
        $data['a2_pelaksana_diteruskan'] = $this->dirjen->get_jml_trs(2,1);

        $data['a2_subdit_anggaran_diterima'] = $this->dirjen->get_jml_trm(2, 2, 4, '1,4,5');
        $data['a2_subdit_anggaran_diteruskan'] = $this->dirjen->get_jml_trs(2,3);

        $data['a2_subdit_dadutek_diterima'] = $this->dirjen->get_jml_trm(2, '1,2,4', 4,5); 
        $data['a2_subdit_dadutek_diteruskan'] = $this->dirjen->get_jml_trs_sub(2,3);

        $data['a2_direktur_diterima'] = $this->dirjen->get_jml_trm(2, 2, 5,1);
        $data['a2_direktur_diteruskan'] = $this->dirjen->get_jml_trs(2,4);

        $data['a2_dirjen_diterima'] = $this->dirjen->get_jml_trm(2, 2, 6,1);

        // ========== A3 ==========
        $data['a3_cs_diterima'] = $this->dirjen->get_jml_trm(3, 2, 1,1);

        $data['a3_pelaksana_diterima'] = $this->dirjen->get_jml_trm(3, 2, 3,1);
        $data['a3_pelaksana_diteruskan'] = $this->dirjen->get_jml_trs(3,1);

        $data['a3_subdit_anggaran_diterima'] = $this->dirjen->get_jml_trm(3, 2, 4, '1,4,5');
        $data['a3_subdit_anggaran_diteruskan'] = $this->dirjen->get_jml_trs(3,3);

        $data['a3_subdit_dadutek_diterima'] = $this->dirjen->get_jml_trm(3, '1,2,4', 4,5); 
        $data['a3_subdit_dadutek_diteruskan'] = $this->dirjen->get_jml_trs_sub(3,3);

        $data['a3_direktur_diterima'] = $this->dirjen->get_jml_trm(3, 2, 5,1);
        $data['a3_direktur_diteruskan'] = $this->dirjen->get_jml_trs(3,4);

        $data['a3_dirjen_diterima'] = $this->dirjen->get_jml_trm(3, 2, 6,1);

       

        $data['a1_dirjen_disetujui'] = $this->dirjen->get_jml_setuju(1,6);
        $data['a2_dirjen_disetujui'] = $this->dirjen->get_jml_setuju(2,6);
        $data['a3_dirjen_disetujui'] = $this->dirjen->get_jml_setuju(3,6);

		$data['a1_direktur_disetujui'] = $this->dirjen->get_jml_setuju(1,5);
        $data['a2_direktur_disetujui'] = $this->dirjen->get_jml_setuju(2,5);
        $data['a3_direktur_disetujui'] = $this->dirjen->get_jml_setuju(3,5);

        $data['a1_dirjen_ditolak'] = $this->dirjen->get_jml_tolak(1,6);
        $data['a2_dirjen_ditolak'] = $this->dirjen->get_jml_tolak(2,6);
        $data['a3_dirjen_ditolak'] = $this->dirjen->get_jml_tolak(3,6);
		
		$data['a1_direktur_ditolak'] = $this->dirjen->get_jml_tolak(1,5);
        $data['a2_direktur_ditolak'] = $this->dirjen->get_jml_tolak(2,5);
        $data['a3_direktur_ditolak'] = $this->dirjen->get_jml_tolak(3,5);


        // Argo
        $query = $this->db->query("SELECT * FROM tb_tiket_frontdesk
                                WHERE status = 'open' AND
                                (DATEDIFF(NOW(), tanggal) >= 5)
                                GROUP BY no_tiket_frontdesk ");

        $data['argo'] = $query->num_rows();

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/dashboard';
        $this->load->view('new-template', $data);
    }
	
	//$ang = 1, $ex = '', $lev, $inc = '' /*
    function lists_trm($ang, $ex, $lev, $inc)
    {
		$tmpEx = explode('-',$ex);
		$tmpEx = implode(',',$tmpEx);
		$tmpIn = explode('-',$inc);
		$tmpIn = implode(',',$tmpIn);
		
		$kecuali	= " NOT IN($tmpEx) ";
		$termasuk	= " IN($tmpIn) ";
				
		$res = $this->db->query("SELECT a.no_tiket_frontdesk,a.tanggal, c.nama_unit, d.nama_kementrian
								FROM tb_tiket_frontdesk a, tb_kon_unit_satker b,tb_unit c,tb_kementrian d
								WHERE a.id_unit = c.id_unit AND a.id_kementrian = c.id_kementrian AND a.id_kementrian = d.id_kementrian
								 AND a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ?
								AND ((a.is_active $kecuali AND lavel = ?) OR (lavel > ?) OR (a.is_active $termasuk AND lavel = ?))
								",array($ang,$lev,$lev,$lev));

        $data['lists'] = $res;

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_tiket';
        $this->load->view('new-template', $data);
    }
	
	//$ang = 1, $ex = '', $lev, $inc = '' /*
    function lists_trs($ang, $lev)
    {			
		$res = $this->db->query("SELECT a.no_tiket_frontdesk,a.tanggal, c.nama_unit, d.nama_kementrian
								FROM tb_tiket_frontdesk a, tb_kon_unit_satker b,tb_unit c,tb_kementrian d
								WHERE a.id_unit = c.id_unit AND a.id_kementrian = c.id_kementrian AND a.id_kementrian = d.id_kementrian
								 AND a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ?
								AND lavel > ?
								",array( $ang, $lev));

        $data['lists'] = $res;

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_tiket';
        $this->load->view('new-template', $data);
    }
	
	function lists_trs_sub($ang, $lev)
    {			
		$res = $this->db->query("SELECT a.no_tiket_frontdesk,a.tanggal, c.nama_unit, d.nama_kementrian
								FROM tb_tiket_frontdesk a, tb_kon_unit_satker b,tb_unit c,tb_kementrian d
								WHERE a.id_unit = c.id_unit AND a.id_kementrian = c.id_kementrian AND a.id_kementrian = d.id_kementrian
								 AND a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ?
								AND ((a.is_active >= 4 AND a.lavel > ?) OR (a.lavel > ?))
								",array( $ang, $lev, $lev));

        $data['lists'] = $res;

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_tiket';
        $this->load->view('new-template', $data);
    }
	
	function lists_setuju($ang, $lev)
    {			
		$res = $this->db->query("SELECT a.no_tiket_frontdesk,a.tanggal, c.nama_unit, d.nama_kementrian
								FROM tb_tiket_frontdesk a, tb_kon_unit_satker b,tb_unit c,tb_kementrian d
								WHERE a.id_unit = c.id_unit AND a.id_kementrian = c.id_kementrian AND a.id_kementrian = d.id_kementrian
								 AND a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ?
								AND a.is_active = 6 AND a.status = 'close' AND a.lavel = ?
								",array( $ang, $lev));

        $data['lists'] = $res;

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_tiket';
        $this->load->view('new-template', $data);
    }
	
	function lists_tolak($ang, $lev)
    {			
		$res = $this->db->query("SELECT a.no_tiket_frontdesk,a.tanggal, c.nama_unit, d.nama_kementrian
								FROM tb_tiket_frontdesk a, tb_kon_unit_satker b,tb_unit c,tb_kementrian d
								WHERE a.id_unit = c.id_unit AND a.id_kementrian = c.id_kementrian AND a.id_kementrian = d.id_kementrian
								 AND a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ?
								AND a.is_active = 0 AND a.status = 'close' AND a.lavel = ?
								",array( $ang, $lev));

        $data['lists'] = $res;

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_tiket';
        $this->load->view('new-template', $data);
    }
	

    public function list_argo()
    {

        if ($this->input->get('cari')) {

            $cari = $this->input->get('cari');
            $cari_tiket = sprintf('%05d', $this->input->get('cari'));


            $query = $this->db->query("SELECT * FROM tb_tiket_frontdesk a

                                        JOIN tb_petugas_satker b
                                        ON a.id_petugas_satker = b.id_petugas_satker

                                        JOIN tb_lavel c
                                        ON a.lavel = c.lavel

                                        WHERE status = 'open' AND
                                        (DATEDIFF(NOW(), tanggal) >= 5) AND

                                        no_tiket_frontdesk LIKE '%{$cari}%'

                                        GROUP BY no_tiket_frontdesk ");

        } else {
            $query = $this->db->query("SELECT * FROM tb_tiket_frontdesk a

                                                JOIN tb_petugas_satker b
                                                ON a.id_petugas_satker = b.id_petugas_satker

                                                JOIN tb_lavel c
                                                ON a.lavel = c.lavel

                                                WHERE status = 'open' AND
                                                (DATEDIFF(NOW(), tanggal) >= 5)

                                                GROUP BY no_tiket_frontdesk
                                                ORDER BY tanggal
                                                ");
        }
        $data['lists'] = $query;

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_argo';
        $this->load->view('new-template', $data);
    }

    public function view($level, $id)
    {

    }

    // Tentukan A1, A2, A3
    function _kelompok($anggaran, $level_id, $is_active)
    {
        return $this->db->query("SELECT a.no_tiket_frontdesk
								FROM tb_tiket_frontdesk a, tb_kon_unit_satker b
								WHERE a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ?
								AND ((a.is_active NOT IN(?) AND lavel = 4) OR (lavel > 4) OR 
								(a.is_active IN(1) AND lavel = 4))",array($anggaran, $is_active,$level_id,$level_id));
		
		/*return $this->db->from('tb_tiket_frontdesk')
                ->join('tb_satker', 'tb_satker.id_satker = tb_tiket_frontdesk.id_satker')
                ->join('tb_kon_unit_satker', 'tb_kon_unit_satker.id_kementrian = tb_satker.id_kementrian')
                ->join('tb_unit_saker', 'tb_unit_saker.id_unit_satker = tb_kon_unit_satker.id_unit_satker')
                ->group_by('no_tiket_frontdesk')
                ->where('lavel >=', $level_id)
                ->where('anggaran', $anggaran)
                ->where('is_active', $is_active)
                ->get();
		*/

    }

    function frontdesk()
    {
		$this->load->model('mfrontdesk');
		$this->load->helper('tanggal_helper');
        $page		= $this->mfrontdesk->get_all_tiket_frontdesk(6,'');
		$pageData	= $page['query'];
		$pageLink	= $page['pagination1'];
		
		$data				= array('result'=>$pageData,'pageLink'=>$pageLink,);
        $data['title'] 		= 'Konsultasi Front Desk';
        $data['content'] 	= 'dirjen/frontdesk';
		$data['isian_form']	= $page['isian_form1'];
        $this->load->view('new-template', $data);
    }
	
	function diterima($id)
    {
		$this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 1 WHERE no_tiket_frontdesk = ?",array($id));		
		redirect('dirjen/frontdesk');
    }
	
	function accept($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();
		
        $this->db->update('tb_tiket_frontdesk', array(
            'status' => 'close','is_active' => 6
        ), array(
            'no_tiket_frontdesk' => $id
        ));
		
        $this->_success(site_url('/dirjen/frontdesk'), 'Tiket berhasil ditetapkan', 3);
    }
	
	function reject($id)
    {
		$this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 0,status = 'close' WHERE no_tiket_frontdesk = ?",array($id));		
		redirect('dirjen/frontdesk');
    }

    function helpdesk()
    {
        $sql = "SELECT * FROM tb_tiket_frontdesk JOIN tb_satker
                        ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker

                        WHERE status = 'open' AND lavel = 6";
        $data['antrian'] = $this->db->query($sql);

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/helpdesk';
        $this->load->view('new-template', $data);
    }
	
	private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}