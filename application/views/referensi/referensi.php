<script>
    var oTable;
    $(document).ready(function () {

        oTable = $('.table').dataTable();
        oTable.fnSort([
            [0, 'asc'],
            [1, 'asc']
        ]);
        oTable.fnAdjustColumnSizing();
        //oTable.fnFilter( 'open', 7 );

        $('#kategori_list').chosen().change(function () {
            oTable.fnFilter($(this).val(), 1);
        })
    });
</script>

<div class="content">
    <h1>Referensi Peraturan</h1>

    <fieldset>
        <legend>Filter berdasarkan kategori</legend>
        <select id="kategori_list" class="chzn-select" data-placeholder="Pilih Kategori" style="width: 300px;">
            <option></option>
            <option value="">Semua</option>
            <?php foreach ($kategori_referensi->result() as $value): ?>
            <option value="<?php echo $value->nama_kat ?>">
                <?php echo $value->nama_kat ?>
            </option>
            <?php endforeach; ?>
        </select>
    </fieldset>

    <?php if ($referensi->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="short">Kategori</th>
            <th class="medium">Referensi</th>
            <th class="short">File</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($referensi->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->nama_kat ?></td>
            <td><?php echo $value->nama_ref ?></td>
            <td>
                <?php
                $file = realpath('upload/referensi/' . $value->nama_file);
                if (file_exists($file) AND $value->nama_file != ''): ?>
                    <a class="button green" href="<?php echo base_url('upload/referensi/' . $value->nama_file);?>">Download</a>
                    <?php else: ?>
                    <span class="button red">Tidak ada file</span>
                    <?php endif; ?>
            </td>

        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php else: ?>

    <div class="notification yellow">Tidak ada data referensi peraturan</div>

    <?php endif; ?>

</div>