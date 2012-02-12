<div class="content">
    <h1>Penyelia - Daftar Pertanyaan</h1>

    <?php generate_notifkasi() ?>

    <?php if ($pertanyaan->num_rows() > 0): ?>


    <div style="text-align: right; margin-bottom: 20px">
        <span id="tambah" class="xxlabel"><?php echo $pertanyaan->num_rows() ?> TIKET</span>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="no">Tanggal</th>
            <th class="no">Nama Satker</th>
            <th class="no">Pertanyaan</th>
            <th class="no">Prioritas</th>
            <th class="no">&nbsp;</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        </tfoot>

        <tbody>

            <?php $i = 1 ?>
            <?php foreach ($pertanyaan->result() as $value): ?>
        <tr>
            <td class="no"><?php echo $i++ ?></td>
            <td class="no"><?php echo table_tanggal($value->tanggal) ?></td>
            <td class="no"><?php echo ($value->nama_satker) ? $value->nama_satker : 'UMUM' ?></td>
            <td class="no"><?php echo $value->pertanyaan ?></td>
            <td class="no">
                <?php if ($value->prioritas == 'low'): ?>
                <span style="color: green; font-weight: bold;">LOW</span>
                <?php elseif ($value->prioritas == 'medium'): ?>
                <span style="color: orange; font-weight: bold;">MEDIUM</span>
                <?php else: ?>
                <span style="color: red; font-weight: bold;">HIGH</span>
                <?php endif ?>
            </td>
            <td class="action">
                <a href="<?php echo site_url('supervisors/jawab/' . $value->id) ?>" class="button blue-pill"/>Jawab</a>
            </td>
        </tr>
            <?php endforeach ?>

        </tbody>
    </table>


    <?php else: ?>
    Tidak ada pertanyaan yang dieskalasi
    <?php endif; ?>

</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
