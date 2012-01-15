<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Sistem Informasi Pusat Layanan DJA - <?php echo $title ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- CSS concatenated and minified via ant build script-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/reset.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/text.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/960.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('js/chosen/chosen.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/cupertino/jquery-ui-1.8.16.custom.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('js/jQuery-Visualize/css/visualize.css'); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('js/jQuery-Visualize/css/visualize-light.css'); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/new-style.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/mul14.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/akhyar-v2.css') ?>"/>
    <!-- end CSS-->

    <!-- JavaScript START -->
    <script type="text/javascript" src="<?php echo base_url('js/modernizr-2.0.6.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery-1.7.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery-ui-1.8.16.custom.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/chosen/chosen.jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jQuery-Visualize/js/visualize.jQuery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/phpjs/substr.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/scripts.js') ?>"></script>
    <!-- JavaScript END -->


    <?php //echo $scripts_for_layout ?>
</head>

<body>

<div id="container">
    <header>
        <div class="container_12">
            <div id="logo">
                <img src="<?php echo base_url('images/header-logo.png') ?>" />
                <!-- <img src="<?php echo base_url('images/logo.png') ?>" width="50" height="50" />
                &nbsp;&nbsp; Sistem Informasi Pusat Layanan DJA -->
            </div>
            <nav class="grid_10 alpha omega">

                <?php
				
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
				elseif ($this->uri->segment(1) == 'kasubdit_dadutek') {
                    $this->session->set_userdata('navbar', 'navbar_dadutek');
                    $this->load->view('navbar_dadutek');
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
                elseif ($this->uri->segment(1) == 'pelaksana') {
                    $this->session->set_userdata('navbar', 'navbar_pelaksana');
                    $this->load->view('navbar_pelaksana');
                }
                elseif ($this->uri->segment(1) == 'referensi') {
                    $navbar = $this->session->userdata('navbar');
                    $this->load->view($navbar);
                }
                elseif ($this->uri->segment(1) == 'knowledge') {
                    $navbar = $this->session->userdata('navbar');
                    $this->load->view($navbar);
                }

                ?>

            </nav>
            <div class="grid_2 alpha omega" style="text-align: right;">
                <div class="profile-menu">
                    <a href="javascript:void(0)"><?php echo $this->session->userdata('nama') ?></a>
                    <ul>
                        <li><a href="#">Profile</a></li>
                        <li><a href="<?php echo site_url('login/process_logout') ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="main" role="main" class="container_12">
        <?php echo $this->load->view($content) ?>
    </div>
    <footer>
        <div class="container_12">
            <div class="grid_4 alpha">
                <h1>Pusat Layanan DJA</h1>
                <ul>
                    <li>Lobby Gedung Sutikno Slamet</li>
                    <li>Jln. Wahidin No. 1</li>
                    <li>Jakarta Pusat</li>
                </ul>

                <h1>Email</h1>
                <ul>
                    <li>pusatlayanan@anggaran.depkeu.go.id</li>
                    <li>pusatlayanan.dja@gmail.com</li>
                </ul>

                <h1>Line</h1>
                <ul>
                    <li>021-34 83 25 11 (Call Center)</li>
                    <li>021-34 83 25 16 (Customer Service)</li>
                    <li>021-34 83 25 15 (Fax)</li>
                </ul>
            </div>

            <div class="grid_4">
                <h1>Online Customer Service</h1>
                <ul>
                    <li>Customer Service 1</li>
                    <li>Customer Service 2</li>
                    <li>Customer Service 3</li>
                    <li>Customer Service 4</li>
                </ul>
            </div>

            <div class="grid_4 omega">
                <h1>Pusat Layanan DJA</h1>
                <ul>
                    <li>Lobby Gedung Sutikno Slamet</li>
                    <li>Jln. Wahidin No. 1</li>
                    <li>Jakarta Pusat</li>
                </ul>

                <h1>Email</h1>
                <ul>
                    <li>pusatlayanan@anggaran.depkeu.go.id</li>
                    <li>pusatlayanan.dja@gmail.com</li>
                </ul>
            </div>
        </div>

        <div id="attribution">
            <div class="container_12">
            <div class="grid_12 alpha omega">
                Copyright &copy; 2011 Komuri & Ortala DJA
            </div>
            </div>
        </div>
    </footer>
</div>
<!--! end of #container -->


<!--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
<!--<script>window.jQuery || document.write('<script src="--><?php //echo base_url() ?><!--/js/jquery-1.7.1.min.js"><\/script>')</script>-->


<!-- scripts concatenated and minified via ant build script-->
<!--<script defer src="--><?php //echo base_url('/js/plugins.js') ?><!--"></script>-->
<!--<script defer src="--><?php //echo base_url('/js/script.js') ?><!--"></script>-->
<!-- end scripts-->


<script> // Change UA-XXXXX-X to be your site's ID
//    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
//    Modernizr.load({
//      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
//    });
</script>


<!--[if lt IE 7 ]>
<!--<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>-->
<!--    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>-->
<![endif]-->

</body>
</html>
