<div class="content">
    <div class="page-header">
        <h1>Ubah Knowledge</h1>
    </div>

    <?php echo validation_errors(); ?>

    <?php echo form_open_multipart('admin/knowledge_ubah/save', 'class="form-horizontal"'); ?>

    <?php if (isset($ubah->id_knowledge_base)) echo form_hidden('id', $ubah->id_knowledge_base); ?>

    <fieldset>
        <legend>Pertanyaan</legend>

        <div class="control-group">
            <label class="control-label">Kategori</label>

            <div class="controls">
                <select name="fkategori">
                    <option>Peraturan</option>
                    <?php foreach ($list_kat->result() as $lk):
                    if ($lk->id_kat_knowledge_base == $ubah->id_kat_knowledge_base): ?>
                        <option value="<?php echo $lk->id_kat_knowledge_base?>"
                                selected><?php echo $lk->kat_knowledge_base?>
                        </option>
                        <?php else: ?>
                        <option
                            value="<?php echo $lk->id_kat_knowledge_base?>"><?php echo $lk->kat_knowledge_base?></option>
                        <?php endif; ?>
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
                <input type="text"
                       name="fjudul"
                       class="input-xxlarge"
                       value="<?php echo $ubah->judul ?>"/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Deskripsi</label>

            <div class="controls">
                <textarea name="fdeskripsi"
                          rows="6"
                          class="input-xxlarge"><?php echo $ubah->desripsi ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Jawaban</label>

            <div class="controls">
                <textarea name="fjawaban"
                          rows="6"
                          class="input-xxlarge"><?php echo $ubah->jawaban ?></textarea>
            </div>
        </div>

    </fieldset>

    <fieldset>
        <legend>Sumber Jawaban</legend>

        <div class="control-group">
            <label class="control-label">Nama Nara Sumber</label>

            <div class="controls">
                <input type="text" name="fsumber" value="<?php echo $ubah->nama_narasumber?>"/>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label">Jabatan</label>

            <div class="controls">
                <input type="text" name="fjabatan" value="<?php echo $ubah->jabatan_narasumber?>"/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Bukti file</label>

            <div class="controls">
                <input type="file" name="ffile"/>
            </div>
    </fieldset>

    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Simpan"/>
        <a href="<?php echo site_url('/admin/knowledge') ?>" class="btn">Batal</a>
    </div>

    <?php echo form_close(); ?>

</div>
