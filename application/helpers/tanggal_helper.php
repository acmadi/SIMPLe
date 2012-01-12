<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
function set_tanggal_mysql($data = '')
{
    list($tgl, $bln, $thn) = explode('-', $data);
    $data = $thn . '-' . $bln . '-' . $tgl;
    return $data;
}

function set_tanggal_normal($data = '')
{
    list($thn, $bln, $tgl) = explode('-', $data);
    $data = $tgl . '-' . $bln . '-' . $thn;
    return $data;
}

function table_tanggal($datetime)
{
    $html = '<abbr title="%s">
                    <span class="date">%s</span>
                    <span class="time">%s</span>
               </abbr>';
    $temp = sprintf($html,
        date('d F Y H:i:s', strtotime($datetime)),
        date('d M', strtotime($datetime)),
        date('H:i', strtotime($datetime))
    );
    return $temp;
}

?>