<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function set_tanggal_mysql($data = '')
    {
		list($tgl,$bln,$thn) = explode('-',$data);
		$data = $thn.'-'.$bln.'-'.$tgl;
        return $data;
    }   
}

?>