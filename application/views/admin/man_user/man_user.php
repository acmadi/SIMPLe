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



<ul id="nav">
    <li><a href="#tab1">Manajemen User</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
	<?php
    // TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }
    if ($this->session->flashdata('notice')) {
        echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
    }
    if ($this->session->flashdata('info')) {
        echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
    }
    ?>
    <div style="display: none;" id="tab1" class="tab_konten">
        <div class="table"> 
            <div id="head">
                <form id="form-cari" action="<?php echo site_url('admin/man_user_cari')?>" method="post">
					Cari : <input id="teks-cari" type="text" name="fcari" value="" placeholder="Pencarian user" /> <input class="button blue-pill" type="submit" value="Enter"/>
                </form>
                
                <a href="<?php echo site_url('admin/man_user_tambah')?>"><input id="btn-kanan-atas" class='button blue-pill' type="submit" value="Tambah User"/></a>
                
            </div>
            <div id="tail">               
       			<table id="tableOne" class="yui" style="margin:20px 0px 10px 0px; padding-right:30px; text-align:left;">   
                    <thead>
                        <tr>            		    
                            <th class="short">ID User</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Nama Unit</th>
                            <th>Level</th>
                            <th class="action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

					<?php $i = 1;foreach($result as $d): ?>
                        <tr>
                            <td class="short"><?php echo $d->id_user?></td>
                            <td><?php echo $d->username?></td>
                            <td><?php echo $d->nama?></td>
                            <td><?php echo $d->nama_unit?></td>
                            <td><?php echo $d->nama_lavel?></td>
                            <td class="action">
                                <a title="surat kerja" href="<?php echo site_url('admin/man_user_surat_kerja/index/'.$d->id_user)?>"  /><img src="<?php echo base_url(); ?>images/icon_suratkerja.png"/></a>
                                <a title="reset password" href="<?php echo site_url('admin/man_user/reset_password/'.$d->id_user)?>"  onclick='return resetpassword()' /><img src="<?php echo base_url(); ?>images/reload.png"/></a>
                                <a title="ubah" href="<?php echo site_url('admin/man_user_ubah/index/'.$d->id_user)?>" /><img src="<?php echo base_url(); ?>images/edit.png"/></a>
                                <?php if ($d->id_lavel != 1): ?>
                                    <a title="hapus" href="<?php echo site_url('admin/man_user/delete/'.$d->id_user)?>"  onclick="return hapus()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
                                <?php endif ?>
                            </td>
                        </tr>
					<?php endforeach; ?>                     
                    </tbody>
                </table>
            </div>
            <div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
            <div id="tail">  
                <table> 
                    <tr>
                        <td><a title="surat kerja" href="#"  onclick='return yesOrNo()' /><img src="<?php echo base_url(); ?>images/icon_suratkerja.png"/></a> &nbsp;  &nbsp; Surat Kerja
                        <td><a title="ubah" href="#"  onclick='return yesOrNo()' /><img src="<?php echo base_url(); ?>images/edit.png"/></a> &nbsp;  &nbsp; Edit User</td>
                    </tr>
                    <tr>
                        <td><a title="reset password" href="#"  onclick='return yesOrNo()' /><img src="<?php echo base_url(); ?>images/reload.png"/></a> &nbsp;  &nbsp; Reset Password</td>
                        <td><a title="hapus" href="#"  onclick='return hapus()' /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a> &nbsp;  &nbsp; Hapus User</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript">
    $(function() {
        $('#teks-cari').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('/admin/man_user/cari') ?>",
                    data: {
                        term: request.term
                    },

                    dataType: 'json',

                    success: function(data) {
                        response(data);
                    }
                })
            },
            delay: 500,
            minLength: 1
        });
    });
</script>