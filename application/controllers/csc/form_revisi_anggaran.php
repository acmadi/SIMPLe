<?php
class Form_revisi_anggaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['kementrian'] = $this->db->query('SELECT * FROM tb_kementrian ORDER BY id_kementrian');
        $data['kelengkapan_dokumen'] = $this->db->query('SELECT * FROM tb_kelengkapan_doc ORDER BY id_kelengkapan');
        $data['title'] = 'Form Revisi Anggaran';
        $data['content'] = 'csc/form_revisi_anggaran';
        $this->load->view('csc/template', $data);
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
        redirect('/csc/form_revisi_anggaran');

    }

    public function search_satker()
    {
        $id_satker = $this->input->post('id_satker');

        if ($id_satker >= 3 AND is_numeric($id_satker)) {
            $result = $this->db->query("SELECT * FROM `tb_satker` WHERE `id_satker` LIKE '%{$id_satker}' LIMIT 30");
            var_dump($result->result());
        }
    }

    function cari_satker()
    {
        if ($this->input->is_ajax_request()) {

            $term = $this->input->get('q');
            $eselon = $this->input->get('eselon');

            $sql = "SELECT * FROM tb_satker WHERE
                id_unit = '{$eselon}' AND
                (id_satker LIKE '%{$term}%' OR nama_satker LIKE '%{$term}%')
                ORDER BY id_unit";

            $result = $this->db->query($sql);

            $array = array();
            $i = 0;
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $value) {
                    $array[$i] = $value->id_satker . ' - ' . $value->nama_satker;
                    $i++;
                }
            }
            //            echo json_encode($array);
        }

        $json = array(
            array(
                'name' => 'Namaa',
                'value' => $_GET['q']
            )
        );

        echo json_encode($json);

        print_r($_GET);

        exit();
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

    function save_identitas()
    {
        $this->form_validation->set_message('required', '%s harus diisi');
        
        $this->form_validation->set_rules('nama_kl', 'Nama K/L', 'required');
        $this->form_validation->set_rules('eselon', 'Eselon', 'required');
        $this->form_validation->set_rules('kode_satker', 'Nama - Kode Satker', 'required');
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('jabatan_petugas', 'Jabatan Petugas', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('no_kantor', 'No Kantor', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == TRUE) {

            $nama_petugas = $this->input->post('nama_petugas');
            $jabatan_petugas = $this->input->post('jabatan_petugas');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $no_kantor = $this->input->post('no_kantor');
            $tipe = $this->input->post('tipe');

            $kode_satker = explode(', ', $this->input->post('kode_satker'));
            array_pop($kode_satker);


            // Save Identitas Petugas Satker
            $sql = "INSERT INTO tb_petugas_satker (nama_petugas, jabatan_petugas, no_hp, email, no_kantor, tipe)
                    VALUES ('{$nama_petugas}', '{$jabatan_petugas}', '{$no_hp}', '{$email}', '{$no_kantor}', '{$tipe}')";

            $this->db->query($sql);

            $sql = "SELECT *, MAX(id_petugas_satker) id_petugas_satker FROM tb_petugas_satker ";
            $result = $this->db->query($sql);
            $result = ($result->result());
            $result = $result[0];


            $temp = array();
            $i = 0;
            foreach ($kode_satker as $value) {
                $value = substr($value, 0, 6);
                $temp[$i] = $value;

                $now = date('Y-m-d');

                $sql = "INSERT INTO tb_tiket_frontdesk (id_satker, id_formulir, tanggal, status, lavel, id_petugas_satker)
                        VALUES ('{$temp[$i]}', NULL, '{$now}', 'open', 1, {$result->id_petugas_satker})";
                
                $this->db->query($sql);


                $i++;
            }
            $kode_satker = $temp;

            redirect('/csc/form_revisi_anggaran/success');
        }
        else {
            $this->index();
        }
    }

    function success() {
        $this->load->view('/csc/success');
    }
}