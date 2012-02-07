<?php

function generate_notifkasi()
{
    $CI =& get_instance();
    if ($CI->session->flashdata('success')) {
        echo notification($CI->session->flashdata('success'), 'Sukses', 'green');
    }
    if ($CI->session->flashdata('info')) {
        echo notification($CI->session->flashdata('info'), 'Informasi', 'blue');
    }
    if ($CI->session->flashdata('notice')) {
        echo notification($CI->session->flashdata('notice'), 'Perhatian', 'yellow');
    }
    if ($CI->session->flashdata('error')) {
        echo notification($CI->session->flashdata('error'), 'Error', 'red');
    }
    if (validation_errors()) {
        echo notification(validation_errors(), 'Error', 'red');
    }
}

function notification($message, $title = '', $class = '')
{
    $string = '<div class="notification %s">
                    <strong>%s</strong>
                    <a href="javascript:void(0)" class="close">×</a>
                    <div style="clear: both; height: 10px;"></div>
                    <div class="message">%s</div>
                    <div style="clear: both;"></div>
                </div>';

    $notification = sprintf($string, $class, $title, $message);

    return $notification;
}