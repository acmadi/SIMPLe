<div class="content">

    <div class="page-header">
        <h1>Ubah Nama Kategori Referensi <?php echo $kategori_ref->id_referensi_kat ?></h1>
    </div>

    <?php echo alert() ?>

    <form method="post" action="<?php site_url('/admin/kategori_ref/edit/' . $kategori_ref->id_referensi_kat) ?>"
          class="form-horizontal">

        <div class="control-group">
            <label class="control-label">Kode Kategori</label>

            <div class="controls">
                <input type="text" value="<?php echo $kategori_ref->id_referensi_kat ?>" disabled/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Nama Kategori</label>

            <div class="controls">
                <input type="text" name="nama_kat" value="<?php echo $kategori_ref->nama_kat ?>" class="control-"/>
                <?php echo form_error('nama_kat', '<div class="error">', '</div>'); ?>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <a href="<?php echo site_url('admin/kategori_ref') ?>" class="btn">Batal</a>
        </div>
    </form>
</div>