<div class="content">
    <h1>Daftar Knowledge Base</h1>

    <p style="text-align: right">
        <a href="<?php echo site_url('/kb_koordinator/add') ?>" class="button blue-pill">Tambah</a>
    </p>


    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Tipe</th>
            <th>Ranah</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($knowledge_base->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->judul ?></td>
            <td><?php echo $value->jawaban ?></td>
            <td>
                <?php
                if ($value->tipe == 0) {
                    echo 'Permanent';
                } else {
                    echo 'Workarond';
                }
                ?>
            </td>
            <td>
                <?php
                if ($value->is_public) {
                    echo 'Publik';
                } else {
                    echo 'Privat';
                }
                ?>
            </td>
            <td class="action">
                <a href="<?php echo site_url('/kb_koordinator/edit/' . $value->id_knowledge_base) ?>" class="button blue">Ubah</a>
                <a href="<?php echo site_url('/kb_koordinator/delete/' . $value->id_knowledge_base) ?>" class="button red" onclick="return confirm('Yakin akan menghapus ini?')">Hapus</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>