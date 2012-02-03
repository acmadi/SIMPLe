<div class="content">

    <h1>Forum - <?php echo $kategori->kat_forum ?></h1>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>&nbsp;</th>
            <th>Topik</th>
            <th>Pengirim</th>
            <th>Tanggal</th>
            <th>Jumlah Balasan</th>
        </tr>
        </thead>
        <tbody>

        <?php $i = 1 ?>
        <?php foreach ($forum->result() as $value): ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td>
                    <?php if ($value->file != '' && $value->file != NULL): ?>
                    <img src="<?php echo base_url('images/attachment.gif') ?>" />
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo site_url('forum/view/' . $value->id_forum)?>"><?php echo $value->judul_forum ?></a>
                </td>
                <td><?php echo $value->nama ?></td>
                <td><?php echo table_tanggal($value->tanggal) ?></td>
                <td><?php echo $jumlah_thread[$value->id_forum] ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>