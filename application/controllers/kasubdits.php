<?php
class Kasubdits extends CI_Controller
{
    public $template = 'new-template.php';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
        $this->load->helper('tanggal');
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data['helpdesk_total'] = $this->mhelpdesk->count_all_tiket('open', 3);
        $data['total_selesai_oleh_cs'] = $this->mhelpdesk->count_all_closed_ticket_by();
        $data['title'] = 'Dashboard';
        $data['content'] = 'kasubdit/dashboard';
        $this->load->view($this->template, $data);
    }

    public function list_pertanyaan()
    {
        $sort = '';
        $sql = '';

        if (isset($_GET['sort'])) {
            $sort = $this->input->get('sort');
            $sql = "SELECT * FROM tb_tiket_helpdesk
                   JOIN tb_satker
                   ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                   WHERE
                   status = 'open' AND
                   lavel = 2
                   ORDER BY {$sort} DESC";
        } else {
            $sql = "SELECT * FROM tb_tiket_helpdesk
                   JOIN tb_satker
                   ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                   WHERE
                   status = 'open' AND
                   lavel = 2";
        }

        $result = $this->db->query($sql);

        $data['title'] = 'Knowledge Base';
        $data['content'] = 'kasubdit/list_pertanyaan';
        $data['pertanyaan'] = $result;
        $this->load->view($this->template, $data);

    }

    public function jawab($id)
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

        $data['title'] = 'Kasubdit Jawab';
        $data['content'] = 'kasubdit/jawab';

        $data['pertanyaan'] = $result;
        $this->load->view($this->template, $data);
    }

    public function eskalasi()
    {
        if ($this->input->post()) {

            $this->db->update('tb_tiket_helpdesk', array(
                'lavel' => 3
            ), array(
                'no_tiket_helpdesk' => $this->input->post('no_tiket_helpdesk')
            ));

            $this->_success(site_url('kasubdit/list_pertanyaan'), 'Pertanyaan berhasil dieskalasi ke Kasi & Pelaksana', 5);

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
