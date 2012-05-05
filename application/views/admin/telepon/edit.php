<div class="content">
    <div class="page-header">
        <h1>Ubah Telepon</h1>
    </div>

    <?php generate_notifkasi() ?>

    <form method="post" action="" class="form-horizontal">


        <div class="control-group">
            <label for="nama" class="control-label">Nama</label>

            <div class="controls">
                <?php if (set_value('nama')): ?>
                <input type="text" name="nama" id="nama" value="<?php echo set_value('nama') ?>"/>
                <?php else: ?>
                <input type="text" name="nama" id="nama" value="<?php echo $telepon->nama ?>"/>
                <?php endif ?>

            </div>
        </div>


        <div class="control-group">
            <label for="telepon" class="control-label">Telepon #1</label>

            <div class="controls">
                <?php if (set_value('telepon')): ?>
                <input type="text" name="telepon" id="telepon" value="<?php echo set_value('telepon') ?>"/>
                <?php else: ?>
                <input type="text" name="telepon" id="telepon" value="<?php echo $telepon->telepon1 ?>"/>
                <?php endif ?>

            </div>
        </div>
        <div class="control-group">
            <label for="telepon2" class="control-label">Telepon #2</label>

            <div class="controls">
                <?php if (set_value('telepon2')): ?>
                <input type="text" name="telepon2" id="telepon2" value="<?php echo set_value('telepon2') ?>"/>
                <?php else: ?>
                <input type="text" name="telepon2" id="telepon2" value="<?php echo $telepon->telepon2 ?>"/>
                <?php endif ?>

            </div>
        </div>
        <div class="control-group">
            <label for="keterangan" class="control-label">Keterangan</label>

            <div class="controls">
                <?php if (set_value('keterangan')): ?>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo set_value('keterangan') ?>"/>
                <?php else: ?>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo $telepon->keterangan ?>"/>
                <?php endif ?>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label">Status</label>

            <div class="controls">
                <select name="approved">
                    <?php if ($telepon->approved): ?>
                    <option value="1" selected="selected">Ya</option>
                    <option value="0">Tidak</option>
                    <?php else: ?>
                    <option value="1">Ya</option>
                    <option value="0" selected="selected">Tidak</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>


        <div class="form-actions">
            <input type="submit" value="Ubah" class="btn btn-primary"/>
            <a href="<?php echo site_url('admin/telepon') ?>" class="btn">Batal</a>
        </div>

    </form>

</div>