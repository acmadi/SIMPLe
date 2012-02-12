<div class="content">

    <h1>Ubah Nama Satker <?php echo $satker->id_satker ?></h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php site_url('/admin/satker/edit/' . $satker->id_satker) ?>">

        <p>
            <label>Kode Satker</label>
            <input type="text" value="<?php echo $satker->id_satker ?>" disabled/>
        </p>

        <p>
            <label>Nama Satker</label>
            <input type="text" name="nama_satker" value="<?php echo $satker->nama_satker ?>"/>
			<?php echo form_error('nama_satker', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>