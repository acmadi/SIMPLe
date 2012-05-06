<div class="content">

    <div class="page-header">
        <h1>Kalender Libur</h1>
    </div>

    <?php generate_notifkasi() ?>

    <div class="well">
        <a href="<?php echo site_url('/admin/calendar/add') ?>" class="btn btn-primary">
            <i class="icon-plus icon-white"></i> Tambah Kalender Baru</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>No.</th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Hari</th>
            <th>Keterangan</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($holiday->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->year ?></td>
            <td><?php echo $value->month ?></td>
            <td><?php echo $value->day ?></td>
            <td><?php echo $value->keterangan ?></td>
            <td class="action">
                <a href="<?php echo site_url("/admin/calendar/edit/{$value->id}") ?>" class="btn btn-info">Edit</a>
                <a href="<?php echo site_url("/admin/calendar/delete/{$value->year}/{$value->month}/{$value->day}") ?>"
                   class="btn btn-danger calendar"
                   onclick="return confirm('Yakin mau menghapus tanggal ini?')">Hapus</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>