    <ul id="nav">
        <li><a href="#tab1" class="active">Manajemen User / Ubah </a></li>
    </ul>
    <div class="clear"></div>
    <div id="konten">
    	<div style="display: none;" id="tab1" class="tab_konten">
			
            
<div class="table">
    <div id="tail"> 
		<div id="msg">

            <?php generate_notifkasi() ?>

		</div>
        <form action="<?php echo site_url('admin/man_kelengkapan_ubah/ubah')?>" method="post">
		<?php echo form_hidden('id',$item->id_kelengkapan);?>
		<table id="tableOne" class="yui">
            <tr>
                <td width="100px">Nama Kelengkapan</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $item->nama_kelengkapan?>" size="48" name="ekelengkapan" /></td>
            </tr>
    
        </table>
		<br />
        <div class="submit_right">
			<a href="<?php echo site_url('/admin/man_kelengkapan_doc') ?>" class="button gray-pill">Batal</a>
            <input type="submit" class="button blue-pill" value="simpan" />
        </div>
        </form>
	</div>
    
</div>

        </div>
    </div>