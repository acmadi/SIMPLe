<div class="content">

    <h1>Tambah Referensi</h1>
				<?php
				// TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
				if ($this->session->flashdata('success')) {
					echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
				}
				if ($this->session->flashdata('error')) {
					echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
				}
				
				if ($this->session->flashdata('notice')) {
					echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
				}
				if ($this->session->flashdata('info')) {
					echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
				}
				?>
    <form method="post" action="<?php site_url('/admin/referensi/add') ?>">

        <!-- <p>
            <label>Kode Referensi</label>
            <input type="text" name="id_referensi" value="<?php echo set_value('id_referensi') ?>" maxlength="6"/>
			<?php echo form_error('id_referensi', '<div class="error">', '</div>'); ?>
        </p> -->

        <p>
            <label>Nama Referensi</label>
            <input type="text" name="nama_ref" value="<?php echo set_value('nama_satker')?> "/>
			<?php echo form_error('nama_ref', '<div class="error">', '</div>'); ?>
        </p>
		
		<p>
            <label>Nama File</label>
            <input type="text" name="nama_file" value="<?php echo set_value('nama_file')?> "/>
			<?php echo form_error('nama_file', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Kategori Referensi</label>
            <select name="id_referensi_kat">
                <option value="">&nbsp;</option>
                <?php foreach ($kategori->result() as $value): ?>
                <?php if (set_value('id_referensi_kat') == $value->id_referensi_kat): ?>
                    <option selected value="<?php echo $value->id_referensi_kat ?>"><?php echo $value->nama_kat ?></option>
                    <?php else: ?>
                    <option value="<?php echo $value->id_referensi_kat ?>"><?php echo $value->nama_kat ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>