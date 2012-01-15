<div class="content">

    <h1>Ubah Nama Eselon <?php echo $eselon->id_unit ?></h1>
	
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