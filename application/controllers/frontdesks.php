<?php
class Frontdesks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk');
        $this->load->model('munit');
    }

    public function index()
    {
		$this->load->helper('tanggal_helper');
		
		$data['title'] 		= 'Konsultasi Front Desk';
        $data['content'] 	= 'frontdesks';
		$optional_sql		= '';
		
		if($this->session->userdata('lavel') != '7'):
			$optional_sql = " AND c.anggaran = '{$this->session->userdata('anggaran')}' 
							  AND c.id_unit_satker = '{$this->session->userdata('id_unit_satker')}' ";
		endif;
		
        //TODO Masih ragu dengan query ini. Mesti di recheck lagi. Tapi untuk sementara bolehlah. Fuuu!!
        $sql = "SELECT * FROM `tb_tiket_frontdesk` a
                JOIN tb_kementrian ON tb_kementrian.id_kementrian = a.id_kementrian
                JOIN tb_kon_unit_satker b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit_saker c ON b.id_unit_satker = c.id_unit_satker
                WHERE
                 status = 'open' AND
                a.lavel = '{$this->session->userdata('lavel')}'
				$optional_sql
                GROUP BY no_tiket_frontdesk
                ORDER BY tanggal";
		//print_r($sql);exit;
				
        $result = $this->db->query($sql);
        $data['result'] = $result;
        $this->load->view('new-template', $data);
    }
	
    function diterima($id)
    {
		$this->db->query("UPDATE tb_tiket_frontdesk SET is_active = 1 WHERE no_tiket_frontdesk = ?",array($id));
		$this->log->create("Dokumen Frontdesk dengan nomor tiket ".$id." diterima");
		redirect('frontdesks');
    }

    function diteruskan($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();
		
        $this->db->update('tb_tiket_frontdesk', array(
            'lavel' => $this->session->userdata('lavel')+1,'is_active' => 2
        ), array(
            'no_tiket_frontdesk' => $id
        ));
		
		$this->log->create("Dokumen Frontdesk dengan nomor tiket ".$id." diteruskan");
		
        $this->_success(site_url('/dashboards'), 'Tiket berhasil diteruskan', 3);
    }

    function reject($id)
    {
        if (!$_POST) {
            $data['data'] = $this->mfrontdesk->get_tiket_frontdesk_by_id($id);
        } else {
            $this->db->insert('tb_pengembalian_doc', array(
                'no_tiket_frontdesk' => $this->input->post('no_tiket_frontdesk'),
                'id_user' => $this->input->post('id_user'),
                'catatan' => $this->input->post('catatan'),
            ));

            $this->db->update('tb_tiket_frontdesk', array(
                'is_active' => 3,
                'status' => 'close',
                'keputusan' => 'ditolak',
				'tanggal_selesai' => date('Y-m-d h:i:s')
            ), array(
                'no_tiket_frontdesk' => $this->input->post('no_tiket_frontdesk'),
            ));
			
			$this->log->create("Dokumen Frontdesk dengan nomor tiket ".$this->input->post('no_tiket_frontdesk')." ditolak atau dikembalikan");
            redirect('frontdesks');
        }


        $data['title'] = 'Cek Tiket';
		
        $data['content'] = 'reject';
        $this->load->view('new-template', $data);
    }
	
	function accept($id)
    {
        $query = $this->db->get_where('tb_tiket_frontdesk', array('no_tiket_frontdesk' => $id))->row();

        $this->db->update('tb_tiket_frontdesk', array(
            'status' => 'close', 
            'keputusan' => 'disahkan',
			'tanggal_selesai' => date('Y-m-d h:i:s')
        ), array(
            'no_tiket_frontdesk' => $id
        ));
		
		$this->log->create("Dokumen Frontdesk dengan nomor tiket ".$id." disetujui");
        $this->_success(site_url('/frontdesks'), 'Tiket berhasil ditetapkan', 3);
    }

    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}