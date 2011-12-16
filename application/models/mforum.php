<?php
class Mforum extends CI_Model
{
    public function get($limit = 20)
    {
        $sql = "SELECT * FROM `tb_forum` LEFT JOIN tb_kat_forum ON (tb_forum.id_kat_forum = tb_kat_forum.id_kat_forum) ";
        $sql .= "LIMIT {$limit}";
        return $this->db->query($sql);
    }

    public function get_categories()
    {
        $sql = "SELECT * FROM tb_kat_forum ORDER BY kat_forum ASC";
        return $this->db->query($sql);
    }

    public function add_forum($id_kat_forum, $judul_forum, $isi_forum, $file = '')
    {
        $sql = "INSERT INTO tb_forum (id_kat_forum, judul_forum, isi_forum, file)
                VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, array($id_kat_forum, $judul_forum, $isi_forum, $file));

    }

    public function get_one($id)
    {
        $sql = "SELECT * FROM `tb_forum` LEFT JOIN tb_kat_forum ON (tb_forum.id_kat_forum = tb_kat_forum.id_kat_forum) WHERE id_forum = '{$id}'";
        return $this->db->query($sql);
    }
}