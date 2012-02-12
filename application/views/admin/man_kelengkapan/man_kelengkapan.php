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



<ul id="navxxx" style="display:none">
    <li><a href="#tab1">Manajemen Kelengkapan</a></li>
</ul>
<div class="clear"></div>
<div class="content" id="kontenxxx">
    <h1>Manajemen Kelengkapan</h1>

    <?php generate_notifkasi() ?>

    <div style="" id="tab1" class="tab_konten">
        <div class="table"> 
            <div id="head">
                <form id="form-cari" action="<?php echo site_url('admin/man_kelengkapan_doc/index')?>" method="post">
					Cari : <input id="teks-cari" type="text" name="keyword" value="<?php echo $isian_form;?>" placeholder="Pencarian kelengkapan" /> <input class="button blue-pill" type="submit" value="Enter"/>
                </form>
                
                <a href="<?php echo site_url('admin/man_kelengkapan_tambah')?>"><input id="btn-kanan-atas" class='button blue-pill' type="submit" value="Tambah Kelengkapan"/></a>
                
            </div>
            <div id="tail">               
       			<table id="tableOne" class="yui" style="margin:20px 0px 10px 0px; padding-right:30px; text-align:left;">   
                    <thead>
                        <tr>            		    
                            <th class="short">No</th>
                            <th>Kelengkapan</th>
                            <th class="action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

					<?php $i = 1;foreach($result as $d): ?>
                        <tr>
                            <td class="short"><?php echo $i++?></td>
                            <td><?php echo $d->nama_kelengkapan?></td>
                            <td class="action">
                                <a title="ubah" href="<?php echo site_url('admin/man_kelengkapan_ubah/index/'.$d->id_kelengkapan)?>" /><img src="<?php echo base_url(); ?>images/edit.png"/></a>
                                <a title="hapus" href="<?php echo site_url('admin/man_kelengkapan_doc/delete/'.$d->id_kelengkapan)?>"  onclick="return hapus()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
                               
                            </td>
                        </tr>
					<?php endforeach; ?>                     
                    </tbody>
                </table>
            </div>
            <div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
        </div>
    </div>
    
    
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript">
    $(function() {
        $('#teks-cari').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('/admin/man_kelengkapan_doc/cari') ?>",
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