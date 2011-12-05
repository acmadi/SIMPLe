    <ul id="nav">
        <li><a href="#tab1" class="active">Kategori Forum</a></li>
        <li><a href="#tab2">Tambah Kategori Forum</a></li>
        <li><a href="#tab3">Tambah Forum</a></li>
    </ul>
    <div class="clear"></div>
    <div id="konten">
    	<div style="display: none;" id="tab1" class="tab_konten">            
            <div class="table"> 
                <div id="head">
                <form id="textfield-search" action="man_forum_cari"><input type="text" value="keyword type in here.." style="width:180px; height:18px; font-size:12px; padding:2px 4px 2px 4px; margin-right:5px; "/><div id="search"><input type="submit" value="Search" style="width:100px; height:26px; "/></div></form>
            	</div>
                <div id="tail">               
                    <table id="tableOne" class="yui">    
                        <thead>
                            <tr>            		    
                                <th><input type="checkbox" /></th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td>Download</td>
                                <td>Peraturan RUU 2012</td>
                                <td>
<a title="man_forum_ubah" href="man_forum_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return confirm('Apakah Anda yakin ingin menghapus?');" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td>Informasi</td>
                                <td>Judul Informasi</td>
                                <td>
<a title="man_forum_ubah" href="man_forum_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return confirm('Apakah Anda yakin ingin menghapus?');" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" /></td>		
                                <td>Pengumuman</td>
                                <td>Pengumuman Revisi</td>
                                <td>
<a title="man_forum_ubah" href="man_forum_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return confirm('Apakah Anda yakin ingin menghapus?');" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td>Report Problem</td>
                                <td>Pengumuman Revisi</td>
                                <td>
<a title="man_forum_ubah" href="man_forum_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return confirm('Apakah Anda yakin ingin menghapus?');" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
            </div>
            </div>        
            <div style="display: none;" id="tab2" class="tab_konten">
                <div id="tail">
                    <form action="#" method="post" style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px;">
                    <table>
                    <tr>
                    <td>Nama Kategori Forum</td>
                    <td>:</td>
                    <td><input type="text" value="" /></td>
                    </tr>
                    </table><br />
                    <input type="button" style="width:70px; height:26px; margin:0px 76px 0px 20px; " value="reset" />
                    <a href="man_forum"><input type="button" style="width:70px; height:26px; " value="Tambah" /></a>
                    </form>
                    </form>
                </div>
            </div>
            <div style="display: none;" id="tab3" class="tab_konten">
			
            
<div class="table">
	<form action="#" method="post" style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; font-size:12px"> 
    	<table>
        	<tr>
            	<td width="100px">Kategori Forum</td>
                <td>:</td>
                <td>
                	<select>
                    	<option>Pengumuman</option>
                        <option>Download</option>
                        <option>Informasi</option>
                        <option>Report Problem</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>Judul</td>
                <td>:</td>
                <td><input type="text" size="65" /></td>
            </tr>
            <tr>
            	<td valign="top">Isi</td>
                <td valign="top">:</td>
                <td><textarea cols="58" rows="15">Penjelasan Pertanyaan tersebut</textarea></td>
            </tr>
            <tr>
            	<td valign="top">Lampiran</td>
                <td valign="top">:</td>
                <td><input type="file"></td>
            </tr>
        </table>
    </form>
    <a href="man_forum"><input id="simpan" type="button" value="Tambah" style="width:80px; height:26px; float:right; margin:20px 0px 0px 0px; " /></a>
    <input type="button" value="reset" style="width:80px; height:25px; float:right; margin:20px 10px 0px 0px; " />
</div>
        </div>
        
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>        