<?php
require_once(FCPATH . 'library/odtphp/odf.php');
class Odtphp
{
    public $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->print_template_path = FCPATH . 'print-template/';
    }

    public function create($tiket, $tanggal_terakhir, $pukul)
    {
        //$this->CI->load->library('session');
        //$this->CI->db->insert('tb_logs', $data);
        $odf = new odf($this->print_template_path . 'BALD.odt');
//        $odf->setVars('var1', $nomer);
        $odf->setVars('var2', date('d-m-Y'));
        $odf->setVars('var3', date('d-m-Y'));
        $odf->setVars('var4', $tiket);
        $odf->setVars('var5', $tanggal_terakhir);
        $odf->setVars('var6', $pukul);
        $output_filename = 'BALD_' . $tiket . '.odt';
        $odf->saveToDisk( FCPATH . 'output/' . $output_filename);
        return array(
            'full_filename' => FCPATH . 'output/' . $output_filename,
            'filename' => $output_filename
        );
    }
}