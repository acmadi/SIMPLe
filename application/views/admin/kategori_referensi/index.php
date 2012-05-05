<div class="content">

    <div class="page-header">
        <h1>Kategori Referensi</h1>
    </div>

    <div class="well">
        <div class="pull-left">
            <a href="<?php echo site_url('/admin/kategori_ref/add/') ?>" class="btn">
                <i class="icon-plus"></i> Tambah Kategori</a>
        </div>
        <div class="pull-right">
            <form method="get" action="<?php echo site_url('/admin/kategori_ref/index/') ?>" class="form-inline">
                <input type="text" name="cari"/>
                <button type="submit" name="submit" value="cari" class="btn"><i class="icon-search"></i></button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th class="short">Kode Kategori</th>
            <th>Kategori</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td class="short"><?php echo $value->id_referensi_kat ?></a></td>
            <td style=""><?php echo $value->nama_kat ?></a></td>

            <td class="action">
                <a href="<?php echo site_url('/admin/kategori_ref/edit/' . $value->id_referensi_kat) ?>"
                   class="btn btn-info btn-mini">Edit</a>
                <a href="<?php echo site_url('/admin/kategori_ref/delete/' . $value->id_referensi_kat) ?>"
                   class="btn btn-danger btn-mini"
                   onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
            </td>
        </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <?php echo $this->pagination->create_links() ?>

</div>