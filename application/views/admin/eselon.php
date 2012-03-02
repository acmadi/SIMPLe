<div class="content">

    <h1>Eselon</h1>

    <?php generate_notifkasi() ?>
	
    <a href="<?php echo site_url('/admin/eselon/add/') ?>" class="button blue-pill">Tambah Eselon</a>

    <form method="get" action="<?php echo site_url('/admin/eselon/index/') ?>" style="text-align: right;">
        <input type="text" name="cari"/>
        <input type="submit" name="submit" value="Cari" class="button blue-pill"/>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th class="short">No</th>
            <th>Kementerian</th>
            <th>Eselon</th>
            <th class="action">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td class="short"><?php echo $i++ ?></td>
            <td style=""><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></td>
            <td style=""><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></a></td>
            <td class="action">
                <a href="<?php echo site_url('/admin/eselon/edit/' . $value->id_kementrian . '/' . $value->id_unit) ?>" class="button blue-pill">Edit</a>
                <a href="<?php echo site_url('/admin/eselon/delete/' . $value->id_kementrian . '/' . $value->id_unit) ?>" class="button gray-pill"
                   onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>

    <?php echo $this->pagination->create_links() ?>

</div>