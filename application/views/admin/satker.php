<div class="content">

    <h1>Satker</h1>

    <a href="<?php echo site_url('/admin/satker/add/') ?>" class="button blue-pill">Tambah Satker</a>

    <form method="get" action="<?php echo site_url('/admin/satker/index/') ?>" style="text-align: right;">
        <input type="text" name="cari"/>
        <input type="submit" name="submit" value="Cari" class="button blue-pill"/>
    </form>

    <table style="width: 100%;">
        <thead>
        <tr>
            <th class="short">No</th>
            <th class="short">Kode Satker</th>
            <th>Nama Satker</th>
            <th>Kementrian</th>
            <th class="action">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td class="short"><?php echo $i++ ?></td>
            <td class="short"><a href="<?php echo site_url('/admin/satker/view_satker/' . $value->id_satker) ?>"><?php echo $value->id_satker ?></a></td>
            <td style=""><a href="<?php echo site_url('/admin/satker/view_satker/' . $value->id_satker) ?>"><?php echo $value->nama_satker ?></a></td>
            <td style=""><?php echo $value->nama_kementrian ?></td>
            <td class="action">
                <a href="<?php echo site_url('/admin/satker/edit/' . $value->id_satker) ?>" class="button blue-pill">Edit</a>
            </td>
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>

    <?php echo $this->pagination->create_links() ?>

</div>