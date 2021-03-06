<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Sistem Informasi Pusat Layanan Direktorat Jendral Anggaran - <?php echo isset($title) ? $title : ''; ?></title>

    <link rel="shortcut icon" href="<?php echo base_url() . 'images/icon.jpg';?>"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/admin-style.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/admin-buttons.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/cupertino/jquery-ui-1.8.16.custom.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/table.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/akhyar.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/js/chosen/chosen.css');?>" />

    <script type="text/javascript" src="<?php echo base_url('/js/jquery-1.7.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/js/jquery-ui-1.8.16.custom.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/js/chosen/chosen.jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/js/prefixfree.min.js') ?>"></script>

    <script>
        $(function(){
            $('.close').live('click', function () {
                $(this).parent().fadeOut('fast');
            })
        })
    </script>
</head>
<body>
<div id="wrapper">
    <div id="header"><img src="<?php echo base_url('images/logo.png') ?>" width="40"/>Sistem Informasi Pusat Layanan DJA</div>
    <div id="navbar">
        <?php
        if ($this->session->userdata('id_lavel') == 15) {
            $this->load->view('navbar_15');
        } else {
            $this->load->view('navbar');
        }
        ?>
    </div>
    <div id="container">

        <div id="content">
            <?php if(isset($breadcrumb) && $breadcrumb != '') : ?>
            <div id="breadcrumb">
                <?php
                $this->load->helper('breadcrumb_helper');
                breadcrumb($breadcrumb);
                ?>
            </div>
            <?php endif;?>

            <?php
            if (isset($content)) :
                $this->load->view($content);
            elseif (isset($content_html)) :
                echo $content_html;
            endif;
            ?>
        </div>
    </div>
    <div id="footer"><?php $this->load->view('footer'); ?></div>
</div>
</body>
</html>

<!--TABS--GANTI MODEL EXTJS ! :) -->
<script type="text/javascript">
    $(document).ready(function () {
        //$('#tab1').fadeIn('slow'); //tab pertama ditampilkan
        $('<?php echo isset($tabAktif) ? $tabAktif : '#tab1';?>').fadeIn('slow'); //tab pertama ditampilkan
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

<!--TABLE JQUERY-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wjb.selectallrows.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tableOne thead tr th:first input:checkbox").click(function () {
            var checkedStatus = this.checked;
            $("#tableOne tbody tr td:first-child input:checkbox").each(function () {
                this.checked = checkedStatus;
            });
        });

        $("#tableTwo").selectAllRows();

        $("#tableThree").selectAllRows({ column:'last' });

        $("#tableFour").selectAllRows({
            column:'2',
            selectTip:'Select All Students',
            unselectTip:'Un-Select All Students'
        })
                .css("border-width", "10px");

        // Delete confirmation
        $('.delete').click(function () {
            answer = confirm('Anda yakin akan menghapus?');
            if (answer) {
                _this = $(this);
                link = _this.attr('href');
                console.log("href=" + link)
                $.get(link, function (data) {
                    _this.closest('tr').css('background', 'red').fadeOut();
                });
            }
            return false;
        })

//        $('.chzn-single').chosen({});

    });
</script>



