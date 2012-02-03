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
        $data['title'] = 'Isi Identitas Satker';
        $data['content'] = 'helpdesk/identitas_satker';
        $this->load->view('new-template', $data);
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

    /**
     * Digunakan untuk mencari Eselon.
     * Output berupa <option value="kode_eselon">nama_eselon</option>
     *
     * @param $id_kementrian Kode Kementrian (e.g 002, 014)
     * @output HTML
     */
    //FIXME: Ini seharusnya cari_eselon(). Data Eselon diambil setelah mendapatkan kode kementrian
    function cari_kl($id_kementrian)
    {

        /* INFO:
           $select digunakan saat validasi gagal dan untuk tetap memlilih opsi terakhir tetap terpilih.
           Method set_value() tidak bisa digunakan di controller. Sehingga set_value('eselon') dikirim
           kembali ke controller untuk diproses. Lihat views/helpdesk/identitas_satker pada Nama Eselon,
           ada file_get_contents()
        */
        $select = $this->input->get('select');

        $id_kementrian = substr($id_kementrian, 0, 3);

        $result = $this->db->query("SELECT * FROM tb_unit WHERE id_kementrian = ?", array($id_kementrian));

        if ($result->num_rows() > 0) {
            $result = $result->result();

            foreach ($result as $value) {
                if ($select AND $select == $value->id_unit) {
                    echo sprintf('<option selected value="%s">%s - %s</option>', $value->id_unit, $value->id_unit, $value->nama_unit);
                } else {
                    echo sprintf('<option value="%s">%s - %s</option>', $value->id_unit, $value->id_unit, $value->nama_unit);
                }
            }
        }
        exit();
    }


    /**
     * Digunakan untuk mencari Satker.
     * Output berupa <option value="kode_satker">nama_satker</option>
     *
     * @param $id_kementrian Kode Kementrian (e.g 002, 014)
     * @param $eselon Kode Eselon (e.g 01, 06)
     * @output HTML
     */
    function cari_satker($id_kementrian, $eselon)
    {
            $sql = "SELECT * FROM tb_satker WHERE
                id_kementrian = ? AND id_unit = ?
                ORDER BY id_unit";

            $result = $this->db->query($sql, array($id_kementrian, $eselon));

            if ($result->num_rows() > 0) {
                foreach ($result->result() as $value) {
                    echo sprintf('<option value="%s">%s</option>', $value->id_satker, $value->nama_satker);
                }
            }
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

                // Simpan Petugas Satker
                $sql = "INSERT INTO tb_petugas_satker
                    (id_satker, nama_petugas, jabatan_petugas, no_hp, email, no_kantor, tipe)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
                $this->db->query($sql, array($id_satker, $nama_petugas, $jabatan_petugas, $no_hp, $email, $no_kantor, $tipe));
                $id_petugas_satker = $this->db->insert_id();


                // Simpan Tiket Baru
                $last_tiket_number = $this->db->select_max('no_tiket_helpdesk')->get('tb_tiket_helpdesk')->row();
                $last_tiket_number = $last_tiket_number->no_tiket_helpdesk + 1;

                $sql = "INSERT INTO tb_tiket_helpdesk
                        (no_tiket_helpdesk, id_satker, tanggal, id_petugas_satket, lavel)
                        VALUES (?, ?, ?, ?, 1)";
                $this->db->query($sql, array($last_tiket_number, $id_satker, date('Y-m-d'), $id_petugas_satker));
                $id_tiket = $this->db->insert_id();

                $sql = "SELECT no_tiket_helpdesk FROM tb_tiket_helpdesk WHERE id='{$id_tiket}'";
                $result = $this->db->query($sql)->row();

                // Set tiket untuk helpdesk
                $this->session->set_userdata('id_petugas_satker', $id_petugas_satker);
                $this->session->set_userdata('id_satker', $id_satker);
                $this->session->set_userdata('id_tiket', $id_tiket);
                $this->session->set_userdata('no_tiket', $last_tiket_number);

                $this->log->create("Tiket baru di Helpdesk #{$last_tiket_number}");

                redirect('/helpdesk/helpdesk_form_pertanyaan');
            }

        } else {
            $this->form_validation->set_rules('nama_petugas', 'Nama', 'required');
            $this->form_validation->set_rules('instansi', 'Instansi', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('no_hp', 'Telepon', 'required');
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
                        ( nama_petugas, instansi, alamat, email, no_hp, tipe)
                        VALUES (?, ?, ?, ?, ?, ?)";
                $this->db->query($sql, array($nama_petugas, $instansi, $alamat, $email, $no_hp, $tipe));
				$id_petugas_satker = $this->db->insert_id();







                // Set tiket untuk helpdesk
				$last_tiket_number = $this->db->select_max('no_tiket_helpdesk')->get('tb_tiket_helpdesk')->row();
                $last_tiket_number = $last_tiket_number->no_tiket_helpdesk + 1;

                $sql = "INSERT INTO tb_tiket_helpdesk
                        (no_tiket_helpdesk, id_satker, tanggal, id_petugas_satket, lavel)
                        VALUES (?, ?, ?, ?, 1)";
                $this->db->query($sql, array($last_tiket_number, $id_satker, date('Y-m-d'), $id_petugas_satker));
                $id_tiket = $this->db->insert_id();

                $sql = "SELECT no_tiket_helpdesk FROM tb_tiket_helpdesk WHERE id='{$id_tiket}'";
                $result = $this->db->query($sql)->row();

                // Set tiket untuk helpdesk
                $this->session->set_userdata('id_petugas_satker', $id_petugas_satker);
                $this->session->set_userdata('id_satker', $id_satker);
                $this->session->set_userdata('id_tiket', $id_tiket);
                $this->session->set_userdata('no_tiket', $last_tiket_number);

                $this->log->create("Tiket baru di Helpdesk #{$last_tiket_number}");




                redirect('/helpdesk/helpdesk_form_pertanyaan/umum');
            }
        }

        $this->index();

    }


}

?>