<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="<?php echo base_url() . 'images/icon.jpg';?>"/>
    <style type="text/css">@import url("<?php echo base_url() . 'css/style.css'; ?>");</style>
    <title>Login</title>
</head>

<body>
<div id="login_box">
    <div id="header"></div>
    <div id="navbar"></div>

    <div id="mid">
        <h4 id="title_form_login">Admin</h4><br/>
        <?php
                $attributes = array('name' => 'login_form', 'id' => 'login_form');
        echo form_open('login/process_login', $attributes);
        ?>
        <?php
        $message = $this->session->flashdata('message');
        echo $message == '' ? '' : '<p id="message">' . $message . '</p>';
        ?>
        <table>
            <tr>
                <td class="kol1"><label for="username">User ID</label></td>
                <td>:</td>
                <td><input type="text" name="username" size="24" class="form_field"
                           value="<?php echo set_value('username');?>"/></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo form_error('username', '<p class="field_error">', '</p>');?></td>
            </tr>
            <tr></tr>

            <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td><input type="password" name="password" size="24" class="form_field"
                           value="<?php echo set_value('password');?>"/></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo form_error('password', '<p class="field_error">', '</p>');?></td>
            </tr>
            <tr></tr>

            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" id="submit" value="Login" style="width:60px; font-size:11px; "/>
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
</body>
</html>