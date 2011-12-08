<div class="content">

    <h1>Tambah Knowledge Baru</h1>

    <form action="<?php echo site_url('/admin/knowledge/add_knowledge') ?>" method="post">

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

        <fieldset>
            <legend>Sumber Jawaban</legend>

            <p>
                <label>Nama Nara Sumber</label>

                <input type="text"/>
            </p>


            <p>
                <label>Jabatan</label>

                <input type="text"/>
            </p>

            <p>
                <label>Bukti file</label>

                <input type="file"/>
            </p>
        </fieldset>

        <p>
            <input class="button blue-pill" type="submit" value="Simpan"/>
            <a href="<?php echo site_url('/admin/knowledge') ?>" class="button gray-pill">Batal</a>
        </p>
    </form>
</div>
