<div class="content">

    <h1>Daftar Tiket yang Melewati Argo</h1>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="short">Tanggal</th>
            <th class="short">Hari</th>
            <th class="short">No Tiket</th>
            <th>Kementerian</th>
            <th>Eselon</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($lists->result() as $value): ?>
        <?php $class = (hari_kerja($value->tanggal) > 5) ? 'class="red-row"' : ''; // Ngecek hari kerja sudah diatas 5 hari atau belum ?>
            <tr <?php echo $class ?>>
            <td><?php echo $i++ ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><?php echo hari_kerja($value->tanggal) ?></td>
            <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td><strong><?php echo $value->id_kementrian?></strong> - <?php echo $value->nama_kementrian ?></td>
            <td><strong><?php echo $value->id_unit?></strong> - <?php echo $value->nama_unit ?></td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
    <br/>

</div>