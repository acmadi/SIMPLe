<div class="content">

    <div class="page-header">
        <h1><?php echo $title ?></h1>
    </div>

    <?php alert() ?>

    <div class="table">
        <div id="tail">
            <form action="<?php echo site_url("/admin/akses_kontrol/edit/" . $ubah->id_lavel);?>" method="post"
                  class="form-horizontal">
                <?php if (isset($ubah->id_lavel)) echo form_hidden('fid', $ubah->id_lavel);?>

                <div class="control-group">
                    <label class="control-label">Level</label>

                    <div class="controls">
                        <input type="text" name="fid" value="<?php echo $ubah->lavel ?>" disabled/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Nama Level</label>

                    <div class="controls">
                        <input type="text" name="fnamalevel" value="<?php echo $ubah->nama_lavel?>"/>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">
                        Simpan
                    </button>
                    <a href="<?php echo site_url('/admin/akses_kontrol') ?>" class="btn">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>