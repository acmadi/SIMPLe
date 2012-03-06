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
    <link rel="author" href="humans.txt" />

    <!-- CSS concatenated and minified via ant build script-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/reset.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/text.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/960.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/new-style.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/mul14.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/akhyar-v2.css') ?>"/>
    <!-- end CSS-->

    <!-- JavaScript START -->
    <script type="text/javascript" src="<?php echo base_url('js/modernizr-2.0.6.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery-1.7.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/prefixfree.min.js') ?>"></script>
    <!-- JavaScript END -->


    <?php //echo $scripts_for_layout ?>
</head>

<body>

<div id="container">
    <header>
        <div class="container_12">
            <div id="logo" class="grid_12">
                <img src="<?php echo base_url('images/header-logo.png') ?>"/>
            </div>

        </div>
    </header>
    <div id="main" role="main" class="container_12">
        <?php echo $this->load->view($content) ?>
    </div>

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

        </div>

        <div class="grid_4">
            <h1>Email</h1>
            <ul>
                <li>
                    <a href="mailto:&#112;&#117;&#115;&#97;t&#x6c;a&#x79;&#x61;&#110;&#97;&#110;&#x40;a&#110;&#103;&#x67;&#x61;r&#97;&#110;&#x2e;d&#101;p&#x6b;&#x65;&#117;.&#x67;o&#46;&#x69;&#x64;">
                    &#112;&#117;&#115;&#97;t&#x6c;a&#x79;&#x61;&#110;&#97;&#110;&#x40;a&#110;&#103;&#x67;&#x61;r&#97;&#110;&#x2e;d&#101;p&#x6b;&#x65;&#117;.&#x67;o&#46;&#x69;&#x64;
                    </a>
                </li>
                <li>
                    <a href="mailto:&#x70;&#117;&#x73;&#x61;tla&#x79;&#97;&#x6e;&#x61;&#110;.d&#x6a;&#97;&#64;g&#109;&#97;&#105;&#x6c;&#x2e;c&#111;&#109;">
                        &#x70;&#117;&#x73;&#x61;tla&#x79;&#97;&#x6e;&#x61;&#110;.d&#x6a;&#97;&#64;g&#109;&#97;&#105;&#x6c;&#x2e;c&#111;&#109;
                    </a>
                </li>
            </ul>

            <h1>Line</h1>
            <ul>
                <li>021-34 83 25 11 (Call Center)</li>
                <li>021-34 83 25 16 (Customer Service)</li>
                <li>021-34 83 25 15 (Fax)</li>
            </ul>
        </div>

    </div>

    <div id="attribution">
        <div class="container_12">
            <div class="grid_12 alpha omega">
                Copyright &copy; 2011-2012 Komuri & Ortala DJA
            </div>
        </div>
    </div>
</footer>
<!--! end of #container -->


<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

<script>
    $(function () {
        $('.close').live('click', function () {
            $(this).parent().fadeOut('fast');
        })
    })
</script>

</body>
</html>
