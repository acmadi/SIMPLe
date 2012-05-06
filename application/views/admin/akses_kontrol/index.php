<div class="content">

    <?php generate_notifkasi() ?>

    <div class="page-header">
        <h1>Akses Kontrol</h1>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Level</th>
            <th>Nama Level</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($list_kontrol->result() as $item): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $item->lavel ?></td>
            <td><?php echo $item->nama_lavel ?></td>
            <td class="action">

                <a title="Ubah" class="btn btn-info"
                   href="<?php echo site_url("/admin/akses_kontrol/") . '/edit/' . $item->id_lavel ?>">
                    <i class="icon-pencil icon-white"></i> Ubah
                </a>

                <a title="Lihat" class="btn btn-success"
                   href="<?php echo site_url("/admin/akses_kontrol/") . '/view/' . $item->id_lavel ?>">
                    <i class="icon-file icon-white"></i> Lihat
                </a>

            </td>
        </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
