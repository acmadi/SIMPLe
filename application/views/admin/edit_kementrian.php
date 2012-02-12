<div class="content">

    <h1>Ubah Nama Kementerian <?php echo $kementrian->id_kementrian ?></h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php site_url('/admin/kementrian/edit/' . $kementrian->id_kementrian) ?>">

        <p>
            <label>Kode Kementerian</label>
            <input type="text" value="<?php echo $kementrian->id_kementrian ?>" disabled/>
        </p>

        <p>
            <label>Nama Kementerian</label>
            <input type="text" name="nama_kementrian" value="<?php echo $kementrian->nama_kementrian ?>"/>
			<?php echo form_error('nama_kementrian', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>