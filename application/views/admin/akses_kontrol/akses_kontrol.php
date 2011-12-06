<ul id="nav">
    <li><a href="#tab1" class="active">Akses Kontrol</a></li>
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
        <div id="head">
            <form id="insert" action="<?php echo site_url("/admin/akses_kontrol/view_form")?>"><input class="button" type="submit" value="tambah"
                                                                   style="width:100px; height:23px; font-size:10px; "/>
            </form>
            <form id="textfield-search" action="knowledge_cari"><input type="text" value="keyword type in here.."
                                                                       style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                <div id="search"><input type="submit" value="Search"
                                        style="width:100px; height:23px; font-size:10px; "/></div>
            </form>
        </div>
        <div id="tail">
            <table id="tableOne" class="yui">
                <thead>
                <tr>
                    <th class="short"><input type="checkbox"/></th>
                    <th>ID Akun</th>
                    <th>Departemen</th>
                    <th class="action">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($list_kontrol->result() as $item):?>
                <tr>
                    <td class="short"><input type="checkbox"/></td>
                    <td><?php echo $item->kode_unit?></td>
                    <td><?php echo $item->nama_unit?></td>
                    <td class="action">
                            <span class="button_kecil"><a title="Ubah" href="<?php echo site_url("/admin/akses_kontrol_ubah").'/index/'.$item->kode_unit?>"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="<?php echo site_url("/admin/akses_kontrol_lihat").'/index/'.$item->kode_unit?>"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
							<span class="button_kecil"><a title="Lihat" href="<?php echo site_url("/admin/akses_kontrol").'/delete/'.$item->kode_unit?>" onclick="return confirm('Anda yakin akan menghapus?');"><img
                                    src="<?php echo base_url(); ?>images/delete.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <?php	endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
	setTimeout('$("div#msg").html("")', 3000);
</script>