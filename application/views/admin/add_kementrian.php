<div class="page-header">
    <h2>Tambah Kementerian</h2>
</div>

<form method="post" action="<?php site_url('/admin/kementrian/add') ?>" class="form-horizontal">

    <div class="control-group <?php echo form_error('id_kementrian') ? 'error' : '' ?>">
        <div class="control-label">
            <label>Kode Kementerian</label>
        </div>
        <div class="controls">
            <input type="text" name="id_kementrian" value="<?php echo set_value('id_kementrian') ?>" maxlength="3"/>
            <?php echo form_error('id_kementrian', '<span class="help-inline">', '</span>'); ?>
        </div>
    </div>

    <div class="control-group <?php echo form_error('nama_kementrian') ? 'error' : '' ?>">
        <div class="control-label">
            <label>Nama Kementerian</label>
        </div>

        <div class="controls">
            <input type="text" name="nama_kementrian" value="<?php echo set_value('nama_kementrian')?> "/>
            <?php echo form_error('nama_kementrian', '<span class="help-inline">', '</span>'); ?>
        </div>
    </div>

    <div class="form-actions">
        <input type="submit" class="btn btn-primary" value="Tambah"/>
        <a href="<?php echo site_url('admin/kementrian') ?>" class="btn">Kembali</a>
    </div>
</form>
</div>