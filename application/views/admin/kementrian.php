<div class="content">

    <h1>Kementerian</h1>

    <?php generate_notifkasi() ?>

    <a href="<?php echo site_url('/admin/kementrian/add/') ?>" class="button blue-pill">Tambah Kementerian</a>

    <form method="get" action="<?php echo site_url('/admin/kementrian/index/') ?>" style="text-align: right;">
        <input type="text" name="cari"/>
        <input type="submit" name="submit" value="Cari" class="button blue-pill"/>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Kementerian</th>
            <th class="action">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td class="no"><?php echo $i++ ?></td>
            <td style=""><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></a></td>
            
            <td class="action">
                <a href="<?php echo site_url('/admin/kementrian/edit/' . $value->id_kementrian) ?>" class="button blue-pill">Edit</a>
                <a href="<?php echo site_url('/admin/kementrian/delete/' . $value->id_kementrian) ?>" class="button gray-pill"
                   onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>

    <?php echo $this->pagination->create_links() ?>

</div>