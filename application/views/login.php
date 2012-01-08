<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="<?php echo base_url() . 'images/icon.jpg';?>"/>
    <link href="<?php echo base_url('/css/style.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/buttons.css'); ?>" rel="stylesheet"/>
    <style type="text/css">@import url("<?php echo base_url() . 'css/style.css'; ?>");</style>
    <title>Login</title>
</head>

<body>
<div id="login_box" style="vertical-align: middle;">
<!--    <div id="header"></div>-->


    <div id="mid">
        <div class="inner">

        <div id="title_form_login"><img src="<?php echo base_url('images/logo.png') ?>" /><br/>Sistem Informasi Pusat Layanan DJA</div>

        <?php echo $this->session->flashdata('error') ?>
        <?php echo form_open("login/usermasuk"); ?>

        <p>
            <label for="user" style="text-align: left; width: 300px; color: #666" >User ID</label><br/>
            <input type="text" id="user" name="user" size="24" class="form_field" style="width: 80px !important;"/>
        </p>

        <p>
            <label for="pass" style="text-align: left; width: 300px; color: #666">Password</label><br/>
            <input type="password" id="pass" name="pass" size="24" class="form_field" style="width: 80px !important;"/>
        </p>

        <p>
            <input type="submit" name="submit" class="button blue-pill" value="Login"/>
        </p>
        </div>

        <div style="clear: both;"></div>

        </form>
    </div>
</div>
</body>
</html>