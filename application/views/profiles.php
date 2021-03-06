<style type="text/css">
    label {
        display: inline-block;
        width: 100px;
    }
</style>

<div class="content">
    <h1>Profil</h1>

    <?php generate_notifkasi() ?>

    <div class="grid_6">

        <?php echo form_open('profiles') ?>
        <input type="hidden" name="submit" value="profile"/>


        <fieldset>
            <legend>Identitas</legend>
            <p>
                <label> Username </label>
                <?php echo $profile->username ?>
            </p>

            <p>
                <label> Level </label>
                <?php echo $profile->nama_lavel ?>
            </p>

            <p>
                <label> Nama </label>
                <input type="text" name="nama" value="<?php echo (isset($_POST['submit']) AND $_POST['submit'] == 'profile') ? set_value('nama') : $profile->nama ?>"/>
            </p>

            <p>
                <label> Email </label>
                <input type="text" name="email" value="<?php echo (isset($_POST['submit']) AND $_POST['submit'] == 'profile') ? set_value('email') : $profile->email ?>"/>
            </p>

            <p>
                <label> Telepon </label>
                <input type="text" name="no_tlp" value="<?php echo (isset($_POST['submit']) AND $_POST['submit'] == 'profile') ? set_value('no_tlp') : $profile->no_tlp ?>"/>
            </p>

            <div>
                <input type="submit" class="button" value="Simpan"/>
            </div>

        </fieldset>

        <?php echo form_close() ?>

    </div>


    <div class="grid_6">

        <?php echo form_open('profiles') ?>
        <input type="hidden" name="submit" value="password"/>

        <fieldset>
            <legend>Password</legend>
            <p>
                <label> Password </label>
                <input type="password" name="password"/>

            </p>

            <p>
                <label> Ulangi Password </label>
                <input type="password" name="password2"/>

            </p>

            <div>
                <input type="submit" class="button" value="Simpan Password"/>
            </div>

        </fieldset>

        <?php echo form_close() ?>

    </div>

</div>