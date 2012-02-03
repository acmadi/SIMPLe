<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
Class Referensi extends CI_Controller
{
    public function Referensi()
    {
        parent::__construct();
    }

    public function index()
    {
    	$result = $this->db->query("SELECT * FROM tb_referensi a 
									JOIN tb_referensi_kat b 
									ON a.id_referensi_kat = b.id_referensi_kat");


		$data['referensi'] = $result;

        $data['kategori_referensi'] = $this->db->query("SELECT * FROM tb_referensi_kat");
		$data['title'] = 'Referensi';
		$data['content'] = 'referensi/referensi';
		$this->load->view('new-template', $data);
    }
}
