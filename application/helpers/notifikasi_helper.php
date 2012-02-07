<?php

function generate_notifkasi()
{
    if ($this->session->flashdata('success')) {
        echo notification($this->session->flashdata('success'), 'Sukses', 'red');
    }
    if ($this->session->flashdata('info')) {
        echo notification($this->session->flashdata('info'), 'Informasi', 'blue');
    }
    if ($this->session->flashdata('notice')) {
        echo notification($this->session->flashdata('notice'), 'Perhatian', 'yellow');
    }
    if ($this->session->flashdata('error')) {
        echo notification($this->session->flashdata('error'), 'Error', 'red');
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