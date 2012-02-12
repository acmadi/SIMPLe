<div class="content">

    <h1>Tambah Eselon</h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php site_url('/admin/eselon/add') ?>">

        <p>
            <label>Kode Eselon</label>
            <input type="text" name="id_unit" value="<?php echo set_value('id_unit') ?>" maxlength="2"/>
			<?php echo form_error('id_unit', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Nama Eselon</label>
            <input type="text" name="nama_unit" value="<?php echo set_value('nama_unit')?> "/>
			<?php echo form_error('nama_unit', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Nama Kementerian</label>
            <select name="id_kementrian">
                <option value="">&nbsp;</option>
                <?php foreach ($kementrian->result() as $value): ?>
                <?php if (set_value('id_kementrian') == $value->id_kementrian): ?>
                    <option selected value="<?php echo $value->id_kementrian ?>"><?php echo $value->nama_kementrian ?></option>
                    <?php else: ?>
                    <option value="<?php echo $value->id_kementrian ?>"><?php echo $value->nama_kementrian ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
			<?php echo form_error('id_kementrian', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>