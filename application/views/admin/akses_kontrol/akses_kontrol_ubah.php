<ul id="nav">
    <li><a href="#tab1" class="active">Akses Kontrol / Ubah Level</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">
		<?php echo validation_errors(); ?>
		<div id="msg">
		
		</div>
        <div class="table">
            <div id="tail">
				<form action="<?php echo site_url("/admin/akses_kontrol_ubah/save");?>" method="post">
				<?php if(isset($ubah->kode_unit)) echo form_hidden('fid',$ubah->kode_unit);?>
                <table id="tableOne" class="yui">
                    <tr>
                        <td>No Level</td>
                        <td>:</td>
                        <td><?php echo $ubah->kode_unit?></td>
                    </tr>
                    <tr>
                        <td>Nama Level</td>
                        <td>:</td>
                        <td><input type="text" name="fnamalevel" value="<?php echo $ubah->nama_unit?>" style="font-size:10px;"/></td>
                    </tr>
                </table>
                <br/>

                <div style="float:right;">
                    <input type="reset" value="reset" style="width:70px; height:24px; font-size:10px; "/>
					<input type="submit" value="simpan" style="width:70px; height:24px; font-size:10px; "/></a>
                </div>
            </div>
        </div>
    </div>
</div>
