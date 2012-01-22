<div class="content">

    <h1>Tiket Helpdesk</h1>

    <!-- <div class="notification yellow">
        Tiket Helpdesk yang dieskalasi ke level 
        <strong><?php echo $nama_level ?></strong>
    </div> -->

    <?php
        echo (isset($flashmessage)) ? $flashmessage : ''; 
    ?>
    
    <br/>

    <?php if ($tikets->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Tanggal</th>
            <th>No Antrian</th>
            <th>Nama Satker</th>
            <th>Subjek</th>
            <th>Prioritas</th>
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
            <?php foreach ($tikets->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><?php echo $value->no_tiket_helpdesk ?></td>
            <td><?php echo $value->nama_satker ?></td>
            <td><?php echo $value->pertanyaan ?></td>
            <td><?php echo $value->prioritas ?></td>
            <td class="action">
                <a class="button green" href="<?php echo site_url('/helpdesks/view/' . $value->id) ?>">Jawab</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <?php else: ?>

    <div class="notification red">
    Tidak ada pertanyaan yang dieskalasi untuk anda jawab.
    </div>

    <?php endif ?>
</div>

