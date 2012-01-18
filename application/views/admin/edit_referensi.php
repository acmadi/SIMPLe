<div class="content">

    <h1>Ubah Nama Referensi <?php echo $referensi->id_referensi ?></h1>
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