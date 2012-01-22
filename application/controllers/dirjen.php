<?php
class Dirjen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
        $this->load->model('mfrontdesk');
		$this->load->model('Mdirjen', 'dirjen');
    }

    public function dashboard()
    {
        //$ang = 1, $ex = '', $lev, $inc = ''
		//$status = '',$level = '', $act = '',$kep = '',$anggaran = ''
        //$this->load->model('Mdirjen', 'dirjen');
        // ========== A1 ==========
        $data['a1_cs_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',1,1,'',1); 
        $data['a1_pelaksana_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',3,1,'',1);
        $data['a1_pelaksana_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',4,2,'',1);
        $data['a1_subdit_anggaran_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',4,1,'',1);
        $data['a1_subdit_anggaran_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',5,2,'',1);
        $data['a1_subdit_dadutek_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',5,1,'',1);
        $data['a1_subdit_dadutek_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',6,2,'',1);
        $data['a1_direktur_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',6,1,'',1);
        $data['a1_direktur_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',7,2,'',1);
        $data['a1_dirjen_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',7,1,'',1);


        // ========== A2 ==========
        $data['a2_cs_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',1,1,'',2);
        $data['a2_pelaksana_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',3,1,'',2);
        $data['a2_pelaksana_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',4,2,'',2);
        $data['a2_subdit_anggaran_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',4,1,'',2);
        $data['a2_subdit_anggaran_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',5,2,'',2);
        $data['a2_subdit_dadutek_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',5,1,'',2);
        $data['a2_subdit_dadutek_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',6,2,'',2);
        $data['a2_direktur_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',6,1,'',2);
        $data['a2_direktur_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',7,2,'',2);
        $data['a2_dirjen_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',7,1,'',2);

        // ========== A3 ==========
        $data['a3_cs_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',1,1,'',3);
        $data['a3_pelaksana_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',3,1,'',3);
        $data['a3_pelaksana_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',4,2,'',3);
        $data['a3_subdit_anggaran_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',4,1,'',3);
        $data['a3_subdit_anggaran_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',5,2,'',3);
        $data['a3_subdit_dadutek_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',5,1,'',3);
        $data['a3_subdit_dadutek_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',6,2,'',3);
        $data['a3_direktur_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',6,1,'',3);
        $data['a3_direktur_diteruskan'] = $this->dirjen->count_all_tiket_frontdesk('open',7,2,'',3);
        $data['a3_dirjen_diterima'] = $this->dirjen->count_all_tiket_frontdesk('open',7,1,'',3);


        $data['a1_dirjen_disetujui'] = $this->dirjen->count_all_tiket_frontdesk('close',7,'','disahkan',1);
        $data['a2_dirjen_disetujui'] = $this->dirjen->count_all_tiket_frontdesk('close',7,'','disahkan',2);
        $data['a3_dirjen_disetujui'] = $this->dirjen->count_all_tiket_frontdesk('close',7,'','disahkan',3);

        $data['a1_direktur_disetujui'] = $this->dirjen->count_all_tiket_frontdesk('close',6,'','disahkan',1);
        $data['a2_direktur_disetujui'] = $this->dirjen->count_all_tiket_frontdesk('close',6,'','disahkan',2);
        $data['a3_direktur_disetujui'] = $this->dirjen->count_all_tiket_frontdesk('close',6,'','disahkan',3);

        $data['a1_dirjen_ditolak'] = $this->dirjen->count_all_tiket_frontdesk('close',7,'3','ditolak',1);
        $data['a2_dirjen_ditolak'] = $this->dirjen->count_all_tiket_frontdesk('close',7,'3','ditolak',2);
        $data['a3_dirjen_ditolak'] = $this->dirjen->count_all_tiket_frontdesk('close',7,'3','ditolak',3);

        $data['a1_direktur_ditolak'] = $this->dirjen->count_all_tiket_frontdesk('close',6,'3','ditolak',1);
        $data['a2_direktur_ditolak'] = $this->dirjen->count_all_tiket_frontdesk('close',6,'3','ditolak',2);
        $data['a3_direktur_ditolak'] = $this->dirjen->count_all_tiket_frontdesk('close',6,'3','ditolak',3);


        // Argo
        $data['argo'] = $this->mfrontdesk->get_tiket_lewat_waktu();

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/dashboard';
        $this->load->view('new-template', $data);
    }

    function lists($ang, $lev, $adasda)
    {
		$sql = "SELECT * FROM `tb_tiket_frontdesk` a
                JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                WHERE
                 status = 'open' AND
                a.lavel = '{$this->session->userdata('lavel')}' AND
				c.anggaran = '{$ang}'
                GROUP BY no_tiket_frontdesk
                ORDER BY tanggal";
        $data['lists'] = $this->db->query($sql);

        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_tiket';
        $this->load->view('new-template', $data);
    }


	function lists_level($anggaran, $level, $active, $status = 'open', $kep = '')
    {
        $data['lists'] = $this->dirjen->get_tiket_by_level($status, $level, $active, $kep, $anggaran);
        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_tiket';
        $this->load->view('new-template', $data);
    }
	
    

    public function list_argo()
    {
		$sql = "SELECT * FROM `tb_tiket_frontdesk` a
                JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                WHERE
                 status = 'open' AND
                a.lavel = '{$this->session->userdata('lavel')}' AND
				(( (DATEDIFF(NOW(),a.tanggal) - ( (DATEDIFF(NOW(),a.tanggal)/7) * 2 )) - 
                      (SELECT COUNT(id) FROM tb_calendar f WHERE holiday BETWEEN a.tanggal AND NOW())  )) > 5 
                GROUP BY no_tiket_frontdesk
                ORDER BY tanggal";
        $data['lists'] = $this->db->query($sql);
		//print_r($this->db->last_query());
        $data['title'] = 'Dirjen';
        $data['content'] = 'dirjen/list_argo';
        $this->load->view('new-template', $data);
    }

    // Tentukan A1, A2, A3
    function _kelompok($anggaran, $level_id, $is_active)
    {
        return $this->db->query("SELECT a.no_tiket_frontdesk
								FROM tb_tiket_frontdesk a, tb_kon_unit_satker b
								WHERE a.id_unit = b.id_unit AND a.id_kementrian = b.id_kementrian AND 
								(SELECT c.anggaran FROM tb_unit_saker c WHERE b.id_unit_satker = c.id_unit_satker ) = ?
								AND ((a.is_active NOT IN(?) AND lavel = 4) OR (lavel > 4) OR 
								(a.is_active IN(1) AND lavel = 4))", array($anggaran, $is_active, $level_id, $level_id));
    }

    function frontdesk()
    {
        $this->load->model('mfrontdesk');
        $this->load->helper('tanggal_helper');
        $page = $this->mfrontdesk->get_all_tiket_frontdesk(6, '');
        $pageData = $page['query'];
        $pageLink = $page['pagination1'];

        $data = array('result' => $pageData, 'pageLink' => $pageLink,);
        $data['title'] = 'Konsultasi Front Desk';
        $data['content'] = 'dirjen/frontdesk';
        $data['isian_form'] = $page['isian_form1'];
        $this->load->view('new-template', $data);
    }

    function diterima($id)
    {
        $this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 1 WHERE no_tiket_frontdesk = ?", array($id));
        redirect('dirjen/frontdesk');
    }

    function accept($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();

        $this->db->update('tb_tiket_frontdesk', array(
            'status' => 'close', 'is_active' => 6, 'keputusan' => 'disahkan'
        ), array(
            'no_tiket_frontdesk' => $id
        ));

        $this->_success(site_url('/dirjen/frontdesk'), 'Tiket berhasil ditetapkan', 3);
    }

    function reject($id)
    {
        $sql = "UPDATE tb_tiket_frontdesk
                SET is_active = 0,
                status = 'close',
                keputusan = 'ditolak'
                WHERE no_tiket_frontdesk = ?";

        $this->db->query($sql, array($id));
        redirect('dirjen/frontdesk');
    }

    function helpdesk($no_tiket_helpdesk = '')
    {
        if ($no_tiket_helpdesk == '') {
            $sql = "SELECT * FROM tb_tiket_helpdesk JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                WHERE status = 'open' AND
                lavel = 6";

            $data['antrian'] = $this->db->query($sql);
            $data['content'] = 'dirjen/helpdesk';

        } else {
            $sql = "SELECT * FROM tb_tiket_helpdesk JOIN tb_satker
            ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
            WHERE status = 'open' AND
            lavel = 6 AND
            tb_tiket_helpdesk.no_tiket_helpdesk = '{$no_tiket_helpdesk}'
            LIMIT 1";

            $data['antrian'] = $this->mhelpdesk->get_by_id($no_tiket_helpdesk);
            $data['content'] = 'dirjen/helpdesk_view';
        }
        $data['title'] = 'Dirjen';
        $this->load->view('new-template', $data);
    }

    function jawab()
    {

    }

    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}