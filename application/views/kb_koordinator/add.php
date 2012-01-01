<div class="content">
    <h1>Edit Knowledge Base</h1>

    <?php
    $errors = validation_errors();
    if (!empty($errors)) {
        echo '<div class="error">' . validation_errors() . '</div>';
    }
    ?>

    <?php
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }
    ?>

    <form method="post" action="<?php echo site_url('/kb_koordinator/add/') ?>">
        <p>
            <label>Kategori</label>
            <select name="id_kat_knowledge_base">

                <?php foreach ($categories->result() as $value): ?>
                <?php if (set_value('id_kat_knowledge_base')): ?>
                    <option selected value="<?php echo $value->id_kat_knowledge_base ?>"><?php echo $value->kat_knowledge_base ?></option>
                    <?php else: ?>
                    <option value="<?php echo $value->id_kat_knowledge_base ?>"><?php echo $value->kat_knowledge_base ?></option>
                    <?php endif ?>
                <?php endforeach ?>

            </select>
        </p>

        <p>
            <label>Nama Nara Sumber</label>
            <input type="text" name="nama_narasumber" value="<?php echo set_value('nama_narasumber') ?>"/>
        </p>

        <p>
            <label>Jabatan Nara Sumber</label>
            <input type="text" name="jabatan_narasumber" value="<?php echo set_value('jabatan_narasumber') ?>"/>
        </p>

        <p>
            <label>Ranah</label>
            <select name="is_public">
                <?php if ($row->is_public): ?>
                <option value="0">Privat</option>
                <option value="1" selected>Publik</option>
                <?php else: ?>
                <option value="0" selected>Privat</option>
                <option value="1">Publik</option>
                <?php endif ?>
            </select>
        </p>

        <p>
            <label>Pertanyaan</label>
            <input type="text" name="judul" value="<?php echo set_value('judul') ?>"/>
        </p>

        <p>
            <label>Jawaban</label><br/>
            <textarea name="jawaban" cols="70" rows="10"><?php set_value('jawaban') ?></textarea>
        </p>

        <p>
            <label>Bukti File</label>
            <input type="file" name="bukti_file"/>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
            <a href="<?php echo site_url('/kb_koordinator/knowledge_base') ?>" class="button gray-pill">Kembali</a>
        </p>

    </form>
</div>