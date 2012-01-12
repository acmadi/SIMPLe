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
            $result = $this->db->from('tb_tiket_frontdesk')
                    ->select('no_tiket_frontdesk,
                                  id_unit,
                                  keputusan,
                                  status,
                                  tanggal_selesai
                                  ')
                    ->where('no_tiket_frontdesk', $this->input->post('no_tiket'))
                    ->where('id_unit', $this->input->post('id_unit'))
                    ->get();

            if ($result->num_rows() == 0) {
                $this->session->set_flashdata('error', 'Tiket tidak ditemukan');
                redirect('/tiket/cek_tiket');
            }

            $data['tiket'] = $result->row();
        }
        $data['title'] = 'Cek Tiket';
        $data['content'] = 'public/cek_tiket';

        $this->load->view('new-template', $data);
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