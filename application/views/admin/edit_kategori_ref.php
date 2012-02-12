<div class="content">

    <h1>Ubah Nama Kategori Referensi <?php echo $kategori_ref->id_referensi_kat ?></h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php site_url('/admin/kategori_ref/edit/' . $kategori_ref->id_referensi_kat) ?>">

        <p>
            <label>Kode Kategori</label>
            <input type="text" value="<?php echo $kategori_ref->id_referensi_kat ?>" disabled/>
        </p>

        <p>
            <label>Nama Kategori</label>
            <input type="text" name="nama_kat" value="<?php echo $kategori_ref->nama_kat ?>"/>
			<?php echo form_error('nama_kat', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>