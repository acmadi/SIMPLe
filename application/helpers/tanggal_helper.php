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

function hari_kerja($tanggal)
{
    $date1 = new DateTime(date('Y-m-d H:i:s'));
    $date2 = new DateTime($tanggal);
    //                            $day = $date1->diff($date2);
    $day = date_diff($date1, $date2);

    $hari = $day->days;

    $hari_kerja = (int)($day->days / 7) * 2;
    $hari_kerja = $hari - $hari_kerja;

    $sql = "SELECT * FROM tb_calendar WHERE holiday BETWEEN '{$tanggal}' AND NOW()";
    $hari_kerja = $hari_kerja - $this->db->query($sql)->num_rows();

    //    if ($day->days > 4) {
    //                            echo '<span style="font-weight: bold; font-size: 13px; color: white; background: tomato; padding: 0 4px;">' . $hari_kerja . '</span>';
    //    } elseif ($day->days == 4) {
    //                            echo '<span style="font-weight: bold; font-size: 13px; color: yellow; background: black; padding: 0 4px;">' . $hari_kerja . '</span>';
    //    } else {
    //                            echo '<span style="">' . $day->days . '</span>';
    //    }
    return $hari_kerja;
}

?>