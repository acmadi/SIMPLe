<?php
class Mkementrian extends CI_Model
{

    public function get_kementrian($id_kementrian)
    {
        $sql = "SELECT * FROM tb_kementrian WHERE id_kementrian='$id_kementrian'";
        $row = $this->db->query($sql)->row();
        
        return $row;
    }
}
    