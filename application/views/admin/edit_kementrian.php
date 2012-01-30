<div class="content">

    <h1>Ubah Nama Kementerian <?php echo $kementrian->id_kementrian ?></h1>
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