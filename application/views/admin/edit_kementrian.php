<div class="page-header">
    <h2>Ubah Nama Kementerian
        <small>ID <?php echo $kementrian->id_kementrian ?></small>
    </h2>
</div>

<form method="post" action="<?php site_url('/admin/kementrian/edit/' . $kementrian->id_kementrian) ?>"
      class="form-horizontal">

    <div class="control-group <?php echo form_error('id_kementrian') ? 'error' : '' ?>">
        <div class="control-label">
            <label>Kode Kementerian</label>
        </div>

        <div class="controls">
            <input type="text" value="<?php echo $kementrian->id_kementrian ?>" disabled/>
        </div>
    </div>

    <div class="control-group <?php echo form_error('nama_kementrian') ? 'error' : '' ?>">
        <div class="control-label">
            <label>Nama Kementerian</label>
        </div>

        <div class="controls">
            <input type="text" name="nama_kementrian" value="<?php echo $kementrian->nama_kementrian ?>" style="width: 500px;"/>
            <?php echo form_error('nama_kementrian', '<span class="help-inline">', '</span>'); ?>
        </div>
    </div>

    <div class="form-actions">
        <input type="submit" class="btn btn-primary" value="Simpan"/>
        <a href="<?php echo site_url('admin/kementrian') ?>" class="btn">Kembali</a>
    </div>
</form>
