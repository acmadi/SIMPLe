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
     * Tanda terima pengajuan
     *
     * @param $tiket
     * @param $no_surat_usulan
     * @param $no_tiket
     * @param $kementrian
     * @param $eselon
     * @param $nip
     * @param $nama
     * @param $jabatan
     * @param $hp
     * @param $tlpkantor
     * @param $emails Array of Emails
     * @return array
     */
    public function create_pengajuan($tiket, $no_surat_usulan, $no_tiket, $kementrian, $eselon, $nip, $nama, $jabatan, $hp, $tlpkantor, $emails, $tgl_pengajuan, $tgl_selesai)
    {
        $odf = new odf($this->print_template_path . 'pengajuan.odt');

        $odf->setVars('var1', $no_surat_usulan);
        $odf->setVars('var2', $no_tiket);
        $odf->setVars('var3', $kementrian);
        $odf->setVars('var4', $eselon);
        $odf->setVars('var5', $nip);
        $odf->setVars('var6', $nama);
        $odf->setVars('var7', $jabatan);
        $odf->setVars('var8', $hp);
        $odf->setVars('var9', $tlpkantor);

        $odf->setVars('var11', $tgl_pengajuan);
        $odf->setVars('var12', $tgl_selesai);

        $email = '';
        $i = 1;
        foreach ($emails as $value) {
            $email .= "$i. $value\n";
            $i++;
        }

        $odf->setVars('var10', $email);

        $output_filename = 'pengajuan' . $tiket . '.odt';

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


        $odf->setVars('var13', date('Y-m-d H:i:s'));

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


        $output_filename = 'ambil' . $data->no_tiket_frontdesk . '.odt';

        $odf->saveToDisk(FCPATH . 'output/' . $output_filename);

        return array(
            'full_filename' => FCPATH . 'output/' . $output_filename,
            'filename' => $output_filename
        );
    }
}