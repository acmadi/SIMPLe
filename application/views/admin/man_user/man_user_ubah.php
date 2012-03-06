<div class="page-header">
    <h2>Ubah User
        <small><?php echo $item->username ?></small>
    </h2>
</div>

<?php generate_notifkasi() ?>

<form action="<?php echo site_url('admin/man_user_ubah/ubah')?>" method="post" class="form-horizontal">
    <?php echo form_hidden('id', $item->id_user);?>

    <div class="control-group">
        <div class="control-label">Username</div>

        <div class="controls">
            <input type="text" value="<?php echo $item->username?>" size="48" name="eusername" maxlength="18"/>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">Nama</div>

        <div class="controls">
            <input type="text" value="<?php echo $item->nama?>" size="48" name="enama"/>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">Email</div>

        <div class="controls">
            <input type="text" value="<?php echo $item->email?>" size="48" name="eemail"/>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">Nomor Telepon</div>

        <div class="controls">
            <input type="text" value="<?php echo $item->no_tlp?>" size="48" name="etelp"/>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">Level</div>

        <div class="controls">
            <select name="elevel" class="chzn-single" style="width: 500px;" data-placeholder="Pilih Level"
                    style="width: 500px;">
                <option></option>
                <?php foreach ($list_level as $a): ?>
                <?php if ($item->id_lavel == $a->id_lavel): ?>
                    <option value="<?php echo $a->id_lavel?>" selected><?php echo $a->nama_lavel?></option>
                    <?php else: ?>
                    <option value="<?php echo $a->id_lavel?>"><?php echo $a->nama_lavel?></option>
                    <?php endif; ?>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">Departemen</div>

        <div class="controls">
            <select name="edepartemen" class="chzn-single" data-placeholder="Pilih Departemen"
                    style="width: 500px;">
                <option></option>
                <?php foreach ($list_unit as $b): ?>
                <?php if ($item->id_unit_satker == $b->id_unit_satker): ?>
                    <option value="<?php echo $b->id_unit_satker?>" selected><?php echo $b->nama_unit?></option>
                    <?php else: ?>
                    <option value="<?php echo $b->id_unit_satker?>"><?php echo $b->nama_unit?></option>
                    <?php endif; ?>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="form-actions">
        <input type="submit" class="btn btn-primary" value="Simpan"/>
        <a href="<?php echo site_url('/admin/man_user') ?>" class="btn">Kembali</a>
    </div>
</form>
