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

function alert()
{
    $class = $message = $title = '';

    $CI =& get_instance();
    if ($CI->session->flashdata('success')) {
        $message = $CI->session->flashdata('success');
        $title = "Berhasil";
        $class = "alert-success";
    }
    if ($CI->session->flashdata('info')) {
        $message = $CI->session->flashdata('info');
        $title = "Informasi";
        $class = "alert-info";
    }
    if ($CI->session->flashdata('notice')) {
        $message = $CI->session->flashdata('notice');
        $title = "Peringatan";
        $class = "";
    }
    if ($CI->session->flashdata('error')) {
        $message = $CI->session->flashdata('error');
        $title = "Error";
        $class = "alert-error";
    }

    if ($message != '') {
        $string = '<div class="alert %s">
                        <button class="close" data-dismiss="alert">×</button>
                        <strong class="alert-heading">%s</strong><br/>
                   %s</div>';
        $alert = sprintf($string, $class, $title, $message);
        return $alert;
    }
}