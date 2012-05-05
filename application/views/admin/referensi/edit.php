<div class="content">

    <h1>Ubah Nama Referensi <?php echo $referensi->id_referensi ?></h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php site_url('/admin/referensi/edit/' . $referensi->id_referensi) ?>">

        <p>
            <label>Kode Referensi</label>
            <input type="text" value="<?php echo $referensi->id_referensi ?>" disabled/>
        </p>

        <p>
            <label>Nama Referensi</label>
            <input type="text" name="nama_ref" value="<?php echo $referensi->nama_ref ?>"/>
			<?php echo form_error('nama_ref', '<div class="error">', '</div>'); ?>
        </p>
<p>
            <label>Nama File Referensi</label>
            <input type="text" name="nama_file" value="<?php echo $referensi->nama_file ?>"/>
			<?php echo form_error('nama_file', '<div class="error">', '</div>'); ?>
        </p>
		
        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>