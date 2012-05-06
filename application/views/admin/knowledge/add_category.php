<div class="content">

    <div class="page-header">
        <h1>Tambah Kategori Knowledge Baru</h1>
    </div>

    <?php generate_notifkasi() ?>


    <form action="<?php echo site_url('/admin/knowledge/add_category') ?>" method="post" class="form-horizontal">

        <div class="control-group">
            <label class="control-label">Nama Kategori</label>

            <div class="controls">
                <input type="text" name="category" value=""/>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <a href="<?php echo site_url('/admin/knowledge/') ?>" class="btn">Batal</a>
        </div>

    </form>

</div>