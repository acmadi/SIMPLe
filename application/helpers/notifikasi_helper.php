<?php

function generate_notifkasi()
{
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }

    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }

    if ($this->session->flashdata('notice')) {
        echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
    }

    if ($this->session->flashdata('info')) {
        echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
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