<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {


	function Ajax(){
		parent::__construct();

		$this->load->model('msatker', 'satker');
	}

	function get_nama_satker($id_satker){
		$satker = $this->satker->get_satker($id_satker);

		if (is_object($satker)) : 
			echo $satker->nama_satker;
		else :
			
		endif;
	}

	function get_petugas_satker($id_satker){
		$data['petugas'] = $this->satker->get_petugas_by_satker($id_satker);

		$this->load->view('pengaduan/petugas_json', $data);
	}

}
?>