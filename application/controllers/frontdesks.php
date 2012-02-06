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


    public function list_dokumen()
    {
        // Daftar Dokumen
        $sql = "SELECT * FROM tb_tiket_frontdesk a
                JOIN tb_kementrian b ON a.id_kementrian = b.id_kementrian
                JOIN tb_unit c ON a.id_unit = c.id_unit
                WHERE status = 'open' AND lavel = 1
                GROUP BY no_tiket_frontdesk
                ";
        $list_dokumen = $this->db->query($sql);


        // Daftar Penyelia yang aktif
        $sql = "SELECT a.id_lavel,
                       b.nama, b.id_user
                FROM tb_masa_kerja a
                JOIN tb_user b ON a.id_user = b.id_user
                WHERE tanggal_mulai >= CURDATE() AND tanggal_selesai <= CURDATE() AND a.id_lavel = 7
                ";
        $penyelia = $this->db->query($sql);

        $data['penyelia'] = $penyelia;

        $data['list_dokumen'] = $list_dokumen;
        $data['title'] = 'List Dokumen Revisi Anggaran';
        $data['content'] = 'frontdesk/list_dokumen';
        $this->load->view('new-template', $data);
    }

    public function cetak_dokumen($no_tiket_frontdesk, $id_penyelia) {

        $sql = "SELECT a.no_tiket_frontdesk, a.tanggal, a.catatan, a.nomor_surat_usulan, a.tanggal_surat_usulan,
                       a.id_kementrian, a.id_unit, a.petugas_penerima,
                       c.id_petugas_satker, c.nama_petugas, c.nip, c.jabatan_petugas, c.no_hp, c.email, c.no_kantor, c.tipe,
                       d.id_kelengkapan_formulir, e.id_kelengkapan, e.nama_kelengkapan,
                       g.nama_unit AS nama_unit_satker
                FROM tb_tiket_frontdesk a
                LEFT JOIN tb_satker b          ON b.id_satker          = a.id_satker
                JOIN tb_petugas_satker c       ON c.id_petugas_satker  = a.id_petugas_satker
                JOIN tb_kelengkapan_formulir d ON d.no_tiket_frontdesk = a.no_tiket_frontdesk
                JOIN tb_kelengkapan_doc e      ON e.id_kelengkapan     = d.id_kelengkapan
                JOIN tb_kon_unit_satker f      ON (f.id_unit = a.id_unit AND f.id_kementrian = a.id_kementrian)
                JOIN tb_unit_saker g           ON g.id_unit_satker = f.id_unit_satker
                WHERE a.no_tiket_frontdesk = ?
                ";
        $result = $this->db->query($sql, array($no_tiket_frontdesk))->result_array();

        // Cari nama Penyelia
        $penyelia = $this->db->query('SELECT nama FROM tb_user WHERE id_user = ?', array($id_penyelia))->row();


        // START Kelengkapan Dokumen
        $kel = $this->db->query($sql, array($no_tiket_frontdesk))->result();
        $kelengkapan = '';
        $kelengkapan_doc = $this->db->query("SELECT * FROM tb_kelengkapan_doc")->result_array();

        $temp = array();
        foreach ($kel as $value) {
            $temp[] = $value->id_kelengkapan;
        }

        foreach ($kelengkapan_doc as $value) {

            if ($value['id_kelengkapan'] != 0) {
                if (in_array($value['id_kelengkapan'], $temp)) {
                    $kelengkapan .= "&#9745; {$value['nama_kelengkapan']}\n";
                } else {
                    $kelengkapan .= "&#9744; {$value['nama_kelengkapan']}\n";
                }
            }
        }

        foreach ($kel as $value) {
            if ($value->id_kelengkapan == 0 AND $value->kelengkapan != '')
                $kelengkapan .= "- {$value->kelengkapan}\n";
        }
        // END Kelengkapan Dokumen

        // START Email
        $emails = explode(';', trim_middle($result[0]['email']));
        $email = '';
        if (count($emails) > 1) {
            foreach ($emails as $value) {
                $email .= "$value\n";
            }
        } else {
            $email = $emails[0];
        }
        // END Email

        // Cari kementerian
        $kementerian = $this->db->query("SELECT nama_kementrian FROM tb_kementrian
                                         JOIN tb_tiket_frontdesk ON tb_kementrian.id_kementrian = tb_tiket_frontdesk.id_kementrian
                                         WHERE no_tiket_frontdesk = ?", array($no_tiket_frontdesk))->row();
        // Cari Unit Eselon
        $unit = $this->db->query("SELECT nama_unit FROM tb_unit
                                         JOIN tb_tiket_frontdesk ON tb_unit.id_unit = tb_tiket_frontdesk.id_unit
                                         WHERE no_tiket_frontdesk = ?", array($no_tiket_frontdesk))->row();

        // Perkiraan Tanggal Target Penyelesaian
        $jml_hari_kerja = hari_kerja(
            strftime('%Y-%m-%d %H:%M:%S', strtotime($result[0]['tanggal'])),
            strftime('%Y-%m-%d %H:%M:%S', strtotime('+7 days'))
        );

        $i = 7;
        while ($jml_hari_kerja <= 5) {
            $jml_hari_kerja = hari_kerja(
                strftime('%Y-%m-%d %H:%M:%S', strtotime($result[0]['tanggal'])),
                strftime('%Y-%m-%d %H:%M:%S', strtotime("+$i days"))
            );
            $i++;
        }



        // Cek sudah lebih dari jam 12:00 atau belum.
        // Kalau belum, dihitung 5 hari kerja.
        // Kalau sudah, dihitung 6 hari kerja.
        if (strftime('%H:%M', strtotime($result[0]['tanggal'])) > strftime('%H:%M', mktime(12, 00, 00))) {
            $i++;
        }

        $jam = strftime('%H:%M', strtotime($result[0]['tanggal']));
        $tanggal_selesai = strftime('%d-%m-%Y',  + strtotime("+$i days"));
        $tanggal_selesai = $tanggal_selesai . ' ' . $jam;


        $odf = new odf(FCPATH . 'print-template/' . 'pengajuan.odt');
        // Masukkan variable ke dokumen
        $odf->setVars('nomor_surat_usulan', $result[0]['nomor_surat_usulan']);
        $odf->setVars('tanggal_surat_usulan', strftime('%d %B %Y', strtotime($result[0]['tanggal_surat_usulan'])));
        $odf->setVars('nomor_tiket', sprintf('%05d', $result[0]['no_tiket_frontdesk']) . '/' . date('Y'));
        $odf->setVars('kementerian', $kementerian->nama_kementrian);
        $odf->setVars('eselon', $unit->nama_unit);
        $odf->setVars('nip', $result[0]['nip']);
        $odf->setVars('nama_petugas', $result[0]['nama_petugas']);
        $odf->setVars('jabatan', $result[0]['jabatan_petugas']);
        $odf->setVars('no_hp', $result[0]['no_hp']);
        $odf->setVars('no_kantor', $result[0]['no_kantor']);
        $odf->setVars('email', $email);
        $odf->setVars('tanggal_diterima', strftime('%d-%m-%Y %H:%M', strtotime($result[0]['tanggal'])));
        $odf->setVars('tanggal_selesai', $tanggal_selesai);
        $odf->setVars('kelengkapan_dokumen', $kelengkapan, false, 'utf-8');
        $odf->setVars('catatan', $result[0]['catatan']);
        $odf->setVars('nama_penyelia', $penyelia->nama);
        $odf->setVars('tanggal_sekarang', strftime('%d %B %Y'));
        $odf->setVars('nama_unit_satker', $result[0]['nama_unit_satker']);
        $odf->setVars('nama_penyelia', $penyelia->nama);

         // Simpan file ODT
         $odf->saveToDisk(FCPATH . 'output/' . 'pengajuan_' . $no_tiket_frontdesk . '.odt');

         // Convert file ODT ke PDF
         $command = sprintf('"%s" DocumentConverter.py "%s" "%s"',
             $this->config->item('libreoffice_python'),
             FCPATH . 'output/' . 'pengajuan_' . $no_tiket_frontdesk . '.odt',
             FCPATH . 'output/' . 'pengajuan_' . $no_tiket_frontdesk . '.pdf');
         exec($command);


         redirect(base_url('output/' . 'pengajuan_' . $no_tiket_frontdesk . '.pdf'));
    }

    public function eskalasi($no_tiket_frontdesk) {
        $this->db->update('tb_tiket_frontdesk',
            array('lavel' => 3),
            array('no_tiket_frontdesk' => $no_tiket_frontdesk)
        );
        $this->session->set_flashdata('success', 'Dokumen telah dieskalasi');
        redirect('frontdesks/list_dokumen');
    }
}