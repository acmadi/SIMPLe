<div class="content">

    <h1>Refensi</h1>

    <a href="<?php echo site_url('/admin/referensi/add/') ?>" class="button blue-pill">Tambah Referensi</a>
	 <a href="<?php echo site_url('/admin/kategori_ref/') ?>" class="button blue-pill">Manajemen Kategori Referensi</a>

    <form method="get" action="<?php echo site_url('/admin/referensi/index/') ?>" style="text-align: right;">
        <input type="text" name="cari"/>
        <input type="submit" name="submit" value="Cari" class="button blue-pill"/>
    </form>

    <table style="width: 100%;">
        <thead>
        <tr>
            <th class="short">No</th>
            <th class="short">Kode Referensi</th>
            <th>Nama Referensi</th>
            <th>Nama File</th>
			<th>Kategori Referensi</th>
            <th class="action">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td class="short"><?php echo $i++ ?></td>
            <td class="short"><?php echo $value->id_referensi ?></a></td>
            <td style=""><?php echo $value->nama_ref ?></a></td>
            <td style=""><?php echo $value->nama_kat ?></td>
            <td class="action">
                <a href="<?php echo site_url('/admin/referensi/edit/' . $value->id_referensi) ?>" class="button blue-pill">Edit</a>
            </td>
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>

    <?php echo $this->pagination->create_links() ?>

</div>