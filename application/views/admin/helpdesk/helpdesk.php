<?php generate_notifkasi() ?>

<form action="<?php echo site_url('/admin/helpdesk/index') ?>" method="post" class="form-inline well">

    <label class="control-label">Cari berdasarkan</label>
    <?php echo form_dropdown('fcari', $pilihan, $cari, 'class="input-medium"');?>

    <label class="control-label">Keyword</label>
    <input type="text" value="<?php echo $keyword;?>" placeholder="Keyword" name="fkeyword" id="teks-cari"/>

    <button type="submit" class="btn input-query" value="Cari"/>
    <i class="icon-search"></i></button>

</form>


<table class="table">
    <thead>
    <tr>
        <th>No. Tiket</th>
        <th>Tanggal</th>
        <th>Nama Satker</th>
        <th>Pertanyaan</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($result as $tiket): ?>
    <tr>
        <td><?php echo sprintf('#%05d', $tiket->no_tiket_helpdesk) ?></td>
        <td><?php echo $tiket->tanggal ?></td>
        <td><?php echo $tiket->nama_satker ?></td>
        <td><?php echo $tiket->pertanyaan ?></td>
        <td><?php echo $tiket->status ?></td>

    </tr>
        <?php endforeach ?>

    </tbody>
</table>

<div class="pagination"><?php echo ($pageLink) ? 'Halaman ' . $pageLink : '';?></div>