<?php
require_once(FCPATH . 'library/odtphp/odf.php');
// Set Locale
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');

class Odtphp
{
    public $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->print_template_path = FCPATH . 'print-template/';
    }

    public function create($tiket, $tanggal_terakhir, $pukul)
    {
        //$this->CI->load->library('session');
        //$this->CI->db->insert('tb_logs', $data);
        $odf = new odf($this->print_template_path . 'BALD.odt');
        //        $odf->setVars('var1', $nomer);
        $odf->setVars('var2', date('d-m-Y'));
        $odf->setVars('var3', date('d-m-Y'));
        $odf->setVars('var4', $tiket);
        $odf->setVars('var5', $tanggal_terakhir);
        $odf->setVars('var6', $pukul);
        $output_filename = 'BALD_' . $tiket . '.odt';
        $odf->saveToDisk(FCPATH . 'output/' . $output_filename);
        return array(
            'full_filename' => FCPATH . 'output/' . $output_filename,
            'filename' => $output_filename
        );
    }

    /**
     * Dokumen Tanda terima pengajuan revisi anggaran
     *
     * @param $data array
     * @return array
     */
    public function create_pengajuan($data)
    {
        // START Kelengkapan Dokumen
        $kelengkapan = '';
        $kelengkapan_doc = $this->CI->db->query("SELECT * FROM tb_kelengkapan_doc")->result_array();

        $temp = array();
        foreach ($data['kelengkapan_dokumen'] as $value) {
            $temp[] = $value->id_kelengkapan;
        }

        foreach ($kelengkapan_doc as $value) {

            if ($value['id_kelengkapan'] != 0) {
                if (in_array($value['id_kelengkapan'], $temp)) {
                    $kelengkapan .= "[V] {$value['nama_kelengkapan']}\n";
                } else {
                    $kelengkapan .= "[_] {$value['nama_kelengkapan']}\n";
                }
            }
        }

        foreach ($data['kelengkapan_dokumen'] as $value) {
            if ($value->id_kelengkapan == 0 AND $value->kelengkapan != '')
                $kelengkapan .= "- {$value->kelengkapan}\n";
        }
        // END Kelengkapan Dokumen

        // START Email
        $emails = explode(';', trim_middle($data['emails']));
        $email = '';
        if (count($emails) > 1) {
            foreach ($emails as $value) {
                $email .= "$value\n";
            }
        } else {
            $email = $emails[0];
        }
        // END Email

        // Buka template dokumen
        $odf = new odf($this->print_template_path . 'pengajuan.odt');

        // Masukkan variable ke dokumen
        $odf->setVars('var1', $data['no_surat_usulan']);
        $odf->setVars('tanggal_surat_usulan', strftime('%d %B %Y', strtotime($data['tanggal_surat_usulan'])));
        $odf->setVars('var2', sprintf('%05d', $data['no_tiket']) . '/' . date('Y'));
        $odf->setVars('var3', $data['kementrian']);
        $odf->setVars('var4', $data['eselon']);
        $odf->setVars('var5', $data['nip']);
        $odf->setVars('var6', $data['nama']);
        $odf->setVars('var7', $data['jabatan']);
        $odf->setVars('var8', $data['hp']);
        $odf->setVars('var9', $data['tlpkantor']);
        $odf->setVars('email', $email);
        $odf->setVars('var11', strftime('%d-%m-%Y %H:%M', strtotime($data['tgl_pengajuan'])));
        $odf->setVars('var12', strftime('%d-%m-%Y %H:%M', strtotime($data['tgl_selesai'])));
        $odf->setVars('var13', $kelengkapan);
        $odf->setVars('var14', $data['catatan']);
        $odf->setVars('var15', $this->CI->session->userdata('nama'));
        $odf->setVars('tanggal_sekarang', strftime('%d %B %Y'));
        $odf->setVars('nama_unit_satker', $data['nama_unit_satker']);


        // Persiapkan output file
        $output_filename = 'pengajuan' . $data['tiket'] . '.odt';

        $odf->saveToDisk(FCPATH . 'output/' . $output_filename);

        return array(
            'full_filename' => FCPATH . 'output/' . $output_filename,
            'filename' => $output_filename
        );
    }

    /**
     * PengAMBILan dokumen
     */
    public function create_ambil($data)
    {
        $emails = explode(';', trim_middle($data->email));
        $email = '';
        if (count($emails) > 1) {
            foreach ($emails as $value) {
                $email .= "$value\n";
            }
        } else {
            $email = $emails[0];
        }

        $odf = new odf($this->print_template_path . 'ambil.odt');

        $odf->setVars('nomor_tiket', sprintf('%05d', $data->no_tiket_frontdesk) . '/' . strftime('%Y', strtotime($data->tanggal)));
        $odf->setVars('tanggal_diterima', strftime('%d-%m-%Y %H:%M', strtotime($data->tanggal)));
        $odf->setVars('tanggal_selesai', strftime('%d-%m-%Y %H:%M', strtotime($data->tanggal_selesai)));
        $odf->setVars('tanggal_diserahkan', strftime('%d-%m-%Y %H:%M'));
        $odf->setVars('nomor_surat_usulan', $data->nomor_surat_usulan);
        $odf->setVars('tanggal_surat_usulan', strftime('%d %B %Y', strtotime($data->tanggal_surat_usulan)));
        $odf->setVars('nama_kl', $data->nama_kementrian);
        $odf->setVars('nama_unit', $data->nama_unit);
        $odf->setVars('nip', $data->nip);
        $odf->setVars('nama_petugas', $data->nama_petugas);
        $odf->setVars('jabatan', $data->jabatan_petugas);
        $odf->setVars('no_hp', $data->no_hp);
        $odf->setVars('tlp_kantor', $data->no_kantor);
        $odf->setVars('tanggal_sekarang', strftime('%d %B %Y'));
        $odf->setVars('email', $email);

        $output_filename = 'ambil' . $data->no_tiket_frontdesk . '.odt';

        $odf->saveToDisk(FCPATH . 'output/' . $output_filename);

        return array(
            'full_filename' => FCPATH . 'output/' . $output_filename,
            'filename' => $output_filename
        );
    }

    /**
     * PeNGEMBALIAN dokumen
     */
    public function create_kembali($data)
    {
        $emails = explode(';', trim_middle($data->email));
        $email = '';
        if (count($emails) > 1) {
            foreach ($emails as $value) {
                $email .= "$value\n";
            }
        } else {
            $email = $emails[0];
        }

        $odf = new odf($this->print_template_path . 'kembali.odt');

        $odf->setVars('nomor_tiket', sprintf('%05d', $data->no_tiket_frontdesk) . '/' . strftime('%Y', strtotime($data->tanggal)));
        $odf->setVars('tanggal_diterima', strftime('%d-%m-%Y %H:%M', strtotime($data->tanggal)));
        $odf->setVars('tanggal_dikembalikan', strftime('%d-%m-%Y %H:%M'));
        $odf->setVars('nomor_surat_usulan', $data->nomor_surat_usulan);
        $odf->setVars('tanggal_surat_usulan', strftime('%d %B %Y', strtotime($data->tanggal_surat_usulan)));
        $odf->setVars('nama_kl', $data->nama_kementrian);
        $odf->setVars('nama_unit', $data->nama_unit);
        $odf->setVars('nip', $data->nip);
        $odf->setVars('nama_petugas', $data->nama_petugas);
        $odf->setVars('jabatan', $data->jabatan_petugas);
        $odf->setVars('no_hp', $data->no_hp);
        $odf->setVars('tlp_kantor', $data->no_kantor);
        $odf->setVars('tanggal_sekarang', strftime('%d %B %Y'));
        $odf->setVars('email', $email);
        $odf->setVars('catatan_pengembalian_dokumen', $data->catatan);


        $output_filename = 'kembali_' . $data->no_tiket_frontdesk . '.odt';

        $odf->saveToDisk(FCPATH . 'output/' . $output_filename);

        return array(
            'full_filename' => FCPATH . 'output/' . $output_filename,
            'filename' => $output_filename
        );
    }
}