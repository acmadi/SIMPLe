<?php
class Mforum extends CI_Model
{
    public function get($limit = 20)
    {
        $sql = "SELECT * FROM `tb_forum` LEFT JOIN tb_kat_forum ON (tb_forum.id_kat_forum = tb_kat_forum.id_kat_forum) ";
        $sql .= "LIMIT {$limit}";
        return $this->db->query($sql);
    }
}