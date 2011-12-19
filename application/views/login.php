<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="<?php echo base_url() . 'images/icon.jpg';?>"/>
    <link href="<?php echo base_url('/css/style.css') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">@import url("<?php echo base_url() . 'css/style.css'; ?>");</style>
    <title>Login</title>
</head>

<body>
<div id="login_box">
    <div id="header">Sistem Informasi Pusat Layanan DJA v1.0</div>

    <div id="mid" style="padding: 60px; background: #fff; border-radius: 10px; box-shadow: 0 0 20px -5px #333; text-align: center;">

        <h2 id="title_form_login">DJA SIMPEL</h2>

        <?php echo $this->session->flashdata('error') ?>
        <?php echo form_open("login/usermasuk"); ?>

        <p style="text-align: center;">
            <label for="user" style="text-align: left; width: 300px; color: #666" >User ID</label><br/>
            <input type="text" id="user" name="user" size="24" class="form_field" style="width: 80px !important;"/>
        </p>

        <p style="text-align: center;">
            <label for="pass" style="text-align: left; width: 300px; color: #666">Password</label><br/>
            <input type="password" id="pass" name="pass" size="24" class="form_field" style="width: 80px !important;"/>
        </p>

        <p style="text-align: center;">
            <input type="submit" name="submit" class="button blue-pill" value="Login"/>
        </p>

        <div style="clear: both;"></div>

        </form>
    </div>
</div>
</body>
</html>