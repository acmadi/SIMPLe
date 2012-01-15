<?php
class Dirjen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {

        // ========== A1 ==========
        $data['a1_cs_diterima'] = $this->_kelompok(1, 1, 1)->num_rows();

        $data['a1_pelaksana_diterima'] = $this->_kelompok(1, 2, 1)->num_rows();

        $data['a1_pelaksana_diteruskan'] = $this->_kelompok(1, 2, 2)->num_rows();

        $data['a1_subdit_anggaran_diterima'] = $this->_kelompok(1, 3, 1)->num_rows();

        $data['a1_subdit_anggaran_diteruskan'] = $this->_kelompok(1, 3, 2)->num_rows();

        $data['a1_subdit_dadutek_diterima'] = $this->_kelompok(1, 4, 1)->num_rows();

        $data['a1_subdit_dadutek_diteruskan'] = $this->_kelompok(1, 4, 2)->num_rows();

        $data['a1_direktur_diterima'] = $this->_kelompok(1, 5, 1)->num_rows();

        $data['a1_direktur_diteruskan'] = $this->_kelompok(1, 5, 2)->num_rows();

        $data['a1_dirjen_diterima'] = $this->_kelompok(1, 6, 1)->num_rows();


        // ========== A2 ==========
        $data['a2_cs_diterima'] = $this->_kelompok(2, 1, 1)->num_rows();

        $data['a2_pelaksana_diterima'] = $this->_kelompok(2, 2, 1)->num_rows();

        $data['a2_pelaksana_diteruskan'] = $this->_kelompok(2, 2, 2)->num_rows();

        $data['a2_subdit_anggaran_diterima'] = $this->_kelompok(2, 3, 1)->num_rows();

        $data['a2_subdit_anggaran_diteruskan'] = $this->_kelompok(2, 3, 2)->num_rows();

        $data['a2_subdit_dadutek_diterima'] = $this->_kelompok(2, 4, 1)->num_rows();

        $data['a2_subdit_dadutek_diteruskan'] = $this->_kelompok(2, 4, 2)->num_rows();

        $data['a2_direktur_diterima'] = $this->_kelompok(2, 5, 1)->num_rows();

        $data['a2_direktur_diteruskan'] = $this->_kelompok(2, 5, 2)->num_rows();

        $data['a2_dirjen_diterima'] = $this->_kelompok(2, 6, 1)->num_rows();

        // ========== A3 ==========
        $data['a3_cs_diterima'] = $this->_kelompok(3, 1, 1)->num_rows();

        $data['a3_pelaksana_diterima'] = $this->_kelompok(3, 2, 1)->num_rows();

        $data['a3_pelaksana_diteruskan'] = $this->_kelompok(3, 2, 2)->num_rows();

        $data['a3_subdit_anggaran_diterima'] = $this->_kelompok(3, 3, 1)->num_rows();

        $data['a3_subdit_anggaran_diteruskan'] = $this->_kelompok(3, 3, 2)->num_rows();

        $data['a3_subdit_dadutek_diterima'] = $this->_kelompok(3, 4, 1)->num_rows();

        $data['a3_subdit_dadutek_diteruskan'] = $this->_kelompok(3, 4, 2)->num_rows();

        $data['a3_direktur_diterima'] = $this->_kelompok(3, 5, 1)->num_rows();

        $data['a3_direktur_diteruskan'] = $this->_kelompok(3, 5, 2)->num_rows();

        $data['a3_dirjen_diterima'] = $this->_kelompok(3, 6, 1)->num_rows();

        // Dirjen
        $query = $this->db->from('tb_tiket_frontdesk')
                ->join('tb_satker', 'tb_satker.id_satker = tb_tiket_frontdesk.id_satker')
                ->join('tb_kon_unit_satker', 'tb_kon_unit_satker.id_kementrian = tb_satker.id_kementrian')
                ->join('tb_unit_saker', 'tb_unit_saker.id_unit_satker = tb_kon_unit_satker.id_unit_satker')
                ->group_by('no_tiket_frontdesk')
                ->where('lavel >=', 6)
                ->get();

        $data['a3_dirjen_diterima'] = $data['a3_dirjen_diteruskan'] = $query->num_rows();

        $query = $this->db->from('tb_tiket_frontdesk')
                ->join('tb_satker', 'tb_satker.id_satker = tb_tiket_frontdesk.id_satker')
                ->join('tb_kon_unit_satker', 'tb_kon_unit_satker.id_kementrian = tb_satker.id_kementrian')
                ->join('tb_unit_saker', 'tb_unit_saker.id_unit_satker = tb_kon_unit_satker.id_unit_satker')
                ->group_by('no_tiket_frontdesk')
                ->where('lavel >=', 6)
                ->where('keputusan', 'disahkan')
                ->get();

        $data['a3_dirjen_disetujui'] = $query->num_rows();

        $query = $this->db->from('tb_tiket_frontdesk')
                ->join('tb_satker', 'tb_satker.id_satker = tb_tiket_frontdesk.id_satker')
                ->join('tb_kon_unit_satker', 'tb_kon_unit_satker.id_kementrian = tb_satker.id_kementrian')
                ->join('tb_unit_saker', 'tb_unit_saker.id_unit_satker = tb_kon_unit_satker.id_unit_satker')
                ->group_by('no_tiket_frontdesk')
                ->where('lavel >=', 6)
                ->where('keputusan', 'ditolak')
                ->get();

        $data['a3_dirjen_ditolak'] = $query->num_rows();


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

    public function lists($anggaran, $level_id, $is_active)
    {
        $query = $this->db->from('tb_tiket_frontdesk')
                ->join('tb_petugas_satker', 'tb_petugas_satker.id_petugas_satker = tb_tiket_frontdesk.id_petugas_satker')
                ->join('tb_satker', 'tb_satker.id_satker = tb_tiket_frontdesk.id_satker')
                ->join('tb_kon_unit_satker', 'tb_kon_unit_satker.id_kementrian = tb_satker.id_kementrian')
                ->join('tb_unit_saker', 'tb_unit_saker.id_unit_satker = tb_kon_unit_satker.id_unit_satker')
                ->group_by('no_tiket_frontdesk')
                ->where('lavel >=', $level_id)
                ->where('anggaran', $anggaran)
                ->where('is_active', $is_active)
                ->get();

        $data['lists'] = $query;

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
        return $this->db->from('tb_tiket_frontdesk')
                ->join('tb_satker', 'tb_satker.id_satker = tb_tiket_frontdesk.id_satker')
                ->join('tb_kon_unit_satker', 'tb_kon_unit_satker.id_kementrian = tb_satker.id_kementrian')
                ->join('tb_unit_saker', 'tb_unit_saker.id_unit_satker = tb_kon_unit_satker.id_unit_satker')
                ->group_by('no_tiket_frontdesk')
                ->where('lavel >=', $level_id)
                ->where('anggaran', $anggaran)
                ->where('is_active', $is_active)
                ->get();

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
		$this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 3,status = 'close' WHERE no_tiket_frontdesk = ?",array($id));		
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