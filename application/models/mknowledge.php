<?php
class Mknowledge extends CI_Model
{
    /**
     * Untuk menambah kategori baru pada knowledge base
     *
     * @param $name string
     * @return void
     */
    public function add_category($name)
    {
        $sql = "INSERT INTO `tb_kat_knowledge_base`
                (`id_kat_knowledge_base`, `kat_knowledge_base`)
                VALUES (NULL, '$name')";

        $this->db->query($sql);
    }
}