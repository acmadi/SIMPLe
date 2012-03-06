<div class="page-header">
    <h2>Kementerian</h2>
</div>

<?php generate_notifkasi() ?>

<div class="row-fluid">
    <div class="span6">
        <form method="get" action="<?php echo site_url('/admin/kementrian/index/') ?>">
            <input type="text" name="cari" class="search-query"/>
            <input type="submit" name="submit" value="Cari" class="btn"/>
        </form>
    </div>

    <div class="span6" style="text-align: right;">
        <a href="<?php echo site_url('/admin/kementrian/add/') ?>" class="btn btn-primary">Tambah Kementerian</a>
    </div>
</div>

<table class="table">
    <thead>
    <tr>
        <th class="no">No</th>
        <th>Kementerian</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">&nbsp;</td>
    </tr>
    </tfoot>
    <tbody>
    <?php $i = 1 ?>
    <?php foreach ($bla->result() as $value): ?>
    <tr>
        <td><?php echo $i++ ?></td>
        <td><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></a>
        </td>

        <td class="action">
            <a href="<?php echo site_url('/admin/kementrian/edit/' . $value->id_kementrian) ?>"
               class="btn btn-info">Edit</a>
            <a href="<?php echo site_url('/admin/kementrian/delete/' . $value->id_kementrian) ?>"
               class="btn btn-danger"
               onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
        </td>
    </tr>
        <?php endforeach ?>

    </tbody>
</table>

<div class="pagination pagination-centered">
    <?php echo $this->pagination->create_links() ?>
</div>