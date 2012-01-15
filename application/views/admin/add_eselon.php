<div class="content">

    <h1>Tambah Eselon</h1>
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
    <form method="post" action="<?php site_url('/admin/eselon/add') ?>">

        <p>
            <label>Kode Eselon</label>
            <input type="text" name="id_unit" value="<?php echo set_value('id_unit') ?>" maxlength="2"/>
			<?php echo form_error('id_unit', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Nama Eselon</label>
            <input type="text" name="nama_unit" value="<?php echo set_value('nama_unit')?> "/>
			<?php echo form_error('nama_unit', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Nama Kementrian</label>
            <select name="id_kementrian">
                <option value="">&nbsp;</option>
                <?php foreach ($kementrian->result() as $value): ?>
                <?php if (set_value('id_kementrian') == $value->id_kementrian): ?>
                    <option selected value="<?php echo $value->id_kementrian ?>"><?php echo $value->nama_kementrian ?></option>
                    <?php else: ?>
                    <option value="<?php echo $value->id_kementrian ?>"><?php echo $value->nama_kementrian ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
			<?php echo form_error('id_kementrian', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>