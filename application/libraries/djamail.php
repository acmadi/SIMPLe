<?php
function errorHandler($errno,$errmsg,$errfile) {
	return TRUE;
}
class DjaMail
{
    public $CI;


    public function __construct()
    {
        $this->CI =& get_instance();
		$this->CI->load->library('email');
    }

    public function kirim($ke, $judul, $isi, $attachment = '')
    {
		$this->CI->email->clear();
		$this->CI->email->from('dja.frontdesk@yahoo.com', 'Frontdesk Direktorat Jenderal Anggaran');
		$this->CI->email->to($ke); 

		$this->CI->email->subject($judul);
		$this->CI->email->message($isi);	

		if($attachment != '')
			$this->CI->email->attach($attachment);
		
		// cek koneksi 
		// $fp = FALSE;

		set_error_handler("errorHandler");
		// try{
		// 	$fp= fsockopen(
		// 		$this->CI->config->item('smtp_host'), 
		// 		$this->CI->config->item('port'), 
		// 		$errno, $errstr, 10);
		// }
		// catch (Exception $e)
		// {
		// }

		// if (is_resource($fp) ) :
			$r = $this->CI->email->send();
		// endif;
		restore_error_handler();
		return $r;
    }
}