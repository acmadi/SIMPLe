<div class="content">
    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Nama</th>
            <th>Telpon 1</th>
            <th>Telpon 2</th>
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
        <?php foreach ($telpon->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->nama ?></td>
            <td><?php echo $value->telpon1 ?></td>
            <td><?php echo $value->telpon2 ?></td>
            <td><?php echo $value->keterangan ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>