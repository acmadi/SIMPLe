<div class="content">

    <h1>Referensi Peraturan</h1>

    <div class="well">
        <div class="pull-left">
            <a href="<?php echo site_url('/admin/referensi/add/') ?>" class="btn"><i class="icon-plus"></i> Tambah
                Referensi</a>
            <a href="<?php echo site_url('/admin/kategori_ref/') ?>" class="btn">Manajemen Kategori Referensi</a>
        </div>
        <div class="pull-right">
            <form method="get" action="<?php echo site_url('/admin/referensi/index/') ?>" class="form-inline">
                <input type="text" name="cari"/>
                <button type="submit" name="submit" value="cari" class="btn"><i class="icon-search"></i></button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Nama Referensi</th>
            <th>Kategori Referensi</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td>
                <a href="<?php echo base_url('upload/referensi/' . $value->nama_file), $value->nama_file ?>">
                    <?php echo $value->nama_ref ?></a>
            </td>
            <td><?php echo $value->nama_kat ?></td>
            <td class="action">
                <a href="<?php echo site_url('/admin/referensi/edit/' . $value->id_referensi) ?>"
                   class="btn btn-info btn-mini">Edit</a>
                <a href="<?php echo site_url('/admin/referensi/delete/' . $value->id_referensi) ?>"
                   class="btn btn-danger btn-mini"
                   onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
            </td>
        </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <div class="pagination" style="text-align: center;">
        <?php echo $this->pagination->create_links() ?>
    </div>

</div>