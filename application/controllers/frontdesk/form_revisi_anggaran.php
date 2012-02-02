<?php
class Form_revisi_anggaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->config->load('appconfig');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    function index()
    {
        $data['kementrian'] = $this->db->query('SELECT * FROM tb_kementrian ORDER BY id_kementrian');
        $data['eselon'] = $this->cari_eselon($this->input->post('nama_kl'), $this->input->post('eselon'));
        $data['kelengkapan_dokumen'] = $this->db->query('SELECT * FROM tb_kelengkapan_doc ORDER BY id_kelengkapan');
        $data['title'] = 'Form Revisi Anggaran';
        $data['content'] = 'frontdesk/form_revisi_anggaran';
        $this->load->view('new-template', $data);
    }

    public function add_revisi_anggaran()
    {
        extract($_POST); // Lazy coder use this (_ _"). Help me to fix this

        // TODO: Belum ditambahin form validation

        // tb_formulir_revisi
        $sql = 'INSERT INTO tb_formulir_revisi
                (id_formulir, id_satker, no_tiket_frontdesk, tanggal)
                VALUES (NULL, ?, ?, NOW())';
        $this->db->query($sql, array($id_satker, 2));
        $id_formulir = $this->db->query('SELECT id_formulir FROM tb_formulir_revisi ORDER BY tanggal DESC LIMIT 1');
        $id_formulir = ($id_formulir->result());
        $id_formulir = $id_formulir[0]->id_formulir;


        // tb_tiket_frontdesk
        $sql = "INSERT INTO tb_tiket_frontdesk (id_satker, id_formulir, lavel) VALUES (?, ?, 1)";
        $this->db->query($sql, array($id_satker, $id_formulir));
        $no_tiket_frontdesk = $this->db->query("SELECT no_tiket_frontdesk FROM tb_tiket_frontdesk ORDER BY no_tiket_frontdesk DESC LIMIT 1");
        $no_tiket_frontdesk = $no_tiket_frontdesk->result();
        $no_tiket_frontdesk = $no_tiket_frontdesk[0];
        $no_tiket_frontdesk = $no_tiket_frontdesk->no_tiket_frontdesk;


        // tb_histori_tiket
        $sql = "INSERT INTO tb_histori_tiket (no_tiket_frontdesk, id_user, tanggal) VALUES (?, ?, NOW());";
        $this->db->query($sql, array($no_tiket_frontdesk, null));


        // tb_kelengkapan_formulir
        if (isset($kelengkapan)) {
            foreach ($kelengkapan as $value) {
                $sql = "INSERT INTO tb_kelengkapan_formulir (no_tiket_frontdesk, id_kelengkapan) VALUES (?, ?)";
                $this->db->query($sql, array($no_tiket_frontdesk, $value));
            }
        }

        $this->session->set_flashdata('msg', 'Data telah masuk');
        redirect('/frontdesk/form_revisi_anggaran');

    }

    public function search_satker()
    {
        $id_satker = $this->input->post('id_satker');

        if ($id_satker >= 3 AND is_numeric($id_satker)) {
            $result = $this->db->query("SELECT * FROM `tb_satker` WHERE `id_satker` LIKE '%{$id_satker}' LIMIT 30");
            //            var_dump($result->result());
        }
    }

    function cari_satker($id_kementrian, $eselon)
    {
        $sql = "SELECT * FROM tb_satker WHERE
                    id_unit = '{$eselon}' AND
                    id_kementrian = '{$id_kementrian}'
                    ORDER BY id_unit";

        $result = $this->db->query($sql);

        foreach ($result->result() as $value) {
            echo sprintf('<option value="%s">%s</option>', $value->id_satker, $value->id_satker . ' - ' . $value->nama_satker);
        }
    }


    /**
     * AJAX
     *
     * @return void
     */
    function cari_kode_kon_unit_satker()
    {
        $kode_unit_satker = $this->input->get('kode_unit_satker');
        $result = $this->db->query("SELECT * FROM tb_kon_unit_satker WHERE id_satker = '$kode_unit_satker'");

        if ($result->num_rows() > 0) {
            $result = $result->result();
            $result = $result[0];
            $kode_kon_unit_satker = substr($result->kode_unit, 4, 2);
            switch ($kode_kon_unit_satker) {
                case '01':
                    echo 'A1';
                    break;
                case '02':
                    echo 'A2';
                    break;
                case '03':
                    echo 'A3';
                    break;
            }
        }
        exit();
    }

    public
    function dokumen_check($data)
    {
        if (count($data) < 3):
            $this->form_validation->set_message('dokumen_check', 'Kelengkapan <b>%s</b> tidak terpenuhi');
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function save_identitas()
    {	
        $status = false;
        $this->form_validation->set_rules('nama_kl', 'Nama K/L', 'required');
        $this->form_validation->set_rules('eselon', 'Eselon', 'required');
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('jabatan_petugas', 'Jabatan Petugas', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('no_kantor', 'No Kantor', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

//        $this->form_validation->set_rules('tipe', 'Kategori', 'required');
        $this->form_validation->set_rules('nomor_surat_usulan', 'Nomor Surat Usulan', 'required');
        $this->form_validation->set_rules('tanggal_surat_usulan', 'Tanggal Surat Usulan', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');


        $this->form_validation->set_rules('dokumen', 'Dokumen', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan CS', 'trim');

        if ($this->form_validation->run() == TRUE) {

            $nama_petugas = $this->input->post('nama_petugas');
            $jabatan_petugas = $this->input->post('jabatan_petugas');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $no_kantor = $this->input->post('no_kantor');
            $tipe = $this->input->post('tipe');
            $nomor_surat_usulan = $this->input->post('nomor_surat_usulan');
            $tanggal_surat_usulan = $this->input->post('tanggal_surat_usulan');
            $kode_satker = $this->input->post('kode_satker');
            $catatan = $this->input->post('catatan');
			
			

            $this->load->helper('tanggal_helper');

            $tanggal_surat_usulan = set_tanggal_mysql($tanggal_surat_usulan);

            $nip = $this->input->post('nip');

            $nama_kl = $this->input->post('nama_kl');
            $eselon = $this->input->post('eselon');

            $kode_satker = explode(' - ', $this->input->post('kode_satker'));

            if (count($kode_satker) == 2):
                $kode_satker_select = $kode_satker[0];
            else:
                $kode_satker_select = 'NULL';
            endif;

            $this->db->trans_begin();

            // Save Identitas Petugas Satker
            $sql = "INSERT INTO tb_petugas_satker (nama_petugas, jabatan_petugas, no_hp, email, no_kantor, tipe, nip)
                    VALUES ('{$nama_petugas}', '{$jabatan_petugas}', '{$no_hp}', '{$email}', '{$no_kantor}', '{$tipe}','{$nip}')";

            $this->db->query($sql);

            $tiket_id = $this->db->insert_id();

            $now = date('Y-m-d H:i:s');
			

            $sql = "INSERT INTO tb_tiket_frontdesk (id_satker, id_formulir, tanggal, status, lavel, id_petugas_satker, id_unit, id_kementrian,nomor_surat_usulan,tanggal_surat_usulan,is_active, catatan, petugas_penerima)
					VALUES ({$kode_satker_select}, NULL, '{$now}', 'open', 3, {$tiket_id},'{$eselon}','{$nama_kl}','{$nomor_surat_usulan}','{$tanggal_surat_usulan}',2, '{$catatan}','".$this->session->userdata("id_user")."')";


            $this->db->query($sql);



            // Simpan dokumen di tb_kelengkapan_formulir
            $dokumen = $this->input->post('dokumen');
            $no_tiket_frontdesk = $this->db->insert_id();

            if (count($dokumen) >= 1) {
                foreach ($dokumen as $key => $value) {
                    $sql = "INSERT INTO tb_kelengkapan_formulir
										(no_tiket_frontdesk, id_kelengkapan)
										VALUES ('{$no_tiket_frontdesk}', '{$key}')";

                    $this->db->query($sql);
                    echo $this->db->last_query();
                }
            }

            if ($this->input->post('dokumen_lainnya')) {
                $dokumen_lainnya = $this->input->post('dokumen_lainnya');
                if (isset($dokumen_lainnya) AND count($dokumen_lainnya) > 0) {
                    foreach ($dokumen_lainnya as $value) {
                        if (isset($_POST['dokumen_lainnya'])) {
                            $sql = "INSERT INTO tb_kelengkapan_formulir
									(no_tiket_frontdesk, kelengkapan, id_kelengkapan)
									VALUES ('{$no_tiket_frontdesk}', '{$value}', 0)";

                            $this->db->query($sql);
                        }
                    }
                }
            }


            // Masukkan data ke tb_histori_tiket
            $sql = "INSERT INTO tb_histori_tiket VALUES(NULL, ?, ?, NOW())";
            $this->db->query($sql, array($no_tiket_frontdesk, $this->session->userdata('id_user')));

            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                redirect('/frontdesk/form_revisi_anggaran/fail');
            } else {
                $this->db->trans_commit();
                redirect('/frontdesk/form_revisi_anggaran/success/' . $no_tiket_frontdesk);
            }
        }
        else {
            $this->index();
        }
    }

    function success($no_tiket_frontdesk)
    {
        // TODO: Gak optimal ini query nya. Suatu saat nanti harus dioptimalkan.
        $result = $this->db->from('tb_tiket_frontdesk')
                ->join('tb_satker', 'tb_satker.id_satker = tb_tiket_frontdesk.id_satker', 'left')
                ->join('tb_petugas_satker', 'tb_petugas_satker.id_petugas_satker = tb_tiket_frontdesk.id_petugas_satker')
                ->join('tb_kelengkapan_formulir', 'tb_kelengkapan_formulir.no_tiket_frontdesk = tb_tiket_frontdesk.no_tiket_frontdesk')
                ->join('tb_kelengkapan_doc', 'tb_kelengkapan_doc.id_kelengkapan = tb_kelengkapan_formulir.id_kelengkapan')
                ->join('tb_unit', 'tb_unit.id_unit = tb_tiket_frontdesk.id_unit AND tb_unit.id_kementrian = tb_tiket_frontdesk.id_kementrian')
        //->join('tb_kementrian', 'tb_kementrian.id_kementrian = tb_satker.id_kementrian')
        //->join('tb_unit', 'tb_unit.id_unit = tb_satker.id_unit')
                ->where('tb_tiket_frontdesk.no_tiket_frontdesk', $no_tiket_frontdesk)
                ->get();

        $data['identitas'] = $result->result();

        $temp = $result->row();
        $id_kementrian = $temp->id_kementrian;
        $id_unit = $temp->id_unit;

        $result = $this->db->from('tb_kementrian')->where('id_kementrian', $id_kementrian)->get();
        $data['kementrian'] = $result->row();

        $result = $this->db->from('tb_unit')->where('id_unit', $id_unit)->get();
        $data['unit'] = $result->row();

        $data['no_tiket_frontdesk'] = $no_tiket_frontdesk;

        $this->log->create("Cetak tanda terima pengajuan revisi anggaran #{$no_tiket_frontdesk}");

        $input_filename = $this->odtphp->create($no_tiket_frontdesk, 'tanggal', '10:00');

        $sql = 'SELECT * FROM tb_kelengkapan_formulir a
                JOIN tb_kelengkapan_doc b ON a.id_kelengkapan = b.id_kelengkapan
                WHERE no_tiket_frontdesk = ?
                ORDER by b.id_kelengkapan';
        $kelengkapan_dokumen = $this->db->query($sql, array($no_tiket_frontdesk))->result();

        $document['tiket'] = $no_tiket_frontdesk;
        $document['no_surat_usulan'] = $data['identitas'][0]->nomor_surat_usulan;
        $document['tanggal_surat_usulan'] = $data['identitas'][0]->tanggal_surat_usulan;
        $document['no_tiket'] = $no_tiket_frontdesk;
        $document['kementrian'] = $data['kementrian']->nama_kementrian;
        $document['eselon'] = $data['unit']->nama_unit;
        $document['nip'] = $data['identitas'][0]->nip;
        $document['nama'] = $data['identitas'][0]->nama_petugas;
        $document['jabatan'] = $data['identitas'][0]->jabatan_petugas;
        $document['hp'] = $data['identitas'][0]->no_hp;
        $document['tlpkantor'] = $data['identitas'][0]->no_kantor;
        $document['emails'] = $data['identitas'][0]->email;
        $document['tgl_pengajuan'] = date('d-m-Y H:i:s');

        // Cek apakah sudah lewat jam 12 siang?
        $tanggal_mulai = $data['identitas'][0]->tanggal;
        if (date('H', strtotime($tanggal_mulai)) >= 12) {
            $selesai = date('Y-m-d H:i:s', strtotime('+8 days'));
            $jumlah_hari_kerja = hari_kerja($tanggal_mulai, $selesai);
        } else {
            $selesai = date('Y-m-d H:i:s', strtotime('+7 days'));
            $jumlah_hari_kerja = hari_kerja($tanggal_mulai, $selesai);
        }
        $jumlah_hari_kerja = '+' . $jumlah_hari_kerja . ' days';
        $tanggal_selesai = date('Y-m-d H:i:s', strtotime($jumlah_hari_kerja));

        $document['tgl_selesai'] = $tanggal_selesai;
        $document['kelengkapan_dokumen'] = $kelengkapan_dokumen;
        $document['catatan'] = $data['identitas'][0]->catatan;

        $input_filename2 = $this->odtphp->create_pengajuan($document);

        $output = preg_replace('/.odt/', '.pdf', $input_filename['full_filename']);

        $output2 = preg_replace('/.odt/', '.pdf', $input_filename2['full_filename']);

        $command = sprintf('"%s" DocumentConverter.py "%s" "%s"',
            $this->config->item('libreoffice_python'),
            $input_filename['full_filename'],
            $output);

        $command2 = sprintf('"%s" DocumentConverter.py "%s" "%s"',
                    $this->config->item('libreoffice_python'),
                    $input_filename2['full_filename'],
                    $output2);

        exec($command);

        exec($command2);

        $data['title'] = '';
        $data['content'] = 'frontdesk/success2';

        $pdf_file = preg_replace('/.odt/', '.pdf', $input_filename['filename']);
        $pdf_file2 = preg_replace('/.odt/', '.pdf', $input_filename2['filename']);

        $data['pdf_file'] = base_url() . 'output/' . $pdf_file;
        $data['pdf_file2'] = base_url() . 'output/' . $pdf_file2;

        $this->load->view('frontdesk/success2', $data);
    }

    function fail()
    {
        $this->load->view('/frontdesk/fail');
    }

    function selesai($no_tiket)
    {
        $this->log->create("Cetak Dokumen BALD #{$no_tiket}");
        $data['no_tiket'] = $no_tiket;
        $this->load->view('/frontdesk/cetak_bald', $data);
    }

    function anggaran($id_kementrian)
    {
        $result = $this->db->from('tb_kon_unit_satker a')
                ->join('tb_unit_saker b', 'a.id_unit_satker = b.id_unit_satker')
                ->where('id_kementrian', $id_kementrian)
                ->get();
        $anggaran = $result->row();
        $anggaran = $anggaran->anggaran;
        echo $anggaran;
        exit();
    }

    /**
     * Digunakan untuk mencari Eselon.
     * Output berupa <option value="kode_eselon">nama_eselon</option>
     *
     * @param $id_kementrian Kode Kementrian (e.g 002, 014)
     * @param $eselon Kode Eselon (e.g 01, 06, 21)
     * @output HTML
     */
    function cari_eselon($id_kementrian, $id_eselon = '')
    {

        /* INFO:
                 $select digunakan saat validasi gagal dan untuk tetap memlilih opsi terakhir tetap terpilih.
                 Method set_value() tidak bisa digunakan di controller. Sehingga set_value('eselon') dikirim
                 kembali ke controller untuk diproses. Lihat views/helpdesk/identitas_satker pada Nama Eselon,
                 ada file_get_contents()
              */

        $id_kementrian = substr($id_kementrian, 0, 3);

        $result = $this->db->query("SELECT * FROM tb_unit WHERE id_kementrian = ?", array($id_kementrian));
        $eselon = '';
        if ($result->num_rows() > 0) {

            foreach ($result->result() as $value) {
                if ($id_eselon != '' AND $id_eselon == $value->id_unit) {
                    $eselon .= sprintf('<option selected value="%s">%s - %s</option>', $value->id_unit, $value->id_unit, $value->nama_unit);
                } else {
                    $eselon .= sprintf('<option value="%s">%s - %s</option>', $value->id_unit, $value->id_unit, $value->nama_unit);
                }
            }
        }
        return $eselon;
    }
}