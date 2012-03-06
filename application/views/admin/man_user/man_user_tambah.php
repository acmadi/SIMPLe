<div class="page-header">
    <h3>Tambah User</h3>
</div>

<?php generate_notifkasi() ?>

<form method="post" action="<?php echo site_url('admin/man_user_tambah/add')?>" class="form-horizontal">

    <div class="control-group">
        <label class="control-label">Username</label>

        <div class="controls">
            <input type="text" value="" size="48" name="fusername" maxlength="18"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Password</label>

        <div class="controls">
            <input type="password" size="48" name="fpassword"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Ulangi Password</label>

        <div class="controls">
            <input type="password" size="48" name="fpassword2"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Nama</label>

        <div class="controls">
            <input type="text" value="" size="48" name="fnama"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Email</label>

        <div class="controls">
            <input type="text" value="" size="48" name="femail"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Nomor Telepon</label>

        <div class="controls">
            <input type="text" value="" size="48" name="ftelp"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Level</label>

        <div class="controls">
            <select name="flevel" id="flevel" class="chzn-single" data-placeholder="Pilih Level"
                    style="width: 500px;">
                <option></option>
                <?php foreach ($list_level as $a): ?>
                <option value="<?php echo $a->id_lavel?>"
                        title="<?php echo $a->id_lavel ?>"><?php echo $a->nama_lavel?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Departemen</label>

        <div class="controls">
            <select name="fdepartemen" id="fdepartemen" class="chzn-single"
                    data-placeholder="Pilih Departemen" style="width: 500px;">
                <option></option>
                <?php foreach ($list_unit as $b): ?>
                <option value="<?php echo $b->id_unit_satker?>"><?php echo $b->nama_unit?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="form-actions">
        <input type="submit" class="btn btn-primary" value="Tambah User Baru"/>
        <a href="<?php echo site_url('/admin/man_user') ?>" class="btn">Kembali</a>
    </div>
</form>


