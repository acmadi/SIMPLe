<style type="text/css">
    .ui-autocomplete {
        max-height: 300px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding to account for vertical scrollbar */
        padding-right: 20px;
    }
</style>

<div class="page-header">
    <h2>Manajemen Unit</h2>
</div>

<?php generate_notifkasi() ?>

<div class="row-fluid">
    <div class="span6">
        <form id="cari_unit" action="<?php echo site_url('/admin/man_unit_cari') ?>" method="post">
            <input type="text" value="" placeholder="Pencarian kode unit" name="fcari" id="teks-cari"
                   class="search-query"/>
            <input class="btn" type="submit" value="Cari"/>
        </form>
    </div>
    <div class="span6" style="text-align: right">
        <a class="btn btn-primary" href="<?php echo site_url('/admin/man_unit_tambah') ?>">Tambah</a>
    </div>
</div>


<table class="table">
    <thead>
    <tr>
        <th>Kode Unit</th>
        <th>Nama Unit</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">&nbsp;</td>
    </tr>
    </tfoot>
    <tbody>

    <?php foreach ($result as $unit): ?>
    <tr>
        <td><?php echo $unit->kode_unit ?></td>
        <td><?php echo $unit->nama_unit ?></td>
        <td class="action">
            <a href="<?php echo site_url('/admin/man_unit_ubah/index/' . $unit->id_unit_satker) ?>"
               class="btn btn-info">
                Ubah
            </a>
            <a href="<?php echo site_url('/admin/man_unit/delete/' . $unit->id_unit_satker) ?>"
               onclick="return confirm('Anda yakin akan menghapus unit ini?')"
               class="btn btn-danger">
                Hapus
            </a>
        </td>
    </tr>
        <?php endforeach ?>

    </tbody>
</table>

<div class="pagination pagination-centered"><?php echo ($pageLink) ? $pageLink : '' ?></div>

<script type="text/javascript">
    $(function () {
        $('#teks-cari').autocomplete({
            source:function (request, response) {
                $.ajax({
                    url:"<?php echo site_url('/admin/man_unit/cari') ?>",
                    data:{
                        term:request.term
                    },

                    dataType:'json',

                    success:function (data) {
                        response(data);
                    }
                })
            },
            delay:500,
            minLength:1
        });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>