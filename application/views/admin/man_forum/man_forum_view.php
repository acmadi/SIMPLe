<ul id="nav">
    <li><a href="#tab1" class="active">View Forum</a></li>
</ul>
<div class="clear"></div>
    <div id="konten">
        <div style="display: none;" id="tab1" class="tab_konten">


            <div class="table">
               
                    <table>
                        <tr>
                            <td width="100px">Kategori Forum</td>
                            <td>:</td>
                            <td>
                                <select name="id_kat_forum">
                                   <?php foreach ($categories->result() as $category):
										$e = ($category->id_kat_forum == $forum->id_kat_forum)?'selected':'';
								   ?>
										
										<option value="<?php echo $category->id_kat_forum ?>" <?php echo $e;?>><?php echo $category->kat_forum ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><input type="text" size="65" value="<?php echo $forum->judul_forum;?>" name="judul_forum"/></td>
                        </tr>
                        <tr>
                            <td valign="top">Isi</td>
                            <td valign="top">:</td>
                            <td><textarea cols="58" rows="15" name="isi_forum"><?php echo $forum->isi_forum;?></textarea></td>
                        </tr>
                        <tr>
                            <td valign="top">Lampiran</td>
                            <td valign="top">:</td>
                            <td><?php echo $forum->file?></td>
                        </tr>
                    </table>
					<a href="<?php echo site_url('/admin/man_forum') ?>" class="button gray-pill">Kembali</a>
            
                
            </div>

