<div class="content">
    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>No Tiket</th>
            <th>Nama / Username CS</th>
            <th>Kategori</th>
            <th>Topik</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($jawaban_cs->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->id ?></td>
            <td><?php echo $value->nama ?> (<?php echo $value->username ?>) </td>
            <td><?php echo $value->kat_knowledge_base ?></td>
            <td><?php echo $value->pertanyaan ?></td>
            <td><?php echo $value->description ?></td>
            <td><?php echo $value->jawaban ?></td>
            <td class="action">
                <a href="#" class="button blue">Ubah</a>
                <a href="http://localhost/" onclick="return confirm('Anda yakin menghapus telepon ini?')" class="button red">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>