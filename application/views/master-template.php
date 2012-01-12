<!DOCTYPE HTML>
<html manifest="manifest.txt">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?php echo isset($title) ? $title : ''; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('images/icon.jpg') ?>"/>

    <link rel="stylesheet" href="<?php echo base_url('css/cupertino/jquery-ui-1.8.16.custom.css') ?>"/>

    <!--    <link href="--><?php //echo base_url('css/960gs/reset.css'); ?><!--" rel="stylesheet"/>-->
    <!--    <link href="--><?php //echo base_url('css/960gs/text.css'); ?><!--" rel="stylesheet"/>-->
    <!--    <link href="--><?php //echo base_url('css/960gs/960.css'); ?><!--" rel="stylesheet"/>-->

    <link href="<?php echo base_url('css/buttons.css'); ?>" rel="stylesheet"/>

    <link href="<?php echo base_url('/css/table.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('js/jQuery-Visualize/css/visualize.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('js/jQuery-Visualize/css/visualize-light.css'); ?>" rel="stylesheet"/>

    <link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('css/autoSuggest.css') ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('css/akhyar.css') ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('js/FlexBox/css/jquery.flexbox.css') ?>" rel="stylesheet"/>


    <!--TABLE JQUERY-->
    <!--    <style type="text/css">@import url("--><?php //echo base_url() . 'css/table.css'; ?><!--");</style>-->
    <!--POP UP-->
    <!--    <style type="text/css">@import url("--><?php //echo base_url() . 'css/pop-up.css'; ?><!--");</style>-->

    <script type="text/javascript" src="<?php echo base_url('js/jquery-1.7.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery-ui-1.8.16.custom.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery.autoSuggest.minified.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jQuery-Visualize/js/visualize.jQuery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/phpjs/substr.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/FlexBox/js/jquery.flexbox.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/scripts.js') ?>"></script>


</head>
<body>
<div id="wrapper">
    <div id="header"><img src="<?php echo base_url('images/logo.png') ?>" width="40" height="40" />Sistem Informasi Pusat Layanan DJA</div>
    <div id="navbar">
        <?php

        /* NOTE: Digunakan kalau butuh menu CS semua digabung */

        //switch ($this->session->userdata('id_lavel')) {
        //    case 1:
        //        $this->load->view('navbar_cs');
        //        break;
        //}


        if ($this->session->userdata('lavel') == '2') {
            $this->session->set_userdata('navbar', 'navbar_supervisor');
            $this->load->view('navbar_supervisor');
        }
        elseif ($this->session->userdata('lavel') == '3') {
            $this->session->set_userdata('navbar', 'navbar_pelaksana');
            $this->load->view('navbar_pelaksana');
        }
        elseif ($this->uri->segment(1) == 'kasubdit') {
            $this->session->set_userdata('navbar', 'navbar_pelaksana');
            $this->load->view('navbar_kasubdit');
        }
        elseif ($this->session->userdata('lavel') == '5') {
            $this->session->set_userdata('navbar', 'navbar_direktur');
            $this->load->view('navbar_direktur');
        }
        elseif ($this->session->userdata('lavel') == '6') {
            $this->session->set_userdata('navbar', 'navbar_dirjen');
            $this->load->view('navbar_dirjen');
        }
        elseif ($this->uri->segment(1) == 'helpdesk') {
            $this->session->set_userdata('navbar', 'navbar_helpdesk');
            $this->load->view('navbar_helpdesk');
        }
        elseif ($this->uri->segment(1) == 'frontdesk') {
            $this->session->set_userdata('navbar', 'navbar_frontdesk');
            $this->load->view('navbar_frontdesk');
        }
        elseif ($this->uri->segment(1) == 'csd') {
            $this->session->set_userdata('navbar', 'navbar_csd');
            $this->load->view('navbar_csd');
        }
        elseif ($this->uri->segment(1) == 'pengaduan') {
            $this->session->set_userdata('navbar', 'navbar_cse');
            $this->load->view('navbar_cse');
        }
        elseif ($this->uri->segment(1) == 'kb_koordinator') {
            $this->session->set_userdata('navbar', 'navbar_kb_koordinator');
            $this->load->view('navbar_kb_koordinator');
        }
        elseif ($this->uri->segment(1) == 'kasubdit_dadutek') {
            $this->session->set_userdata('navbar', 'navbar_dadutek');
            $this->load->view('navbar_dadutek');
        }
        elseif ($this->uri->segment(1) == 'referensi') {
            $navbar = $this->session->userdata('navbar');
            $this->load->view($navbar);
        }

        ?>
    </div>
    <div id="container">
        <?php if(isset($breadcrumb) && $breadcrumb != '') : ?>
        <div id="breadcrumb">
            <?php echo $breadcrumb ?>
        </div>
        <?php endif;?>
        <div id="content"><?php $this->load->view($content); ?></div>
    </div>
    <div id="footer"><?php $this->load->view('footer'); ?></div>
</div>


<!--TABS--GANTI MODEL EXTJS ! :) -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#tab1').fadeIn('slow'); //tab pertama ditampilkan
        $('ul#nav li a').click(function () { // jika link tab di klik
            $('ul#nav li a').removeClass('active'); //menghilangkan class active (yang tampil)
            $(this).addClass("active"); // menambahkan class active pada link yang diklik
            $('.tab_konten').hide(); // menutup semua konten tab
            var aktif = $(this).attr('href'); // mencari mana tab yang harus ditampilkan
            $(aktif).fadeIn('slow'); // tab yang dipilih, ditampilkan
            return false;
        });

    });
</script>

</body>
</html>


