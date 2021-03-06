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
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('js/chosen/chosen.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/eggplant/jquery-ui-1.8.17.custom.css') ?>"/>
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
    <script type="text/javascript" src="<?php echo base_url('js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/highcharts/themes/grid.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/phpjs/substr.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/prefixfree.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery.tinysort.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/scripts.js') ?>"></script>
    <!-- JavaScript END -->


    <?php //echo $scripts_for_layout ?>
</head>

<body>

<div id="container">
    <header>
        <div class="container_12">
            <div id="logo" class="grid_6">
                <img src="<?php echo base_url('images/header-logo.png') ?>"/>
                <!-- <img src="<?php echo base_url('images/logo.png') ?>" width="50" height="50" />
                &nbsp;&nbsp; Sistem Informasi Pusat Layanan DJA -->
            </div>

            <?php if (!$this->session->userdata('id_user')): ?>

            <div class="grid_6" style="padding-top: 20px; text-align: right;">
                <?php echo form_open("login/usermasuk", array('id' => 'login_form')); ?>
                <!-- Cegah BOT. Kalau ini diisi, berarti BOT. Human cannot see this text field -->
                <input type="text" id="username" name="username" placeholder="Username" style="display: none;"/>

                <input type="text" id="user" name="user" placeholder="Username" style="width: 100px;"/>
                <input type="password" id="pass" name="pass" placeholder="Password" style="width: 100px;"/>
                <input type="submit" name="submit" class="button blue" value="Login"/>
                <?php echo form_close() ?>
            </div>

            <?php else: ?>

            <div class="grid_5 alpha omega prefix_1" style="text-align: right;">
                <?php if ($this->session->userdata('id_user')): ?>
                <div class="profile-menu">
                    <a href="javascript:void(0)"><?php echo $this->session->userdata('nama') ?></a>
                    <ul>
                        <li><a href="<?php echo site_url('profiles') ?>">Profil</a></li>
                        <li><a href="<?php echo site_url('login/process_logout') ?>">Logout</a></li>
                    </ul>
                </div>
                <?php endif ?>
            </div>

            <?php endif ?>


            <nav class="grid_12 alpha omega">
                <?php
                if ($this->session->userdata('id_user')) {
                    $this->load->view('navbar_' . $this->session->userdata('id_lavel'));
                }
                ?>
            </nav>
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

        <div class="grid_4 omega">
            <h1>Online Customer Service</h1>
            <?php
            // Online Users!!
            $sql = "SELECT user, id_user, lavel, aktifitas_terakhir
                    FROM tb_online_users
                    WHERE lavel = 1 OR lavel = 3
                    AND aktifitas_terakhir > DATE_SUB(NOW(), INTERVAL 2 HOUR)
                   ";
            $online_users = $this->db->query($sql);

            // Jumlah Petugas selain CS dan Penyelia yang online
            $sql = "SELECT COUNT(id_user) AS count
                    FROM tb_online_users
                    WHERE lavel != 1 OR lavel != 3
                    AND aktifitas_terakhir > DATE_SUB(NOW(), INTERVAL 2 HOUR)
                   ";
            $jumlah_petugas_lain_online = $this->db->query($sql)->row()->count;
            ?>
            <ul>
                <?php $i = 1 ?>
                <?php foreach ($online_users->result() as $user): ?>
                <?php if ($this->session->userdata('lavel') == 1): ?>
                    <li>
                        <a href="#" onclick="window.open('<?php echo site_url('chat') ?>', 'chat', 'width=700, height=636, status=0, toolbar=0, menubar=0, resizable=0')">
                            <?php echo 'Customer Service ' . $i++ ?> (<?php echo $user->user ?>)
                        </a>
                    </li>
                <?php else: ?>
                    <li><a href="javascript:void(0)"><?php echo 'Customer Service ' . $i++ ?> (<?php echo $user->user ?>)</a></li>
                <?php endif; ?>
                <?php endforeach; ?>
                    <li>Jumlah Petugas Online <?php echo $jumlah_petugas_lain_online ?></li>
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
        setInterval(function () {
            $.get('<?php echo site_url('login_status') ?>', function(response){
                console.log(response);
                if (response != 'OK') {
                    window.location.href = '<?php echo site_url('/') ?>';
                }
            })
        }, 30 * 60 * 1000 + 10000) // 30 menit + 10 detik
    })
</script>

</body>
</html>
