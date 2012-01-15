<?php
class Msatker extends CI_Model
{
    
   
    public function get_unit($id_unit)
    {
        $sql = "SELECT * FROM tb_unit WHERE id_unit='$id_unit'";
        $row = $this->db->query($sql)->row();
        
        return $row;
    }

   
}