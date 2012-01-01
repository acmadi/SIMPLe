<?php
class Kb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function q($keyword, $format = 'json')
    {
        $sql = "SELECT `judul`, `jawaban`, `kat_knowledge_base`
                FROM (`tb_knowledge_base` a)
                JOIN `tb_kat_knowledge_base` b
                ON `a`.`id_kat_knowledge_base` = `b`.`id_kat_knowledge_base`
                WHERE `is_public` = '1' AND
                (`a`.`judul` LIKE '%?%' OR `a`.`jawaban` LIKE '%?%')";

        $result = $this->db->query($sql);
        $result = $result->result();


        if ($format == 'json') {
            $json = json_encode($result, JSON_FORCE_OBJECT);

            header('Content-type: application/json');

            $string = $json;
            $pattern = array(',"', '{', '}');
            $replacement = array(",\n\t\"", "{\n\t", "\n}");
            echo str_replace($pattern, $replacement, $string);

        } elseif ($format == 'xml') {
            print_r($this->_xml($result));
        }

    }

    public function _xml($data)
    {
        $this->load->library('xmlrpc');
        $this->xmlrpc->request($data);
        return $this->xmlrpc->display_response();
    }
}