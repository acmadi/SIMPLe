<div class="content">

    <h1>Kementrian</h1>

    <a href="<?php echo site_url('/admin/kementrian/add/') ?>" class="button blue-pill">Tambah Kementrian</a>

    <form method="get" action="<?php echo site_url('/admin/kementrian/index/') ?>" style="text-align: right;">
        <input type="text" name="cari"/>
        <input type="submit" name="submit" value="Cari" class="button blue-pill"/>
    </form>

    <table style="width: 100%;">
        <thead>
        <tr>
            <th class="short">No</th>
            <th class="short">Kode Kementrian</th>
            <th>Kementrian</th>
            <th class="action">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td class="short"><?php echo $i++ ?></td>
            <td class="short"><a href="<?php echo site_url('/admin/kementrian/view_kementrian/' . $value->id_kementrian) ?>"><?php echo $value->id_kementrian ?></a></td>
            <td style=""><a href="<?php echo site_url('/admin/kementrian/view_kementrian/' . $value->id_kementrian) ?>"><?php echo $value->nama_kementrian ?></a></td>
            
            <td class="action">
                <a href="<?php echo site_url('/admin/kementrian/edit/' . $value->id_kementrian) ?>" class="button blue-pill">Edit</a>
            </td>
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>

    <?php echo $this->pagination->create_links() ?>

</div>