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
		header('Content-type: application/json');

		$petugas = $this->satker->get_petugas_by_satker($id_satker);

		if (is_array($petugas)) :
			echo '
				{
				"petugas": [';

			for($i = 0; $i < count($petugas); $i++) :
				echo '{';
				echo '"id_petugas_satker": "' . $petugas[$i]->id_petugas_satker . '",';
				echo '"nama_petugas": "' . $petugas[$i]->nama_petugas . '",';
				echo '"jabatan_petugas": "' . $petugas[$i]->jabatan_petugas . '",';
				echo '"no_hp": "' . $petugas[$i]->no_hp . '"';
				echo '}';

				if ($i < count($petugas) - 1) :
					echo ',';
				endif;
			endfor;

			echo ']
				}';

		else :
			$petugas = array();
		endif;
	}

}

