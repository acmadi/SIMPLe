<?php
require_once(FCPATH . 'library/odtphp/odf.php');
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
    public function create_pengajuan($data = array())
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
                    $kelengkapan .= "[v] {$value['nama_kelengkapan']}\n";
                } else {
                    $kelengkapan .= "[_] {$value['nama_kelengkapan']}\n";
                }
            }
        }

        foreach ($data['kelengkapan_dokumen'] as $value) {
            if ($value->id_kelengkapan == 0 AND $value->kelengkapan != '')
                $kelengkapan .= "[v] {$value->kelengkapan}\n";
        }
        // END Kelengkapan Dokumen

        // START Email
        $email = '';
        $i = 1;
        foreach ($data['emails'] as $value) {
            $email .= "$i. $value\n";
            $i++;
        }
        // END Email

        // Buka template dokumen
        $odf = new odf($this->print_template_path . 'pengajuan.odt');

        // Masukkan variable ke dokumen
        $odf->setVars('var1', $data['no_surat_usulan']);
        $odf->setVars('var2', sprintf('%05d', $data['no_tiket']) . '/' . date('Y'));
        $odf->setVars('var3', $data['kementrian']);
        $odf->setVars('var4', $data['eselon']);
        $odf->setVars('var5', $data['nip']);
        $odf->setVars('var6', $data['nama']);
        $odf->setVars('var7', $data['jabatan']);
        $odf->setVars('var8', $data['hp']);
        $odf->setVars('var9', $data['tlpkantor']);
        $odf->setVars('var10', $email);
        $odf->setVars('var11', date('d-m-Y', strtotime($data['tgl_pengajuan'])));
        $odf->setVars('var12', date('d-m-Y', strtotime($data['tgl_selesai'])));
        $odf->setVars('var13', $kelengkapan);
        $odf->setVars('var14', $data['catatan']);
        $odf->setVars('var15', $this->CI->session->userdata('nama'));


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
    public function create_ambil($no_surat_pengajuan, $no_tiket, $id_petugas_cs, $nama_petugas_cs, $kl, $eselon, $nip, $nama_petugas, $jabatan, $no_hp, $tlpkantor, $emails, $tgl_pengajuan)
    {
        $odf = new odf($this->print_template_path . 'ambil.odt');

        $odf->setVars('var1', $no_surat_pengajuan);
        $odf->setVars('var2', $no_tiket);
        $odf->setVars('var3', $id_petugas_cs);
        $odf->setVars('var4', $nama_petugas_cs);
        $odf->setVars('var5', $kl);
        $odf->setVars('var6', $eselon);
        $odf->setVars('var7', $nip);
        $odf->setVars('var8', $nama_petugas);
        $odf->setVars('var9', $jabatan);

        $odf->setVars('var10', $no_hp);
        $odf->setVars('var11', $tlpkantor);

        $emails = explode(';', trim_middle($emails));

        $email = '';
        $i = 1;
        foreach ($emails as $value) {
            $email .= "$i. $value\n";
            $i++;
        }

        $odf->setVars('var12', $email);


        $odf->setVars('var13', date('d-m-Y H:i:s'));

        $odf->setVars('var14', $tgl_pengajuan);

        $odf->setVars('var15', $nama_petugas_cs);


        $output_filename = 'ambil' . $no_tiket . '.odt';

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
        $odf = new odf($this->print_template_path . 'kembali.odt');

        $odf->setVars('var1', $data->id_kementrian . ' - ' . $data->nama_kementrian);
        $odf->setVars('var2', $data->id_unit . ' - ' . $data->id_kementrian);
        $odf->setVars('var3', $data->nip);
        $odf->setVars('var4', $data->nama_petugas);
        $odf->setVars('var5', $data->jabatan_petugas);
        $odf->setVars('var6', $data->no_hp);
        $odf->setVars('var7', $data->no_kantor);

        $emails = explode(';', trim_middle($data->email));
        $email = '';
        $i = 1;
        foreach ($emails as $value) {
            $email .= "$i. $value\n";
            $i++;
        }
        $odf->setVars('var8', $email);


        $odf->setVars('var9', $data->catatan);


        $output_filename = 'kembali_' . $data->no_tiket_frontdesk . '.odt';

        $odf->saveToDisk(FCPATH . 'output/' . $output_filename);

        return array(
            'full_filename' => FCPATH . 'output/' . $output_filename,
            'filename' => $output_filename
        );
    }
}