<div class="content">
    <div class="page-header">
        <h1>Tambah Knowledge Baru</h1>
    </div>

    <?php generate_notifkasi() ?>

    <?php echo form_open_multipart('admin/knowledge/add_knowledge', 'class="form-horizontal"') ?>
    <fieldset>
        <legend>Pertanyaan</legend>
        <div class="control-group">
            <label class="control-label">Kategori</label>

            <div class="controls">
                <select name="flist2">
                    <option selected="selected" value=""> - Pilih Kategory -</option>
                    <?php foreach ($categories->result() as $lk): ?>
                    <option value="<?php echo $lk->id_kat_knowledge_base?>">
                        <?php echo $lk->kat_knowledge_base?>
                    </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Ranah</label>

            <div class="controls">
                <select name="is_public">
                    <option value="0">Privat</option>
                    <option value="1">Publik</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Pertanyaan</label>

            <div class="controls">
                <input type="text" size="50" name="fjudul2" class="input-xxlarge"/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Deskripsi</label>

            <div class="controls">
                <textarea rows="6" name="fdesripsi2" class="input-xxlarge"></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Jawaban</label>

            <div class="controls">
                <textarea rows="6" name="fjawaban2" class="input-xxlarge"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Sumber Jawaban</legend>

        <div class="control-group">
            <label class="control-label">Nama Nara Sumber</label>

            <div class="controls">
                <input type="text" name="fsumber2"/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Jabatan</label>

            <div class="controls">
                <input type="text" name="fjabatan2"/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Bukti file</label>

            <div class="controls">
                <input type="file" name="ffile2"/>
            </div>
        </div>
    </fieldset>

    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Simpan"/>
        <a href="<?php echo site_url('/admin/knowledge') ?>" class="btn">Batal</a>
    </div>
    <?php echo form_close();?>
</div>
