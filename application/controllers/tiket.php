<?php
class Tiket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cek_tiket()
    {
        if ($_POST) {
            $sql = "SELECT  no_tiket_frontdesk, a.id_unit, nama_unit, a.id_kementrian, nama_kementrian, keputusan, status, tanggal_selesai
                    FROM tb_tiket_frontdesk a
                    JOIN tb_kementrian b ON b.id_kementrian = a.id_kementrian
                    JOIN tb_unit c ON c.id_unit = a.id_unit AND c.id_kementrian = a.id_kementrian
                    WHERE a.no_tiket_frontdesk = ?";
            $result = $this->db->query($sql, array($this->input->post('no_tiket')));

            if ($result->num_rows() == 0) {
                $this->session->set_flashdata('error', 'Tiket tidak ditemukan');
                redirect('/tiket/cek_tiket');
            }

            $data['tiket'] = $result->row();
        }
        $data['title'] = 'Cek Tiket';
        $data['no_tiket'] = $this->input->post('no_tiket');
        $data['content'] = 'public/cek_tiket';

        $this->load->view('new-template-tiket', $data);
    }

    public function frontdesk($no_tiket_frontdesk)
    {
        header('Content-type: application/json');

        $result = $this->db->from('tb_tiket_frontdesk')
                ->select('no_tiket_frontdesk AS tiket_id,
                          id_satker AS satker_id,
                          keputusan,
                          status,
                          tanggal_selesai
                          ')
                ->where('no_tiket_frontdesk', $no_tiket_frontdesk)
                ->get()->row();

        echo json_encode($result);
    }

    public function helpdesk($no_tiket_helpdesk)
    {
        header('Content-type: application/json');

        $result = $this->db->from('tb_tiket_frontdesk')
                ->select('no_tiket_frontdesk AS tiket_id, id_satker')
                ->where('no_tiket_frontdesk', $no_tiket_helpdesk)
                ->get()->row();

        echo json_encode($result);
    }
}