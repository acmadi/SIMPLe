<div class="content">

    <h1>Daftar Telepon</h1>

    <p style="text-align: right">
        <a href="<?php echo site_url('telepon/add') ?>" class="button green">Tambah Telepon</a>
    </p>

    <?php if ($telepon->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Nama</th>
            <th>Telepon 1</th>
            <th>Telepon 2</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="5">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($telepon->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->nama ?></td>
            <td><?php echo $value->telepon1 ?></td>
            <td><?php echo $value->telepon2 ?></td>
            <td><?php echo $value->keterangan ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php else: ?>

    <div class="notification yellow">Tidak ada data telepon ditemukan</div>

    <?php endif; ?>

</div>