<?php
class Jawab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mknowledge');
    }

    public function index($id)
    {
        $sql = "SELECT *
                FROM tb_tiket_helpdesk
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_satker = tb_petugas_satker.id_satker
                WHERE no_tiket_helpdesk = '{$id}'";

        $result = $this->db->query($sql);
        $result = $result->row();

        // $sql2 = "SELECT * 
        //          FROM tb_tiket_helpdesk tkt
        //          LEFT JOIN tb_knowledge_base knw
        //          ON(tkt.id_knowledge_base = knw.id_knowledge_base)
        //          LEFT JOIN tb_kat_knowledge_base kat
        //          ON(knw.id_kat_knowledge_base = kat.id_kat_knowledge_base)
        //          WHERE tkt.no_tiket_helpdesk = '{$id}'";
        // $result2 = $this->db->query($sql);
        // $result2 = $result->row();

        // $data['kategori_jawaban'] = $result2->kat_knowledge_base;

        $data['title'] = 'Supervisor Jawab';
        $data['content'] = 'supervisor/jawab';

        $data['pertanyaan'] = $result;
        $this->load->view('new-template', $data);
    }

    public function eskalasi()
    {
        if ($this->input->post('submit') == 'Eskalasi') {

            $this->db->update('tb_tiket_helpdesk', array(
                'lavel' => 3
            ), array(
                'no_tiket_helpdesk' => $this->input->post('no_tiket_helpdesk')
            ));

            $this->_success(site_url('supervisors/list_pertanyaan'), 'Pertanyaan berhasil dieskalasi ke Kasi & Pelaksana', 5);

        }
    }

    public function do_jawab()
    {
        if ($this->input->post('submit') == 'Jawab') {

            // masukkan ke knowledge base
            $arr = array(
                'judul' => $this->input->post('pertanyaan'),
                'desripsi' => $this->input->post('description'),
                'jawaban' => $this->input->post('jawaban'),
                'nama_narasumber' => $this->input->post('nama_narasumber'),
                'jabatan_narasumber' => $this->input->post('jabatan_narasumber'),
                );
            $id_knowledge_base = $this->mknowledge->add($arr);

            // kembalikan ke helpdesk
            $this->db->update('tb_tiket_helpdesk', array(
                'lavel' => 1,
                'id_knowledge_base' => $id_knowledge_base,
                'jawab' => $this->input->post('jawaban'),
                'sumber' => $this->input->post('nama_narasumber')
            ), array(
                'id' => $this->input->post('id')
            ));

            $this->_success(site_url('supervisors/list_pertanyaan'), 'Pertanyaan berhasil dijawab', 5);
        }
    } 

    private function _success($url, $message, $time)
    {
        $data['url'] = $url;
        $data['message'] = $message;
        $data['time'] = $time;

        $this->load->view('helpdesk/success', $data);
    }
}