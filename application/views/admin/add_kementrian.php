<div class="content">

    <h1>Tambah Kementrian</h1>
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
    <form method="post" action="<?php site_url('/admin/kementrian/add') ?>">

        

        <p>
            <label>Kode Kementrian</label>
            <input type="text" name="id_kementrian" value="<?php echo set_value('id_kementrian') ?>" maxlength="3"/>
			<?php echo form_error('id_kementrian', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Nama Kementrian</label>
            <input type="text" name="nama_kementrian" value="<?php echo set_value('nama_kementrian')?> "/>
			<?php echo form_error('nama_kementrian', '<div class="error">', '</div>'); ?>
        </p>

        

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>