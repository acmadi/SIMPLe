<?php
class Munit extends CI_Model {

    public function delete($kode_unit) {
        $sql = "DELETE FROM tb_unit WHERE kode_unit = ?";
        return $this->db->query($sql, array($kode_unit));
    }

    public function update($kode_unit) {
        $sql = "UPDATE FROM tb_unit () VALUES () WHERE kode_unit = ?";
        $this->db->query($sql, array());
    }
}