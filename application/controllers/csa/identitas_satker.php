<?php
class Identitas_satker extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
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
        //        if ($this->input->is_ajax_request()) {

        $id_kementrian = $this->input->get('id_kementrian');

        $result = $this->db->query("SELECT * FROM tb_unit WHERE id_kementrian = ?", array($id_kementrian));

        if ($result->num_rows() > 0) {
            $result = $result->result();

            foreach ($result as $value) {
                echo sprintf('<option value="%s">%s - %s</option>', $value->id_unit, $value->id_unit, $value->nama_unit);
            }
        }
        exit();
    }

    public function save_identitas()
    {
        if ($this->input->post('tipe') == 'kl') {
            $tipe = $this->input->post('tipe');
            $id_satker = $this->input->post('id_satker');
            $nama_petugas = $this->input->post('nama_petugas');
            $jabatan_petugas = $this->input->post('jabatan_petugas');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $no_kantor = $this->input->post('no_kantor');

            $sql = "INSERT INTO tb_petugas_satker
                    (id_satker, nama_petugas, jabatan_petugas, no_hp, email, no_kantor, tipe)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $this->db->query($sql, array($id_satker, $nama_petugas, $jabatan_petugas, $no_hp, $email, $no_kantor, $tipe));

        } else {
            $tipe = $this->input->post('tipe');
            $nama_petugas = $this->input->post('nama_petugas');
            $instansi = $this->input->post('instansi');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');

            $sql = "INSERT INTO tb_petugas_satker
                    (nama_petugas, instansi, alamat, email, no_hp, tipe)
                    VALUES (?, ?, ?, ?, ?, ?)";

            $this->db->query($sql, array($nama_petugas, $instansi, $alamat, $email, $no_hp, $tipe));
        }

        redirect('/csa/helpdesk_form_pertanyaan');
    }


}

?>