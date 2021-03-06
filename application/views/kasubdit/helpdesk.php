<div class="content">

    <h1>Help Desk</h1>

    <?php echo search('kasubdit/helpdesk/search') ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Tanggal</th>
            <th>No Tiket</th>
            <th>Nama Satker</th>
            <th>Subjek</th>
            <th class="short">Prioritas</th>
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
            <td><?php echo $i++ ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><?php echo $value->no_tiket_helpdesk ?></td>
            <td><?php echo $value->nama_satker ?></td>
            <td><?php echo $value->pertanyaan ?></td>
            <td><?php echo $value->prioritas ?></td>
            <td class="action">
                <a class="button green" href="<?php echo site_url('/kasubdit/helpdesk/view/' . $value->no_tiket_helpdesk) ?>">Jawab</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!--            <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a-->
    <!--                    href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>-->
</div>