<div class="content">

    <div class="page-header">
        <h1>Daftar Telepon</h1>
    </div>

    <div class="well">
        <a href="<?php echo site_url('admin/telepon/add') ?>" class="btn"><i class="icon-plus"></i> Tambah Telepon</a>
    </div>

    <?php if ($telepon->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th rowspan="2">Nama</th>
            <th colspan="2" style="text-align: center;">Telepon</th>
            <th rowspan="2">Keterangan</th>
            <th rowspan="2">Disetujui</th>
            <th rowspan="2">&nbsp;</th>
        </tr>
        <tr>
            <th>#1</th>
            <th>#2</th>
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
            <td><?php echo $value->nama ?></td>
            <td><?php echo $value->telepon1 ?></td>
            <td><?php echo $value->telepon2 ?></td>
            <td><?php echo $value->keterangan ?></td>
            <td>
                <?php echo ($value->approved) ? 'Ya' : 'Tidak' ?>
            </td>
            <td class="action">
                <a href="<?php echo site_url('admin/telepon/edit/' . $value->id) ?>" class="btn btn-info btn-mini">Ubah</a>
                <a href="<?php echo site_url('admin/telepon/delete/' . $value->id) ?>"
                   onclick="return confirm('Anda yakin menghapus telepon ini?')"
                   class="btn btn-danger btn-mini">Hapus</a>
            </td>
        </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php else: ?>

    <div class="notification yellow">Tidak ada data telepon ditemukan</div>

    <?php endif; ?>
</div>

<script>
    $(function(){
        $('.table').dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bInfo": false
        });
    })
</script>