<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mhelpdesk extends CI_Model
{


    public function get_all_tiket($key = '', $value = '')
    {
        $cond = '';
        if ($key != '' AND $value != '') :
            $cond = ' WHERE ' . $key . " LIKE '%" . $value . "%' ";
        endif;

        $q = $this->db->query(
            'SELECT *, concat(no_tiket_helpdesk, \' \', no_antrian) AS no_tiket
			 FROM tb_tiket_helpdesk tkt JOIN tb_petugas_satker ptgs JOIN tb_satker stkr
			 ON (tkt.id_petugas_satket = ptgs.id_petugas_satker)
			 AND (ptgs.id_satker = stkr.id_satker)
			' . $cond
        );

        return $q->result();
    }

    public function count_all_tiket($status = 'open')
    {
        $result = $this->db->query("SELECT no_tiket_helpdesk FROM tb_tiket_helpdesk WHERE status = '{$status}'");
        return $result->num_rows();
    }

    public function get_by_id($id)
    {
        $sql = "SELECT *
                FROM tb_tiket_helpdesk
                JOIN tb_petugas_satker
                ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
                JOIN tb_satker
                ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
                WHERE no_tiket_helpdesk = ?";

        $result = $this->db->query($sql, array($id));
        $result = $result->result();
        return $result[0];
    }

}