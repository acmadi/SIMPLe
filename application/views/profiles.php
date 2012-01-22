<style type="text/css">
    label {
        display: inline-block;
        width: 100px;
    }
</style>

<div class="content">
    <h1>Profil</h1>

    <?php
    if (validation_errors())
        echo notification(validation_errors(), 'ERROR', 'red');
    ?>

    <div class="grid_6">

        <?php echo form_open('profiles') ?>
        <input type="hidden" name="submit" value="profile"/>


        <fieldset>
            <legend>Profil</legend>
            <p>
                <label> Nama </label>
                <input type="text" name="nama" value="<?php echo ($_POST['submit'] == 'profile') ? set_value('nama') : $profile->nama ?>"/>
            </p>

            <p>
                <label> Email </label>
                <input type="text" name="email" value="<?php echo ($_POST['submit'] == 'profile') ? set_value('email') : $profile->email ?>"/>
            </p>

            <p>
                <label> Telpon </label>
                <input type="text" name="no_tlp" value="<?php echo ($_POST['submit'] == 'profile') ? set_value('no_tlp') : $profile->no_tlp ?>"/>
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
            <legend>Profil</legend>
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