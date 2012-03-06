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



<ul id="navxxx" style="display:none">
    <li><a href="#tab1">Manajemen User</a></li>
</ul>
<div class="clear"></div>
<div class="content" id="kontenxxx">
    <div class="page-header">
        <h2>Manajemen User</h2>
    </div>
    <?php generate_notifkasi() ?>
    <div style="" id="tab1" class="tab_konten">
        <div class="table">
            <div id="head">

                <div class="row-fluid">
                    <div class="span6">
                        <form id="form-cari" action="<?php echo site_url('admin/man_user/index')?>" method="post">
                            <input id="teks-cari" type="text" name="keyword" class="search-query"
                                   value="<?php echo $isian_form;?>" placeholder="Pencarian user"/>
                            <input class="btn" type="submit" value="Cari"/>
                        </form>
                    </div>

                    <div class="span6" style="text-align: right">
                        <a href="<?php echo site_url('admin/man_user_tambah')?>"><input id="btn-kanan-atas"
                                                                                        class='btn btn-primary'
                                                                                        type="submit"
                                                                                        value="Tambah User"/></a>
                    </div>
                </div>

            </div>
            <div id="tail">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="no">ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Nama Unit</th>
                        <th>Level</th>
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
                        <td><?php echo $d->id_user?></td>
                        <td><?php echo $d->username?></td>
                        <td><?php echo $d->nama?></td>
                        <td><?php echo $d->nama_unit?></td>
                        <td><?php echo $d->nama_lavel?></td>
                        <td class="action">
                            <a title="Surat Kerja"
                               href="<?php echo site_url('admin/man_user_surat_kerja/index/' . $d->id_user)?>"/><img
                            src="<?php echo base_url(); ?>images/icon_suratkerja.png"/></a>
                            <a title="Reset Password"
                               href="<?php echo site_url('admin/man_user/reset_password/' . $d->id_user)?>"
                               onclick='return resetpassword()'/><img
                            src="<?php echo base_url(); ?>images/reload.png"/></a>
                            <a title="Ubah"
                               href="<?php echo site_url('admin/man_user_ubah/index/' . $d->id_user)?>"/><img
                            src="<?php echo base_url(); ?>images/edit.png"/></a>
                            <?php if ($d->id_lavel != 1): ?>
                            <a title="Hapus" href="<?php echo site_url('admin/man_user/delete/' . $d->id_user)?>"
                               onclick="return hapus()"/><img
                                src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
                            <?php endif ?>
                        </td>
                    </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination pagination-centered"><?php echo ($pageLink) ? $pageLink : '';?></div>
            <br/>


            <div class="legend">
                <span>
                    <img src="<?php echo base_url(); ?>images/icon_suratkerja.png" width="20"/></a> Surat Kerja
                </span>
                <span>
                    <img src="<?php echo base_url(); ?>images/edit.png" width="20"/></a> Edit User
                </span>
                <span>
                    <img src="<?php echo base_url(); ?>images/reload.png" width="20"/></a> Reset Password
                </span>
                <span>
                    <img src="<?php echo base_url(); ?>images/icon_delete.png" width="20"/> Hapus User
                </span>
            </div>

        </div>
    </div>


    <script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#teks-cari').autocomplete({
                source:function (request, response) {
                    $.ajax({
                        url:"<?php echo site_url('/admin/man_user/cari') ?>",
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