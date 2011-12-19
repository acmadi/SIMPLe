<div class="content">
	
    <h1>Tambah Kategori Knowledge Baru</h1>
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
    <div id="tail">
        <form action="<?php echo site_url('/admin/knowledge/add_category') ?>" method="post">

            <div class="form">
                <p>
                    <label>Nama Kategori</label>
                    <input type="text" name="category" value=""/>
                </p>

                <p>
                    <input type="submit" class="button blue-pill" value="Simpan"/>
                    <a href="<?php echo site_url('/admin/knowledge') ?>" class="button gray-pill">Batal</a>
                </p>
            </div>
        </form>
    </div>

</div>