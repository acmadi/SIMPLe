<div class="content">

    <h1>Kategori Referensi</h1>

    <a href="<?php echo site_url('/admin/kategori_ref/add/') ?>" class="button blue-pill">Tambah Kategori</a>

    <form method="get" action="<?php echo site_url('/admin/kategori_ref/index/') ?>" style="text-align: right;">
        <input type="text" name="cari"/>
        <input type="submit" name="submit" value="Cari" class="button blue-pill"/>
    </form>

    <table style="width: 100%;">
        <thead>
        <tr>
            <th class="short">No</th>
            <th class="short">Kode Kategori</th>
            <th>Kategori</th>
            <th class="action">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td class="short"><?php echo $i++ ?></td>
            <td class="short"><?php echo $value->id_referensi_kat ?></a></td>
            <td style=""><?php echo $value->nama_kat ?></a></td>
            
            <td class="action">
                <a href="<?php echo site_url('/admin/kategori_ref/edit/' . $value->id_referensi_kat) ?>" class="button blue-pill">Edit</a>
                <a href="<?php echo site_url('/admin/kategori_ref/delete/' . $value->id_referensi_kat) ?>" class="button blue-pill">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>

    <?php echo $this->pagination->create_links() ?>

</div>