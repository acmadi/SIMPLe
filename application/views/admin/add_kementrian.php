<div class="content">

    <h1>Tambah Kementerian</h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php site_url('/admin/kementrian/add') ?>">

        

        <p>
            <label>Kode Kementerian</label>
            <input type="text" name="id_kementrian" value="<?php echo set_value('id_kementrian') ?>" maxlength="3"/>
			<?php echo form_error('id_kementrian', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Nama Kementerian</label>
            <input type="text" name="nama_kementrian" value="<?php echo set_value('nama_kementrian')?> "/>
			<?php echo form_error('nama_kementrian', '<div class="error">', '</div>'); ?>
        </p>

        

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>