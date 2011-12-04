<ul id="nav">
    <li><a href="#tab1" class="active">Akses Kontrol / Tambah</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">
		<div id="msg">
		<?php
		if ($this->session->flashdata('msg')){
			echo $this->session->flashdata('msg');
		}
		?>
		</div>
        <div class="table">
            <div id="tail">
				<form action="<?php echo site_url("/admin/akses_kontrol/save");?>" method="post">
                <table id="tableOne" class="yui">
                    <tr>
                        <td>No Level</td>
                        <td>:</td>
                        <td><input type="text" name="fid" value="<?php echo $tambah->fid?>" style="font-size:10px;"/></td>
                    </tr>
                    <tr>
                        <td>Nama Level</td>
                        <td>:</td>
                        <td><input type="text" name="fnamalevel" value="<?php echo $tambah->fnamalevel?>" style="font-size:10px;"/></td>
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
<script type="text/javascript">
	setTimeout('$("div#msg").html("")', 3000);
</script>