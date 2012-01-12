<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    function set_tanggal_mysql($data = '')
    {
		list($tgl,$bln,$thn) = explode('-',$data);
		$data = $thn.'-'.$bln.'-'.$tgl;
        return $data;
    }
	
	function set_tanggal_normal($data = ''){
		list($thn,$bln,$tgl) = explode('-',$data);
		$data = $tgl.'-'.$bln.'-'.$thn;
        return $data;
	}

?>