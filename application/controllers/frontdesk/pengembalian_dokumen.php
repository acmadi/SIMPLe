<?php
class Pengembalian_dokumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mtiket', 'tiket');
        $this->load->library('odtphp');
        $this->load->config('appconfig');
    }

    function index()
    {
        $this->load->helper('tanggal_helper');

        // Daftar Penyelia yang aktif
        $sql = "SELECT a.id_lavel,
                       b.nama, b.id_user
                FROM tb_masa_kerja a
                JOIN tb_user b ON a.id_user = b.id_user
                WHERE tanggal_mulai >= CURDATE() AND tanggal_selesai <= CURDATE() AND a.id_lavel = 7
                ";
        $penyelia = $this->db->query($sql);

        $data['penyelia'] = $penyelia;

        $data['result'] = $this->tiket->get_list_pengembalian_dokumen();
        $data['title'] = 'Pengambilan Dokumen';
        $data['content'] = 'frontdesk/pengembalian_dokumen';
        $this->load->view('new-template', $data);
    }

    function cetak($id, $id_penyelia)
    {
        $result = $this->tiket->get_detail_pengembalian_by_id($id);
		$this->db->query("UPDATE tb_pengembalian_doc SET sudah_diambil = 1, id_user = ? WHERE id_pengembalian_doc = ?",array($this->session->userdata('id_user'),$id));

        $penyelia = $this->db->query("SELECT nama FROM tb_user WHERE id_user = ?", array($id_penyelia))->row();

        // Pisahkan email
        $emails = explode(';', trim_middle($result->row()->email));
        $email = '';
        if (count($emails) > 1) {
            foreach ($emails as $value) {
                $email .= "$value\n";
            }
        } else {
            $email = $emails[0];
        }

        $odf = new odf(FCPATH . 'print-template/' . 'kembali.odt');

        $odf->setVars('nomor_tiket', sprintf('%05d', $result->row()->no_tiket_frontdesk) . '/' . strftime('%Y', strtotime($result->row()->tanggal)));
        $odf->setVars('tanggal_diterima', strftime('%d-%m-%Y %H:%M', strtotime($result->row()->tanggal)));
        $odf->setVars('tanggal_dikembalikan', strftime('%d-%m-%Y %H:%M'));
        $odf->setVars('nomor_surat_usulan', $result->row()->nomor_surat_usulan);
        $odf->setVars('tanggal_surat_usulan', strftime('%d %B %Y', strtotime($result->row()->tanggal_surat_usulan)));
        $odf->setVars('nama_kl', $result->row()->id_kementrian . ' - ' . $result->row()->nama_kementrian);
        $odf->setVars('nama_unit', $result->row()->id_unit . ' - ' . $result->row()->nama_unit);
        $odf->setVars('nip', $result->row()->nip);
        $odf->setVars('nama_petugas', $result->row()->nama_petugas);
        $odf->setVars('jabatan', $result->row()->jabatan_petugas);
        $odf->setVars('no_hp', $result->row()->no_hp);
        $odf->setVars('tlp_kantor', $result->row()->no_kantor);
        $odf->setVars('tanggal_sekarang', strftime('%d %B %Y'));
        $odf->setVars('email', $email);
        $odf->setVars('catatan_pengembalian_dokumen', $result->row()->catatan);
        $odf->setVars('nama_penyelia', $penyelia->nama);

        $full_filename = FCPATH . 'output/' . 'kembali_' . $result->row()->no_tiket_frontdesk;
        $odf->saveToDisk("$full_filename.odt");

        convert_odt_to_pdf($this->config->item('libreoffice_python'), "$full_filename.odt", "$full_filename.pdf");

        redirect(base_url('output/' . "kembali_{$result->row()->no_tiket_frontdesk}.pdf"));
    }

    function selesai($id)
    {
        $this->tiket->set_selesai_pengembalian($id);
        $this->session->set_flashdata('success', 'Berhasil mencetak bukti dokumen yang dikembalikan');
        redirect('/frontdesk/pengembalian_dokumen');
    }
}