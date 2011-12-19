<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mfrontdesk extends CI_Model
{

    public function get_all_tiket($key = '', $value = '')
    {
        $cond = '';
        if ($key != '' AND $value != '') :
            $cond = ' WHERE ' . $key . " LIKE '%" . $value . "%' ";
        endif;

        $q = $this->db->query(
            'SELECT *
			 FROM tb_tiket_frontdesk tkt JOIN tb_satker stkr
			 ON (tkt.id_satker = stkr.id_satker)
			' . $cond
        );

        return $q->result();
    }

    public function count_all_tiket($status = 'open')
    {
        $result = $this->db->query("SELECT no_tiket_frontdesk FROM tb_tiket_frontdesk WHERE status = '{$status}'");
        return $result->num_rows();
    }

    public function get_by_id($id)
    {
        $sql = "SELECT *
                FROM tb_tiket_frontdesk
                JOIN tb_petugas_satker
                ON tb_tiket_frontdesk.id_petugas_satker = tb_petugas_satker.id_petugas_satker
                JOIN tb_satker
                ON tb_tiket_frontdesk.id_satker = tb_satker.id_satker
                WHERE no_tiket_frontdesk = ?";

        $result = $this->db->query($sql, array($id));
        $result = $result->result();
        return $result[0];
    }
}