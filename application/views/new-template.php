<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php echo $title ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- CSS concatenated and minified via ant build script-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/reset.css') ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/text.css') ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/960.css') ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/mul14.css') ?>" />
    <!-- end CSS-->

    <script src="<?php echo base_url('js/modernizr-2.0.6.min.js') ?>"></script>
    <?php //echo $scripts_for_layout ?>


</head>

<body>

<div id="container">
    <header>
        <div class="container_12">
            <div style="padding: 20px;">-- LOGO --</div>
            <nav class="grid_9 alpha">

                <!-- Menu -->

            </nav>
            <div class="grid_3 omega" style="text-align: right;">
                <div class="profile-menu">
                    <a href="javascript:void(0)">Mulia Arifandy Nasution</a>
                    <ul>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Logout</a></li>
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
            <div class="grid_3 alpha">
                <dl>
                    <dt>Pusat Layanan DJA</dt>
                    <dd>Lobby Gedung Sutikno Slamet</dd>
                    <dd>Jln. Wahidin No. 1</dd>
                    <dd>Jakarta Pusat</dd>
                </dl>

                <dl>
                    <dt>Email</dt>
                    <dd>pusatlayanan@anggaran.depkeu.go.id</dd>
                    <dd>pusatlayanan.dja@gmail.com</dd>
                </dl>

                <dl>
                    <dt>Line</dt>
                    <dd>021-34 83 25 11 (Call Center)</dd>
                    <dd>021-34 83 25 16 (Customer Service)</dd>
                    <dd>021-34 83 25 15 (Fax)</dd>
                </dl>
            </div>

            <div class="grid_3">
                <dl>
                    <dt>Online Customer Service</dt>
                    <dd>Customer Service 1</dd>
                    <dd>Customer Service 2</dd>
                    <dd>Customer Service 3</dd>
                    <dd>Customer Service 4</dd>
                </dl>
            </div>

            <div class="grid_3">
                <dl>
                    <dt>Pusat Layanan DJA</dt>
                    <dd>Lobby Gedung Sutikno Slamet</dd>
                    <dd>Jln. Wahidin No. 1</dd>
                    <dd>Jakarta Pusat</dd>
                </dl>

                <dl>
                    <dt>Email</dt>
                    <dd>pusatlayanan@anggaran.depkeu.go.id</dd>
                    <dd>pusatlayanan.dja@gmail.com</dd>
                </dl>

            </div>
        </div>
        <div style="background: #69006b; padding: 10px 0; text-align: right; font-size: 10px; color: #f0f0f0;">
            <div class="container_12">
                Copyright&copy;2011 Komuri & Ortala DJA
            </div>
        </div>
    </footer>
</div>
<!--! end of #container -->


<!--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
<script>window.jQuery || document.write('<script src="<?php echo base_url() ?>/js/jquery-1.7.1.min.js"><\/script>')</script>


<!-- scripts concatenated and minified via ant build script-->
<script defer src="<?php echo base_url('/js/plugins.js') ?>"></script>
<script defer src="<?php echo base_url('/js/script.js') ?>"></script>
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
