<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.4.2.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ui.core.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ui.position.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ui.autocomplete.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() . 'css/ui-lightness/jquery-ui-1.8.16.custom.css';?>"/>
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
    <h2>Kelengkapan Dokumen</h2>
</div>

<?php generate_notifkasi() ?>

<div class="row-fluid">
    <div class="span6">
        <form id="form-cari" action="<?php echo site_url('admin/man_kelengkapan_doc/index')?>" method="post"
              class="form-horizontal">
            <input id="teks-cari" type="text" name="keyword" value="<?php echo $isian_form;?>"
                   placeholder="Pencarian kelengkapan"/>
            <input class="btn" type="submit" value="Cari"/>
        </form>
    </div>

    <div class="span6" style="text-align: right">
        <a href="<?php echo site_url('admin/man_kelengkapan_tambah')?>">
            <input id="btn-kanan-atas"
                   class='btn btn-primary'
                   type="submit"
                   value="Tambah Kelengkapan Dokumen"/>
        </a>
    </div>

</div>

<table class="table">
    <thead>
    <tr>
        <th class="no">No</th>
        <th>Kelengkapan</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">&nbsp;</td>
    </tr>
    </tfoot>
    <tbody>

    <?php $i = 1;foreach ($result as $d): ?>
    <tr>
        <td><?php echo $i++?></td>
        <td><?php echo $d->nama_kelengkapan?></td>
        <td class="action">
            <a title="Ubah" class="btn btn-info"
               href="<?php echo site_url('admin/man_kelengkapan_ubah/index/' . $d->id_kelengkapan)?>"/>Ubah</a>
            <a title="Hapus" class="btn btn-danger"
               href="<?php echo site_url('admin/man_kelengkapan_doc/delete/' . $d->id_kelengkapan)?>"
               onclick="return confirm('Anda yakin akan menghapus kelengkapan dokumen ini?')"/>Hapus</a>

        </td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<div class="pagination"><?php echo ($pageLink) ? $pageLink : '' ?></div>


<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript">
    $(function () {
        $('#teks-cari').autocomplete({
            source:function (request, response) {
                $.ajax({
                    url:"<?php echo site_url('/admin/man_kelengkapan_doc/cari') ?>",
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