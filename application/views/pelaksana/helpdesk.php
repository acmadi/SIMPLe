<div class="content">

    <h1>Help Desk</h1>

    <?php if ($antrian->num_rows() > 0): ?>

    <?php echo search('pelaksana/helpdesk/search'); ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="no">Tanggal</th>
            <th class="no">No Antrian</th>
            <th class="no">Nama Satker</th>
            <th class="no">Subjek</th>
            <th class="no">Prioritas</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($antrian->result() as $value): ?>
        <tr>
            <td class="no"><?php echo $i++ ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><?php echo $value->no_tiket_helpdesk ?></td>
            <td><?php echo $value->nama_satker ?></td>
            <td><?php echo $value->pertanyaan ?></td>
            <td><?php echo $value->prioritas ?></td>
            <td class="action">
                <a class="button green" href="<?php echo site_url('/pelaksana/helpdesk/view/' . $value->no_tiket_helpdesk) ?>">Jawab</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!--            <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a-->
    <!--                    href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>-->

        <?php else: ?>

    Tidak ada pertanyaan yang dieskalasi atau tidak ditemukan pertanyaan.

    <?php endif ?>
</div>

