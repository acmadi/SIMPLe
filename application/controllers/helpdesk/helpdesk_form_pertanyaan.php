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

        $id_tiket = $this->session->userdata('id_tiket');
        $no_tiket = $this->session->userdata('no_tiket');

        $sql = "SELECT * FROM tb_tiket_helpdesk
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                WHERE no_tiket_helpdesk = ?";

        $result = $this->db->query($sql, array($no_tiket))->row();
        $data['identitas'] = $result;


        // List Pertanyaan Sebelumnya
        $result = $this->db->from('tb_tiket_helpdesk')
                ->join('tb_knowledge_base', 'tb_tiket_helpdesk.id_knowledge_base = tb_knowledge_base.id_knowledge_base')
                ->where('no_tiket_helpdesk', $this->session->userdata('no_tiket'))
                ->where('tb_tiket_helpdesk.id_knowledge_base !=', 'NULL')
                ->or_where('parent_id', sprintf('%05d', $this->session->userdata('id_tiket')))
                ->order_by('tanggal', 'DESC')
                ->get();

        //        echo $this->db->last_query() . "\n\n";

        //        print_r($result->result());

        if ($result->num_rows() > 0) {
            $data['pertanyaan_sebelumnya'] = $result;
        }

        $this->load->view('new-template', $data);
    }

    function umum()
    {
        $data['title'] = 'Helpdesk Form - Pertanyaan';
        $data['content'] = 'helpdesk/helpdesk/helpdesk_form_pertanyaan_umum';
        $data['knowledges'] = $this->mknowledge->get_all_category();

        $id_tiket = $this->session->userdata('id_tiket');
        $no_tiket = $this->session->userdata('no_tiket');

        $sql = "SELECT * FROM tb_tiket_helpdesk
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
                WHERE no_tiket_helpdesk = ?";

        $result = $this->db->query($sql, array($no_tiket))->row();
        $data['identitas'] = $result;


        // List Pertanyaan Sebelumnya
        $result = $this->db->from('tb_tiket_helpdesk')
                ->join('tb_knowledge_base', 'tb_tiket_helpdesk.id_knowledge_base = tb_knowledge_base.id_knowledge_base')
                ->where('no_tiket_helpdesk', $this->session->userdata('no_tiket'))
                ->where('tb_tiket_helpdesk.id_knowledge_base !=', 'NULL')
                ->or_where('parent_id', sprintf('%05d', $this->session->userdata('id_tiket')))
                ->order_by('tanggal', 'DESC')
                ->get();

        //        echo $this->db->last_query() . "\n\n";

        //        print_r($result->result());

        if ($result->num_rows() > 0) {
            $data['pertanyaan_sebelumnya'] = $result;
        }

        $this->load->view('new-template', $data);
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
<<<<<<< HEAD
			
		
=======

>>>>>>> c2f480f8efdb1ba0faff97f8f602bfeb0119cc81
            $result = $this->db->from('tb_tiket_helpdesk')
                    ->where('id', $this->session->userdata('id_tiket'))
                    ->get();

            if ($result->num_rows() == 0) {

                //                $sql = "INSERT INTO tb_tiket_helpdesk (prioritas, pertanyaan, description, id_satker, parent_id, tanggal)
                //                        VALUES(?, ?, ?, ?, ?, ?)";
                //
                //                $this->db->query($sql, array($prioritas, $pertanyaan, $description, $this->session->userdata('id_satker'), $no_tiket_helpdesk, date('Y-m-d H:i:s')));

                //                echo "insert"; echo $this->db->last_query(); exit();


                $data = array(
                    'prioritas' => $prioritas,
                    'pertanyaan' => $pertanyaan,
                    'description' => $description,
                    'id_satker' => $this->session->userdata('id_satker'),
                    'parent_id' => $this->session->userdata('id_tiket'),
                    'tanggal' => date('Y-m-d H:i:s'),
                    'no_tiket_helpdesk' => $this->session->userdata('no_tiket')
                );

                $this->db->insert('tb_tiket_helpdesk', $data);
                $this->session->set_userdata('id_tiket', $this->db->insert_id());

            } else {

                //                echo "update"; echo $this->db->last_query(); exit();

                $sql = "UPDATE tb_tiket_helpdesk SET
                        prioritas = ?, pertanyaan = ?, description = ?
                        WHERE id = ?";
                $this->db->query($sql, array($prioritas, $pertanyaan, $description, $this->session->userdata('id_tiket')));

            }

            // $result = $this->db->query("SELECT * FROM tb_knowledge_base WHERE id_kat_knowledge_base = '$kategori_knowledge_base'");

            $result = $this->mknowledge->get_all_data_category();

            $data['result'] = $this->db->query("SELECT * FROM tb_knowledge_base WHERE judul LIKE '%{$pertanyaan}%' OR desripsi LIKE '%{$pertanyaan}%'");

            $sql = "SELECT * FROM tb_tiket_helpdesk
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                WHERE no_tiket_helpdesk = ?";

            $result = $this->db->query($sql, array($this->session->userdata('no_tiket')))->row();
            $data['identitas'] = $result;
            $this->log->create("Pertanyaan baru di Helpdesk #{$no_tiket_helpdesk}");
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

<<<<<<< HEAD
		$this->load->view('new-template', $data);

    }
	
