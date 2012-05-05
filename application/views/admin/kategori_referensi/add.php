<div class="content">

    <div class="page-header">
        <h1>Tambah Kategori referensi</h1>
    </div>

    <?php echo alert() ?>

    <form method="post" action="<?php echo site_url('/admin/kategori_ref/add') ?>" class="form-horizontal">

        <div class="control-group <?php echo validation_errors() ? 'error' : '' ?>">
            <label class="control-label">Nama Kategori</label>

            <div class="controls">
                <input type="text" name="nama_kat" value="<?php echo set_value('nama_kat')?>" class="control-input"/>
                <?php echo form_error('nama_kat', '<div class="help-inline">', '</div>'); ?>
            </div>

        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <a href="<?php echo site_url('admin/kategori_ref') ?>" class="btn">Batal</a>
        </div>

    </form>
</div>