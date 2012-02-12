<div class="content">

    <h1>Tambah Satker</h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php site_url('/admin/satker/add') ?>">

        <p>
            <label>Kode Satker</label>
            <input type="text" name="id_satker" value="<?php echo set_value('id_satker') ?>" maxlength="6"/>
			<?php echo form_error('id_unit', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Nama Satker</label>
            <input type="text" name="nama_satker" value="<?php echo set_value('nama_satker')?> "/>
			<?php echo form_error('nama_satker', '<div class="error">', '</div>'); ?>
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
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>