<div class="content">
    <h1>Tambah Knowledge Baru</h1>
    <?php
    // TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }
    if ($this->session->flashdata('notice')) {
        echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
    }
    if ($this->session->flashdata('info')) {
        echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
    }
    ?>

    <?php echo form_open_multipart('admin/knowledge/add_knowledge') ?>
    <fieldset>
        <legend>Pertanyaan</legend>
        <p>
            <label>Kategori</label>

            <select name="flist2">
                <option selected="selected" value=""> - Pilih Kategory -</option>
                <?php foreach ($categories->result() as $lk): ?>
                <option value="<?php echo $lk->id_kat_knowledge_base?>">
                    <?php echo $lk->kat_knowledge_base?>
                </option>
                <?php endforeach;?>
            </select>
        </p>

        <p>
            <label>Ranah</label>
            <select name="is_public">
                <option value="0">Privat</option>
                <option value="1">Publik</option>
            </select>
        </p>

        <p>
            <label>Pertanyaan</label>
            <input type="text" size="50" name="fjudul2"/>
        </p>

        <p>
            <label>Deskripsi</label>
            <textarea cols="100" rows="6" name="fdesripsi2"></textarea>
        </p>

        <p>
            <label>Jawaban</label>
            <textarea cols="100" rows="6" name="fjawaban2"></textarea>
        </p>
    </fieldset>

    <fieldset>
        <legend>Sumber Jawaban</legend>

        <p>
            <label>Nama Nara Sumber</label>

            <input type="text" name="fsumber2"/>
        </p>


        <p>
            <label>Jabatan</label>

            <input type="text" name="fjabatan2"/>
        </p>

        <p>
            <label>Bukti file</label>

            <input type="file" name="ffile2"/>
        </p>
    </fieldset>

    <p>
        <input class="button blue-pill" type="submit" value="Simpan"/>
        <a href="<?php echo site_url('/admin/knowledge') ?>" class="button gray-pill">Batal</a>
    </p>
    <?php echo form_close();?>
</div>
