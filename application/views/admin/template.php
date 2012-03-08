<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pusat Layanan DJA - Administrator - <?php echo @$title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url('bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('bootstrap/css/bootstrap-responsive.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/new/table.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('js/chosen/chosen.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/ui-lightness/jquery-ui-1.8.16.custom.css') ?>" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

        td.action img {
            width: 20px;
            height: 20px;
        }

        .table tr .action .btn {
            visibility: hidden;
        }

        .table tr:hover .action .btn {
            visibility: visible;
        }
    </style>

    <script src="<?php echo base_url('js/jquery-1.7.1.min.js') ?>"></script>
    <script src="<?php echo base_url('js/jquery-1.7.1.min.js') ?>"></script>
    <script src="<?php echo base_url('js/chosen/chosen.jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('js/jquery-ui-1.8.16.custom.min.js') ?>"></script>
    <!--    <script src="--><?php //echo base_url(); ?><!--js/jquery.ui.core.min.js"></script>-->
    <!--    <script src="--><?php //echo base_url(); ?><!--js/jquery.ui.widget.min.js"></script>-->
    <!--    <script src="--><?php //echo base_url(); ?><!--js/jquery.ui.position.min.js"></script>-->
    <!--    <script src="--><?php //echo base_url(); ?><!--js/jquery.ui.autocomplete.min.js"></script>-->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico') ?>">

    <link rel="apple-touch-icon" href="<?php echo base_url('images/apple-touch-icon.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('images/apple-touch-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('images/apple-touch-icon-114x114.png') ?>">
</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">SIMPLe DJA - Admin</a>

            <div class="nav-collapse">
                <ul class="nav">

                    <li class="active"><a href="<?php echo site_url('/admin/dashboard') ?>"><i
                        class="icon-home icon-white"></i> Dashboard</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>

                <div id="logout" class="navbar-text pull-right"><?php echo $this->session->userdata('nama') ?>
                    | <?php echo anchor("login/process_logout", 'Logout') ?></div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">

                    <?php
                    if ($this->session->userdata('id_lavel') == 15) {
                        $this->load->view('navbar_15');
                    } else {
                        $this->load->view('navbar');
                    }
                    ?>

                </ul>
            </div>
        </div>

    <div class="span10">

        <?php if (isset($breadcrumb) && $breadcrumb != '') : ?>
        <?php
        $this->load->helper('breadcrumb_helper');
        breadcrumb($breadcrumb);
        ?>
            </div>
            <?php endif;?>


        <div class="span10">
            <?php
            if (isset($content)) {
                $this->load->view($content);
            } elseif (isset($content_html)) {
                echo $content_html;
            }
            ?>
        </div>


    </div>

    <hr>

    <footer>
        <p>&copy; Dirjen Jenderal Anggaran 2012</p>
    </footer>
</div>


</div>
<!--/.fluid-container-->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<!--<script src="../assets/js/bootstrap-transition.js"></script>-->
<!--<script src="../assets/js/bootstrap-alert.js"></script>-->
<!--<script src="../assets/js/bootstrap-modal.js"></script>-->
<!--<script src="../assets/js/bootstrap-dropdown.js"></script>-->

<!--<script src="../assets/js/bootstrap-scrollspy.js"></script>-->
<!--<script src="../assets/js/bootstrap-tab.js"></script>-->
<!--<script src="../assets/js/bootstrap-tooltip.js"></script>-->
<!--<script src="../assets/js/bootstrap-popover.js"></script>-->
<!--<script src="../assets/js/bootstrap-button.js"></script>-->
<!--<script src="../assets/js/bootstrap-collapse.js"></script>-->

<!--<script src="../assets/js/bootstrap-carousel.js"></script>-->
<!--<script src="../assets/js/bootstrap-typeahead.js"></script>-->
<script>
    $(function () {
        $('.chzn-single').chosen();
    })
</script>

</body>
</html>
