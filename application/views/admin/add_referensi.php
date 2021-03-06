<div class="content">

    <h1>Tambah Referensi</h1>

    <?php generate_notifkasi() ?>

    <?php echo form_open_multipart('admin/referensi/add') ?>

        <!-- <p>
            <label>Kode Referensi</label>
            <input type="text" name="id_referensi" value="<?php echo set_value('id_referensi') ?>" maxlength="6"/>
			<?php echo form_error('id_referensi', '<div class="error">', '</div>'); ?>
        </p> -->

        <p>
            <label>Nama Referensi</label>
            <input type="text" name="nama_ref" value="<?php echo set_value('nama_satker')?> "/>
			<?php echo form_error('nama_ref', '<div class="error">', '</div>'); ?>
        </p>
		
		<p>
            <label>File Lampiran</label>
            <input type="file" name="file"/>
			<?php echo form_error('file', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Kategori Referensi</label>
            <select name="id_referensi_kat">
                <option value="">&nbsp;</option>
                <?php foreach ($kategori->result() as $value): ?>
                <?php if (set_value('id_referensi_kat') == $value->id_referensi_kat): ?>
                    <option selected value="<?php echo $value->id_referensi_kat ?>"><?php echo $value->nama_kat ?></option>
                    <?php else: ?>
                    <option value="<?php echo $value->id_referensi_kat ?>"><?php echo $value->nama_kat ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>