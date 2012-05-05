<script>
    $(function(){
        $('.chzn-single').chosen();
    })
</script>

<div class="content">
    <h1>List Dokumen Revisi Anggaran</h1>

    <?php generate_notifkasi() ?>

    <?php if ($list_dokumen->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="no">No Tiket</th>
            <th>Tanggal</th>
            <th>Kementerian</th>
            <th>Eselon</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($list_dokumen->result() as $value): ?>

            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
                <td><?php echo table_tanggal($value->tanggal) ?></td>
                <td><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></td>
                <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>
                <td class="action">
                    <a href="<?php echo site_url('frontdesks/cetak_dokumen/' . $value->no_tiket_frontdesk ) ?>"
                       class="cetak button green" target="_blank">Cetak</a>
                    <!--<a href="<?php echo site_url('frontdesks/edit/' . $value->no_tiket_frontdesk ) ?>" class="button yellow">Edit</a>-->
                    <a href="<?php echo site_url('frontdesks/eskalasi/' . $value->no_tiket_frontdesk) ?>"
                       onclick="return confirm('Anda yakin akan melakukan eskalasi?') ? true : false"
                       class="button blue">Kirim</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

    <?php else: ?>

    <?php echo '<div class="notification yellow">Tidak ada dokumen</div>' ?>

    <?php endif; ?>

</div>