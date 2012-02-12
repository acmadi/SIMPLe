<div class="content">

    <h1>Tambah Kategori referensi</h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php echo site_url('/admin/kategori_ref/add') ?>">

        

        <p>
            <label>Nama Kategori</label>
            <input type="text" name="nama_kat" value="<?php echo set_value('nama_kat')?> "/>
			<?php echo form_error('nama_kat', '<div class="error">', '</div>'); ?>
        </p>

        

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>