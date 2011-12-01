<?php
class Form_revisi_anggaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Form Revisi Anggaran';

    function index()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Form Revisi Anggaran';
        $data['content'] = 'satker/form_revisi_anggaran';
        $this->load->view('satker/template', $data);
        /*}
          else
          {
              $this->load->view('login');
          }*/
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
        $sql = "INSERT INTO tb_tiket_frontdesk (id_satker, id_formulir) VALUES (?, ?)";
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
        redirect('/satker/form_revisi_anggaran');

    }

    public function search_satker()
    {
        $id_satker = $this->input->post('id_satker');

        if ($id_satker >= 3 AND is_numeric($id_satker)) {
            $result = $this->db->query("SELECT * FROM `tb_satker` WHERE `id_satker` LIKE '%{$id_satker}' LIMIT 30");
            var_dump($result->result());
        }
    }
}