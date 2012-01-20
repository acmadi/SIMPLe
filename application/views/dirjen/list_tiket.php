<div class="content">


    <?php if ($lists->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="short">No Tiket</th>
            <th class="short">Tanggal Pengajuan</th>
            <th class="short">Proses (Hari)</th>
            <th>Kementrian</th>
            <th>Eselon</th>

            <?php if ($this->uri->segment(4) == 6): ?>
            <th>Aksi</th>
            <?php endif ?>

        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($lists->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td>
                <?php
                $date1 = new DateTime();
                $date2 = new DateTime($value->tanggal);
                $day = $date2->diff($date1);
                if ($day->days > 4) {
                    echo '<span style="font-weight: bold; font-size: 13px; color: tomato;">' . $day->days . '</span>';
                } elseif ($day->days == 4) {
                    echo '<span style="font-weight: bold; font-size: 13px; color: yellow; background: black; padding: 0 4px;">' . $day . '</span>';
                } else {
                    echo '<span style="">' . $day->days . '</span>';
                }
                ?>
            </td>
            <td><?php echo $value->nama_kementrian ?></td>
            <td><?php echo $value->nama_unit ?></td>

            <?php if ($this->uri->segment(4) == 6): ?>
            <td class="action">
                <a href="#" class="button blue-pill">Disetujui</a>
                <a href="#" class="button gray-pill">Ditolak</a>
            </td>
            <?php endif ?>

        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php else: ?>
    Data kosong
    <?php endif ?>
</div>