<ul id="nav">
    <li><a href="#tab1" class="active">Manajemen Ubah Forum</a></li>
</ul>
<div class="clear"></div>
    <div id="konten">
        <div style="display: none;" id="tab1" class="tab_konten">


            <div class="table">
                <form action="<?php echo site_url('/admin/man_forum/update_kategori'); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8"
                      style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; font-size:12px">
					  <?php if (isset($item->id_kat_forum)) echo form_hidden('id', $item->id_kat_forum);?>
                    <table>
                        
                        <tr>
                            <td>Nama Kategori Forum</td>
                            <td>:</td>
                            <td><input type="text" size="65" value="<?php echo $item->kat_forum;?>" name="judul_kategori"/></td>
                        </tr>
                        
                    </table>
					<input class="button blue-pill" type="submit" value="Ubah"/>
					<a href="<?php echo site_url('/admin/man_forum') ?>" class="button gray-pill">Batal</a>
                </form>
                
            </div>

