<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Cuman controller SandBox buat iseng (coba-coba fitur baru sebelum diimplementasiin) 
*/
function errorHandler($errno,$errmsg,$errfile) {
	return TRUE;
}

class Sandbox extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('djamail');
	}
	public function mail()
	{
		echo $this->djamail->kirim('akhyrul@gmail.com', 'Jawaban anda', 'Percobaan aja');
	}
	
	public function sock()
	{	

		set_error_handler("errorHandler");

		$fp = '';
		try{
			$fp = fsockopen("localhost", 80, $errno, $errstr, 10);
		}
		catch (Exception $e)
		{
			$fp = FALSE;
		}
		restore_error_handler();

		var_dump($fp);
	}
}

/* End of file sandbox.php */
/* Location: ./application/controllers/sandbox.php */
