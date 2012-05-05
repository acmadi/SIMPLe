<div class="content">

    <div class="page-header">
        <h1>Tambah Telepon</h1>
    </div>

    <?php generate_notifkasi() ?>

    <form method="post" action="" class="form-horizontal">

        <div class="control-group">
            <label for="nama" class="control-label">Nama</label>

            <div class="controls">
                <input type="text" name="nama" id="nama"/>
            </div>
        </div>

        <div class="control-group">
            <label for="telepon" class="control-label">Telepon #1</label>

            <div class="controls">
                <input type="text" name="telepon" id="telepon"/>
            </div>
        </div>

        <div class="control-group">
            <label for="telepon2" class="control-label">Telepon #2</label>

            <div class="controls">
                <input type="text" name="telepon2" id="telepon2"/>
            </div>
        </div>

        <div class="control-group">
            <label for="keterangan" class="control-label">Keterangan</label>

            <div class="controls">
                <input type="text" name="keterangan" id="keterangan"/>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" value="Tambah" class="btn btn-primary"/>
            <a href="<?php echo site_url('admin/telepon') ?>" class="btn">Batal</a>
        </div>

    </form>

</div>