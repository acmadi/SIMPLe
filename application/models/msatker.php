<?php
class Msatker extends CI_Model
{
    /**
     * @param $cs Nomer CS (A, B, C, D atau E)
     * @return Integer
     */
    public function antrian_terakhir($cs)
    {
        $sql = "SELECT MAX(number) number FROM `antrian` WHERE cs='{$cs}'";
        $result = $this->db->query($sql);
        $temp = $result->result();
        $temp = $temp[0];
        return $temp->number;
    }

    /**
     * Naikin angka antrian
     *
     * @param $cs Nomer CS (A, B, C, D atau E)
     * @return void
     */
    public function plusone($cs)
    {
        $cs = strtoupper($cs);
        $antrian_terakhir = $this->antrian_terakhir($cs) + 1;
        $this->db->query("INSERT INTO `antrian` (number, cs) VALUES ('{$antrian_terakhir}', '{$cs}')");
    }

    /**
     * Reset angka antrian
     *
     * @param $cs Nomer CS (A, B, C, D atau E)
     * @return void
     */
    public function reset_antrian($cs)
    {
        
    }


    /**
     * Mencari semua petugas_satker berdasarkan id_satker-nya
     *
     * @param $id_satker dari tb_satker
     * @return array dari semua petugas dari satker tsb 
     * 
     * ini pake javadoc ya? sori gak pake IDE, asal kopas aja yg penting bisa dipahami :p
     * -akhyar
     */
    public function get_petugas_by_satker($id_satker)
    {
        $sql = "SELECT * FROM tb_petugas_satker WHERE id_satker=$id_satker";
        $result = $this->db->query($sql)->result();

        return $result;
    }

    /**
     * Get satker info
     *
     * @param $id_satker dari tb_satker
     * @return object satker tsb 
     * 
     */
    public function get_satker($id_satker)
    {
        $sql = "SELECT * FROM tb_satker WHERE id_satker='$id_satker'";
        $row = $this->db->query($sql)->row();
        
        return $row;
    }

    public function get_petugas_satker($id_petugas = NULL)
    {
        if ($id_petugas != NULL) :
            $where = "WHERE id_petugas_satker=$id_petugas";
        endif;

        $sql = "SELECT * FROM tb_petugas_satker $where";
        $result = ($id_petugas == NULL) ? 
            $this->db->query($sql)->result() :
            $this->db->query($sql)->row() 
            ;

        return $result;
    }
}