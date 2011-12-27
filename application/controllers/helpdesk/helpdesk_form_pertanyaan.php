<?php
class Helpdesk_form_pertanyaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mknowledge');
        $this->load->model('mhelpdesk');
    }

    function index()
    {
        $data['title'] = 'Helpdesk Form - Pertanyaan';
        $data['content'] = 'helpdesk/helpdesk/helpdesk_form_pertanyaan';
        $data['knowledges'] = $this->mknowledge->get_all_category();

        $result = $this->db->query("SELECT MAX(no_tiket_helpdesk) last_tiket FROM tb_tiket_helpdesk");
        $result = $result->result();
        $last_tiket = $result[0]->last_tiket;

        $sql = "SELECT * FROM tb_tiket_helpdesk
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                WHERE no_tiket_helpdesk = ?";

        $result = $this->db->query($sql, array($last_tiket));
        $result = $result->result();

        $result = $result[0];
        $data['identitas'] = $result;

        $this->load->view('master-template', $data);
    }

    function umum()
    {
        $data['title'] = 'Helpdesk Form - Pertanyaan';
        $data['content'] = 'helpdesk/helpdesk/helpdesk_form_pertanyaan_umum';
        $data['knowledges'] = $this->mknowledge->get_all_category();

        $sql = "SELECT * FROM tb_tiket_helpdesk a
                JOIN tb_petugas_satker b
                ON a.id_petugas_satket = b.id_petugas_satker
                WHERE no_tiket_helpdesk = ?";

        $result = $this->db->query($sql, array($this->session->userdata('tiket')));
        $result = $result->result();
        $result = $result[0];

        $data['identitas'] = $result;

        $this->load->view('master-template', $data);
    }

    function submit()
    {
        $data = array();

        if ($_POST) {
            $no_tiket_helpdesk = $this->input->post('no_tiket_helpdesk');
            $kategori_knowledge_base = $this->input->post('kategori_knowledge_base');
            $prioritas = $this->input->post('prioritas');
            $pertanyaan = $this->input->post('pertanyaan');
            $description = $this->input->post('description');

            $sql = "UPDATE tb_tiket_helpdesk SET
                    prioritas = ?, pertanyaan = ?, description = ?
                    WHERE no_tiket_helpdesk = ?";

            $this->db->query($sql, array($prioritas, $pertanyaan, $description, $no_tiket_helpdesk));

            // $result = $this->db->query("SELECT * FROM tb_knowledge_base WHERE id_kat_knowledge_base = '$kategori_knowledge_base'");

            $result = $this->mknowledge->get_all_data_category();

            $data['result'] = $this->db->query("SELECT * FROM tb_knowledge_base WHERE judul LIKE '%{$pertanyaan}%' OR desripsi LIKE '%{$pertanyaan}%'");

            $sql = "SELECT * FROM tb_tiket_helpdesk
                    JOIN tb_petugas_satker
                    ON tb_tiket_helpdesk.id_satker = tb_petugas_satker.id_satker
                    JOIN tb_satker
                    ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                    WHERE no_tiket_helpdesk = ?";

            $result = $this->db->query($sql, array($this->session->userdata('tiket')))->row();
            $data['identitas'] = $result;
        }

        $data['title'] = 'Helpdesk Form - Pertanyaan';
        $data['content'] = 'helpdesk/helpdesk/helpdesk_form_pertanyaan_submit';

        $knowledges = $this->db->query("SELECT * FROM tb_knowledge_base WHERE judul LIKE '%{$pertanyaan}%' OR desripsi LIKE '%{$pertanyaan}%' OR jawaban LIKE '%{$pertanyaan}%'");

        $data['knowledges'] = $knowledges;

        // Kategori Knowledge Base
        $result = $this->db->query("SELECT * FROM tb_kat_knowledge_base WHERE id_kat_knowledge_base = '{$kategori_knowledge_base}'")->row();
        $data['kategori_knowledge_base'] = $result->kat_knowledge_base;

        $data['prioritas'] = $prioritas;
        $data['pertanyaan'] = $pertanyaan;
        $data['description'] = $description;


        $this->load->view('master-template', $data);
    }

    function popup_ref_jawaban($id)
    {
        $data['title'] = 'Helpdesk Form - Pertanyaan';

        $result = $this->db->query("SELECT * FROM tb_knowledge_base WHERE id_knowledge_base = '$id'");
        $result = $result->result();
        $result = $result[0];

        $data['judul'] = $result->judul;
        $data['desripsi'] = $result->desripsi;
        $data['jawaban'] = $result->jawaban;

        $this->load->view('helpdesk/helpdesk/popup-referensi-jawaban', $data);
    }

}
