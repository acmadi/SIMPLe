<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <title><?php echo isset($title) ? $title : ''; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() . 'images/icon.jpg';?>"/>

    <link rel="stylesheet" href="<?php echo base_url() . 'css/ui-lightness/jquery-ui-1.8.16.custom.css';?>"/>

    <style type="text/css">@import url("<?php echo base_url() . 'css/style.css'; ?>");</style>
    <style type="text/css">@import url("<?php echo base_url() . 'css/autoSuggest.css'; ?>");</style>

    <!--TABLE JQUERY-->
    <style type="text/css">@import url("<?php echo base_url() . 'css/table.css'; ?>");</style>
    <!--POP UP-->
    <style type="text/css">@import url("<?php echo base_url() . 'css/pop-up.css'; ?>");</style>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.autoSuggest.minified.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/phpjs/substr.js"></script>


</head>
<body>
<div id="wrapper">
    <div id="header"><img src="<?php echo base_url('images/logo.png') ?>"/>Sistem Informasi Pusat Layanan DJA v1.0</div>
    <div id="navbar"><?php $this->load->view('navbar_csc'); ?></div>
    <div id="container">
        <div id="content"><?php $this->load->view($content); ?></div>
    </div>
    <div id="footer"><?php $this->load->view('footer'); ?></div>
</div>
</body>
</html>

<!--TABS--GANTI MODEL EXTJS ! :) -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tab1').fadeIn('slow'); //tab pertama ditampilkan
        $('ul#nav li a').click(function() { // jika link tab di klik
            $('ul#nav li a').removeClass('active'); //menghilangkan class active (yang tampil)
            $(this).addClass("active"); // menambahkan class active pada link yang diklik
            $('.tab_konten').hide(); // menutup semua konten tab
            var aktif = $(this).attr('href'); // mencari mana tab yang harus ditampilkan
            $(aktif).fadeIn('slow'); // tab yang dipilih, ditampilkan
            return false;
        });

    });
</script>

<!--TABLE JQUERY-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wjb.selectallrows.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tableOne thead tr th:first input:checkbox").click(function() {
            var checkedStatus = this.checked;
            $("#tableOne tbody tr td:first-child input:checkbox").each(function() {
                this.checked = checkedStatus;
            });
        });

        $("#tableTwo").selectAllRows();

        $("#tableThree").selectAllRows({ column: 'last' });

        $("#tableFour").selectAllRows({
            column: '2',
            selectTip: 'Select All Students',
            unselectTip: 'Un-Select All Students'
        })
                .css("border-width", "10px");
    });
</script>



