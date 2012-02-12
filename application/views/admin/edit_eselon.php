<div class="content">

    <h1>Ubah Nama Eselon <?php echo $eselon->id_unit ?></h1>

    <?php generate_notifkasi() ?>
				
    <form method="post" action="<?php site_url('/admin/eselon/edit/' . $eselon->id_unit) ?>">
		<p>
            <label>Kode Eselon</label>
            <input type="text" value="<?php echo $eselon->id_unit?>" disabled/>
        </p>

        <p>
            <label>Nama Eselon</label>
            <input type="text" name="nama_unit" value="<?php echo $eselon->nama_unit ?>"/>
			<?php echo form_error('nama_unit', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>