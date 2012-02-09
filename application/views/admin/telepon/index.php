<div class="content">

    <h1>Daftar Telepon</h1>

    <a href="<?php echo site_url('admin/telepon/add') ?>" class="button green">Tambah Telepon</a>

    <?php if ($telepon->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Nama</th>
            <th>Telepon 1</th>
            <th>Telepon 2</th>
            <th>Keterangan</th>
            <th>Disetujui</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="6">&nbsp;</td>
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
            <td>
                <?php echo ($value->approved) ? 'Ya' : 'Tidak' ?>
            </td>
            <td class="action">
                <a href="<?php echo site_url('admin/telepon/edit/' . $value->id) ?>" class="button blue">Ubah</a>
                <a href="<?php echo site_url('admin/telepon/delete/' . $value->id) ?>" onclick="return confirm('Anda yakin menghapus telepon ini?')"
                   class="button red">Hapus</a>
            </td>
        </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php else: ?>

    <div class="notification yellow">Tidak ada data telepon ditemukan</div>

    <?php endif; ?>
</div>