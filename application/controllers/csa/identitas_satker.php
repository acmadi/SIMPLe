<?php
class Identitas_satker extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    function index()
    {
        $data['kementrian'] = $this->db->query('SELECT * FROM tb_kementrian ORDER BY id_kementrian');
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Isi Identitas Satker';
        $data['content'] = 'csa/identitas_satker';
        $this->load->view('csa/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }

    /**
     * @return JSON
     */
    function search_satker()
    {
        $id_satker = (string)$this->input->get('id_satker');
        $result = $this->db->query("SELECT * FROM tb_satker WHERE id_satker = ? LIMIT 1", array($id_satker));

        if ($result->num_rows() == 1) {
            $result = $result->result();
            echo json_encode($result[0]);
        }
        exit();
    }

    function cari_kl()
    {
        if ($this->input->is_ajax_request()) {

            $id_kementrian = $this->input->get('id_kementrian');

            $id_kementrian = substr($id_kementrian, 0, 3);

            $result = $this->db->query("SELECT * FROM tb_unit WHERE id_kementrian = ?", array($id_kementrian));

            if ($result->num_rows() > 0) {
                $result = $result->result();

                foreach ($result as $value) {
                    echo sprintf('<option value="%s">%s - %s</option>', $value->id_unit, $value->id_unit, $value->nama_unit);
                }
            }
        }
        exit();
    }

    function cari_satker()
    {
        if ($this->input->is_ajax_request()) {

            $term = $this->input->get('term');
            $eselon = $this->input->get('eselon');
            $id_kementrian = substr($this->input->get('nama_kl'), 0, 3);


            $sql = "SELECT * FROM tb_satker WHERE
                id_unit = '{$eselon}' AND
                id_kementrian = '{$id_kementrian}' AND
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
            echo json_encode($array);
        }
        exit();
    }

    public function save_identitas()
    {
        if ($this->input->post('tipe') == 'kl') {

            $this->form_validation->set_rules('tipe', 'Tipe');
            $this->form_validation->set_rules('nama_kl', 'Kode - Nama K/L', 'required');
            $this->form_validation->set_rules('eselon', 'Eselon', 'required');
            $this->form_validation->set_rules('kode_satker', 'Kode Satker', 'required');
            $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
            $this->form_validation->set_rules('jabatan_petugas', 'Jabatan Petugas', 'required');
            $this->form_validation->set_rules('no_hp', 'No. HP', 'required');
            $this->form_validation->set_rules('no_kantor', 'No. Kantor', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if ($this->form_validation->run()) {

                $tipe = $this->input->post('tipe');
                $nama_kl = $this->input->post('nama_kl');
                $eselon = $this->input->post('eselon');

                $kode_satker = $this->input->post('kode_satker');
                $nama_petugas = $this->input->post('nama_petugas');
                $jabatan_petugas = $this->input->post('jabatan_petugas');

                $no_hp = $this->input->post('no_hp');
                $no_kantor = $this->input->post('no_kantor');
                $email = $this->input->post('email');

                // Parsing Kode dan Nama KL jadi ID
                $id_satker = substr($kode_satker, 0, 6);

                // Simpan petugas Satker
                $sql = "INSERT INTO tb_petugas_satker
                    (id_satker, nama_petugas, jabatan_petugas, no_hp, email, no_kantor, tipe)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

                $this->db->query($sql, array($id_satker, $nama_petugas, $jabatan_petugas, $no_hp, $email, $no_kantor, $tipe));

                $last_id = $this->db->query("SELECT MAX(id_petugas_satker) last_id FROM `tb_petugas_satker`");
                $last_id = $last_id->result();
                $last_id = $last_id[0]->last_id;

                $sql = "INSERT INTO tb_tiket_helpdesk
                        (id_satker, tanggal, id_petugas_satket)
                        VALUES (?, ?, ?)";

                $this->db->query($sql, array($id_satker, date('Y-m-d'), $last_id));

                // Set tiket untuk helpdesk
                $last_id = $this->db->query("SELECT MAX(no_tiket_helpdesk) last_id FROM `tb_tiket_helpdesk`");
                $last_id = $last_id->result();
                $last_id = $last_id[0]->last_id;
                $this->session->set_userdata('tiket', (string)$last_id);

                redirect('/csa/helpdesk_form_pertanyaan');
            }

        } else {
            $this->form_validation->set_rules('nama_petugas', 'Nama', 'required');
            $this->form_validation->set_rules('instansi', 'Instansi', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('no_hp', 'Telpon', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


            if ($this->form_validation->run()) {
                $tipe = $this->input->post('tipe');
                $nama_petugas = $this->input->post('nama_petugas');
                $instansi = $this->input->post('instansi');
                $alamat = $this->input->post('alamat');
                $email = $this->input->post('email');
                $no_hp = $this->input->post('no_hp');

                // Simpan Nama orang umum
                $sql = "INSERT INTO tb_petugas_satker
                        (nama_petugas, instansi, alamat, email, no_hp, tipe)
                        VALUES (?, ?, ?, ?, ?, ?)";

                $this->db->query($sql, array($nama_petugas, $instansi, $alamat, $email, $no_hp, $tipe));

                $last_id = $this->db->query("SELECT MAX(id_petugas_satker) last_id FROM `tb_petugas_satker`");
                $last_id = $last_id->result();
                $last_id = $last_id[0]->last_id;

                $sql = "INSERT INTO tb_tiket_helpdesk
                        (id_satker, tanggal, id_petugas_satket)
                        VALUES (?, ?, ?)";

                $this->db->query($sql, array(NULL, date('Y-m-d'), $last_id));

                // Set tiket untuk helpdesk
                $last_id = $this->db->query("SELECT MAX(no_tiket_helpdesk) last_id FROM `tb_tiket_helpdesk`");

                $last_id = $last_id->result();
                $last_id = $last_id[0]->last_id;
                $this->session->set_userdata('tiket', (string)$last_id);

                redirect('/csa/helpdesk_form_pertanyaan/umum');
            }
        }

        $this->index();

    }


}

?>