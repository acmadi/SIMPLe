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

            <?php $class = (hari_kerja($value->tanggal) > 5) ? 'class="red-row"' : ''; // Ngecek hari kerja sudah diatas 5 hari atau belum ?>

                <tr <?php echo $class ?>>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
                    <td><?php echo table_tanggal($value->tanggal) ?></td>
                    <td><?php echo hari_kerja($value->tanggal) ?></td>
                    <td><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></td>
                    <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>

                    <?php if ($this->uri->segment(4) == 6): ?>
                    <td class="action">
                        <a href="#" class="button green" onclick="return confirm('Anda yakin menyetujui tiket ini?')">Disetujui</a>
                        <a href="#" class="button red" onclick="return confirm('Anda yakin menolak tiket ini?')">Ditolak</a>
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