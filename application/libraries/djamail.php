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
        $this->CI->load->config('email');
        $config = array(
            'protocol' => $this->CI->config->item('protocol'),
            'smtp_host' => $this->CI->config->item('smtp_host'),
            'smtp_port' => $this->CI->config->item('smtp_port'),
            'mailtype' => $this->CI->config->item('mailtype'),
            'smtp_user' => $this->CI->config->item('smtp_user'),
            'smtp_pass' => $this->CI->config->item('smtp_pass'),
        );
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->initialize($config);

		$this->CI->email->clear();
		$this->CI->email->from('pusatlayanan@anggaran.depkeu.go.id', 'Pusat Layanan DJA');
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