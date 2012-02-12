<div class="content">
    <h1>Konfigurasi Email</h1>

    <form method="post" action="<?php echo site_url('admin/email') ?> ">
        <p>
            <label>STMP Host</label>
            <input type="text" name="smtp_host" value="<?php echo $email_config['smtp_host'] ?>" />
        </p>

        <p>
            <label>STMP User</label>
            <input type="text" name="smtp_user" value="<?php echo $email_config['smtp_user'] ?>" />
        </p>

        <p>
            <label>STMP Password</label>
            <input type="text" name="smtp_pass" value="<?php echo $email_config['smtp_pass'] ?>" />
        </p>

        <p>
            <label>Port</label>
            <input type="text" name="smtp_port" value="<?php echo $email_config['smtp_port'] ?>" /> Default: 25
        </p>

        <input type="submit" value="Simpan"/>
    </form>
</div>