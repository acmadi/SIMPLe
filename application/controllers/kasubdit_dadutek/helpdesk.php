<?php
class Helpdesk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
    }

    function index()
    {
        $this->search(NULL);
    }

    function search($keyword = NULL)
    {
        $keyword = ($this->input->post('keyword'))
                ? $this->input->post('keyword')
                : NULL;
        $keyword = ($keyword != NULL)
                ? "AND tb_satker.id_satker LIKE '%$keyword%'"
                : '';
        $sql = "SELECT * FROM tb_tiket_helpdesk JOIN tb_satker
                                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                                WHERE
                                status = 'open' AND
                                lavel = 4 AND
                                level_2 = 2";

        $data['antrian'] = $this->db->query($sql);

        $data['title'] = 'Konsultasi Help Desk';
        $data['content'] = 'kasubdit_dadutek/helpdesk';
        $this->load->view('new-template', $data);
    }

    function view($id)
    {
        $data['title'] = 'Cek Tiket';
        $data['content'] = 'kasubdit_dadutek/helpdesk_view';
        $data['antrian'] = $this->mhelpdesk->get_by_id($id);

        $this->load->view('new-template', $data);
    }

    // TODO: Untuk konsistensi, mungkin sebaiknya eskalasi dan jawab dipisah. Atau ganti nama eskalasi() dengan nama tertentu
    function eskalasi()
    {
        if ($this->input->post('submit') == 'Eskalasi') {

            $this->db->update('tb_tiket_helpdesk', array(
                'lavel' => 5,
                'level_2' => 0
            ), array(
                'no_tiket_helpdesk' => $this->input->post('no_tiket_helpdesk')
            ));

            $this->_success(site_url('kasubdit_dadutek/helpdesk'), 'Pertanyaan berhasil dieskalasi ke Direktur', 5);

        }

        if ($this->input->post('submit') == 'Jawab') {

            $this->db->update('', array(
                'jawaban' => $this->input->post('jawaban'),
                'nama_narasumber' => $this->input->post('nama_narasumber'),
                'jabatan_narasumber' => $this->input->post('jabatan')
            ), array(
                'no_tiket_helpdesk' => $this->input->post('no_tiket_helpdesk')
            ));

            $this->db->insert('tb_knowledge_base', array(
                'judul' => $this->input->post('pertanyaan'),
                'jawaban' => $this->input->post('jawaban'),
                'nama_narasumber' => $this->input->post('nama_narasumber'),
                'jabatan_narasumber' => $this->input->post('jabatan')
            ));

            $this->_success(site_url('kasubdit_dadutek/helpdesk'), 'Pertanyaan telah berhasil dijawab dan telah dimasukkan ke knowledge base', 5);
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
