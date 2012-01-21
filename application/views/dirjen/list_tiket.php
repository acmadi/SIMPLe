<div class="content">

    <h1>Daftar Tiket Frontdesk - Anggaran <?php echo $this->uri->segment(3) ?></h1>

    <?php if ($lists->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="no">No Tiket</th>
            <th class="short">Tanggal Pengajuan</th>
            <th class="no">Proses (Hari)</th>
            <th>Kementrian</th>
            <th>Eselon</th>
<!--            <th>Posisi</th>-->

            <?php if ($this->uri->segment(4) == 6): ?>
            <th>&nbsp;</th>
            <?php endif ?>

        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($lists->result() as $value): ?>

            <?php $class = (hari_kerja($value->tanggal) > 5) ? 'class="red-row"' : ''; // Ngecek hari kerja sudah diatas 5 hari atau belum ?>

                <tr <?php echo $class ?>>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
                    <td><?php echo table_tanggal($value->tanggal) ?></td>
                    <td><?php echo hari_kerja($value->tanggal) ?></td>
                    <td><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></td>
                    <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>
<!--                    <td>--><?php //echo $value->lavel ?><!--</td>-->

                    <td class="action">
                        <?php if ($value->lavel == 6): ?>
                            <?php if ($value->is_active == 2): ?>

                            <a href="<?php echo site_url('dirjen/diterima/' . $value->no_tiket_frontdesk) ?>" class="button green">Diterima</a>
                            <a href="javascript:void(0)" class="button disabled">Ditetapkan</a>
                            <a href="javascript:void(0)" class="button disabled">Ditolak</a>


                            <?php else: ?>

                            <a href="javascript:void(0)" class="button disabled">Diterima</a>
                            <a href="#" class="button green" onclick="return confirm('Anda yakin menetapkan tiket ini?')">Ditetapkan</a>
                            <a href="<?php echo site_url('dirjen/reject/' . $value->no_tiket_frontdesk) ?>" class="button red" onclick="return confirm('Anda yakin menolak tiket ini?')">Ditolak</a>

                            <?php endif; ?>
                        <?php endif; ?>
                    </td>

                </tr>

            <?php endforeach ?>
        </tbody>
    </table>

    <?php else: ?>
    Data kosong
    <?php endif ?>
</div>