function masuk()
=======
        $cari = $this->input->post('pertanyaan');

        $array = explode(' ', $cari);
        $gabung = 'SELECT * FROM tb_knowledge_base WHERE ';
        foreach ($array as $key => $value) {
            if (count($array) - 1 == $key) {
                $gabung .= "judul LIKE '%" . $value . "%'\n";
            } else
            {
                $gabung .= "judul LIKE '%" . $value . "%' OR\n";
            }
        }
        $result = $this->db->query($gabung);

        $data['knowledge'] = $result;

        $this->load->view('new-template', $data);
    }

    public function cari()
    {
        $cari = $this->input->get('pertanyaan');
        $array = explode(' ', $cari);
        $gabung = 'SELECT * FROM tb_knowledge_base WHERE ';
        foreach ($array as $key => $value) {
            if (count($array) - 1 == $key) {
                $gabung .= "judul LIKE '%" . $value . "%'\n";
            } else
            {
                $gabung .= "judul LIKE '%" . $value . "%' OR\n";
            }
        }
        $result = $this->db->query($gabung);


        //        echo json_encode($result->result(), JSON_FORCE_OBJECT);
        echo '<ul style="list-style: inside;">';
        foreach ($result->result() as $value) {
            echo "<li>
                    <a href=\"javascript:void(0)\" class=\"referensi-jawaban\" title=\"{$value->id_knowledge_base}\">{$value->judul}</a>
                 </li>";
        }
        echo '</ul>';
    }

    function masuk()
>>>>>>> c2f480f8efdb1ba0faff97f8f602bfeb0119cc81
    {
        $data = array();

        if ($_POST) {
            $no_tiket_helpdesk = $this->input->post('no_tiket_helpdesk');
            $kategori_knowledge_base = $this->input->post('kategori_knowledge_base');
            $prioritas = $this->input->post('prioritas');
            $pertanyaan = $this->input->post('pertanyaan');
            $description = $this->input->post('description');

            $result = $this->db->from('tb_tiket_helpdesk')
                    ->where('id', $this->session->userdata('id_tiket'))
                    ->get();

            if ($result->num_rows() == 0) {

                //                $sql = "INSERT INTO tb_tiket_helpdesk (prioritas, pertanyaan, description, id_satker, parent_id, tanggal)
                //                        VALUES(?, ?, ?, ?, ?, ?)";
                //
                //                $this->db->query($sql, array($prioritas, $pertanyaan, $description, $this->session->userdata('id_satker'), $no_tiket_helpdesk, date('Y-m-d H:i:s')));

                //                echo "insert"; echo $this->db->last_query(); exit();

                $data = array(
                    'prioritas' => $prioritas,
                    'pertanyaan' => $pertanyaan,
                    'description' => $description,

                    'parent_id' => $this->session->userdata('id_tiket'),
                    'tanggal' => date('Y-m-d H:i:s'),
                    'no_tiket_helpdesk' => $this->session->userdata('no_tiket')
                );

                $this->db->insert('tb_tiket_helpdesk', $data);
                $this->session->set_userdata('id_tiket', $this->db->insert_id());

            } else {

                //                echo "update"; echo $this->db->last_query(); exit();

                $sql = "UPDATE tb_tiket_helpdesk SET
                        prioritas = ?, pertanyaan = ?, description = ?
                        WHERE id = ?";
                $this->db->query($sql, array($prioritas, $pertanyaan, $description, $this->session->userdata('id_tiket')));

            }

            // $result = $this->db->query("SELECT * FROM tb_knowledge_base WHERE id_kat_knowledge_base = '$kategori_knowledge_base'");

            $result = $this->mknowledge->get_all_data_category();

            $data['result'] = $this->db->query("SELECT * FROM tb_knowledge_base WHERE judul LIKE '%{$pertanyaan}%' OR desripsi LIKE '%{$pertanyaan}%'");

            $sql = "SELECT * FROM tb_tiket_helpdesk
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
                WHERE no_tiket_helpdesk = ?";

            $result = $this->db->query($sql, array($this->session->userdata('no_tiket')))->row();
            $data['identitas'] = $result;
            $this->log->create("Pertanyaan baru di Helpdesk #{$no_tiket_helpdesk}");
        }

        $data['title'] = 'Helpdesk Form - Pertanyaan';
        $data['content'] = 'helpdesk/helpdesk/helpdesk_form_pertanyaan_masuk';

        $knowledges = $this->db->query("SELECT * FROM tb_knowledge_base WHERE judul LIKE '%{$pertanyaan}%' OR desripsi LIKE '%{$pertanyaan}%' OR jawaban LIKE '%{$pertanyaan}%'");

        $data['knowledges'] = $knowledges;

        // Kategori Knowledge Base
        $result = $this->db->query("SELECT * FROM tb_kat_knowledge_base WHERE id_kat_knowledge_base = '{$kategori_knowledge_base}'")->row();
        $data['kategori_knowledge_base'] = $result->kat_knowledge_base;

        $data['prioritas'] = $prioritas;
        $data['pertanyaan'] = $pertanyaan;
        $data['description'] = $description;


        $this->load->view('new-template', $data);
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
