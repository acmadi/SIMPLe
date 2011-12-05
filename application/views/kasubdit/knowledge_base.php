    <ul id="nav">
        <li><a href="#tab1" class="active">Knowledge</a></li>
        <li><a href="#tab2">Kategori</a></li>
        <li><a href="#tab3">Tambah Kategori</a></li>
        <li><a href="#tab4">Tambah Knowledge Base</a></li>
    </ul>
    <div class="clear"></div>
    <div id="konten">
    	<div style="display: none;" id="tab1" class="tab_konten">
			
            
<div class="table">
    <div id="tail">                  
<table id="tableOne" class="yui">    
	<thead>
		<tr>            		    
		    <th><input type="checkbox" /></th>
			<th>No</th>
			<th>Kategori</th>
			<th>Pertanyaan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		    <td><input type="checkbox" /></td>
			<td>1</td>
			<td>Peraturan</td>
			<td>Bagaimana perundang-undangan anggaran</td>
            <td>
<a title="ubah" href="knowledge_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return yesOrNo()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
            </td>
		</tr>
		<tr>
		    <td><input type="checkbox" /></td>
			<td>2</td>
			<td>Ketentuan</td>
			<td>Nama Pertanyaan..?</td>
            <td>
<a title="ubah" href="knowledge_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return yesOrNo()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
            </td>
		</tr>
		<tr>
		    <td><input type="checkbox" /></td>
			<td>3</td>
			<td>Peraturan</td>
			<td>Bagaimana perundang-undangan anggaran</td>
            <td>
<a title="ubah" href="knowledge_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return yesOrNo()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
            </td>
		</tr>
		<tr>
		    <td><input type="checkbox" /></td>
			<td>4</td>
			<td>Ketentuan</td>
			<td>Nama Pertanyaan..?</td>
            <td>
<a title="ubah" href="knowledge_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return yesOrNo()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a>
            </td>
		</tr>
	</tbody>
</table>
</div>
</div>


        </div>
    	<div style="display: none;" id="tab2" class="tab_konten">           
<table id="tableOne" class="yui" style="margin:20px 0px 10px 0px; padding-right:30px; text-align:left;">    
	<thead>
		<tr>            		    
		    <th><input type="checkbox" /></th>
			<th>No</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		    <td><input type="checkbox" /></td>
			<td>01</td>
			<td>Peraturan</td>
            <td>
<a title="ubah" href="knowledge_kategori_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return yesOrNo()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a></td>
		</tr>
		<tr>
		    <td><input type="checkbox" /></td>
			<td>02</td>
			<td>Perundang-Undangan</td>
            <td>
<a title="ubah" href="knowledge_kategori_ubah" /><img src="<?php echo base_url(); ?>images/edit.png"/></a> 
        <a title="hapus" href="man_user"  onclick="return yesOrNo()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a></td>
		</tr>
	</tbody>
</table>
        </div>
    	<div style="display: none;" id="tab3" class="tab_konten">
	<div id="tail">
        <span style="margin:0px 0px 0px -280px; padding-left:10px; position:absolute; width:50px; height:10px; background:#FFF;">Cari Unit</span>
        <form action="#" method="post" style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px;">
        <table>
        <tr>
        <td>Nama Kategori</td>
        <td>:</td>
        <td><input type="text" value="" /></td>
        </tr>
        </table><br />
        <input type="button" style="width:70px; height:26px; margin:0px 76px 0px 20px;" value="reset" />
        <input type="button" style="width:70px; height:26px;" value="simpan" />
        </form>
        </form>
    </div>
        </div>
    	<div style="display: none;" id="tab4" class="tab_konten">
	<div id="tail">
        <span style="margin:0px 0px 0px -280px; padding-left:10px; position:absolute; width:50px; height:10px; background:#FFF;">Cari Unit</span>
        <form action="#" method="post" style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px;">
        <table>
        <tr>
        <td>Kategori</td>
        <td>:</td>
        <td>
        <select>
        <option selected="selected">- pertanyaan -</option>
        <option>ABCD</option>
        <option>EFGH</option>
        </select>
        </td>
        </tr>
        <tr>
        <td>Pertanyaan</td>
        <td>:</td>
        <td><input type="text" size="50"/></td>
        </tr>
        <tr>
        <td>Deskripsi</td>
        <td>:</td>
        <td><textarea cols="100" rows="6"></textarea></td>
        </tr>
        <tr>
        <td>Jawaban</td>
        <td>:</td>
        <td><textarea cols="100" rows="6"></textarea></td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td>
        <input type="button" style="width:70px; height:26px; margin:0px 76px 0px 20px;" value="reset" /><input type="button" style="width:70px; height:26px; " value="simpan" /></td>
        </tr>
        </table>
        </form>
    </div>
        </div>
    </div>
    


