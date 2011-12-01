<ul id="nav">
    <li><a href="#tab1" class="active">Knowledge</a></li>
    <li><a href="#tab2" class="active">Kategori</a></li>
    <li><a href="#tab3" class="active">Tambah Kategori</a></li>
    <li><a href="#tab4" class="active">Tambah Knowledge Base</a></li>
</ul>
<div class="clear"></div>

<div id="konten">
	<div id="msg">
	<?php
	if ($this->session->flashdata('msg')){
		echo $this->session->flashdata('msg');
	}
	?>
	</div>
    <div style="display: none;" id="tab1" class="tab_konten">
	

        <div class="table">
            <div id="tail">
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <th><input type="checkbox"/></th>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Pertanyaan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $i = 0 ?>
                    <?php foreach ($knowledges->result() as $knowledge): ?>
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td><?php echo ++$i?></td>
                        <td><?php echo $knowledge->kat_knowledge_base ?></td>
                        <td><?php echo $knowledge->judul?></td>
                        <td>
                            <a href="<?php echo base_url()?>index.php/admin/knowledge_ubah/index/<?php echo $knowledge->id_knowledge_base?>"><input type="button" value="Ubah" onclick="" style="float:left; font-size:10px; width:80px; height:25px; "/></a>
                            <a href="<?php echo base_url()?>index.php/admin/knowledge/delete/<?php echo $knowledge->id_knowledge_base?>" onclick="return confirm('Anda yakin akan menghapus?');"><input type="button" value="Hapus" onclick="" style="float:left; font-size:10px; width:80px; height:25px; "/></a>
                        </td>
                    </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div style="display: none;" id="tab2" class="tab_konten">
        <table id="tableOne" class="yui"
               style="margin:20px 0px 10px 0px; padding-right:30px; font-size:10px; text-align:left;">
            <thead>
            <tr>
                <th><input type="checkbox"/></th>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            <?php foreach ($categories->result() as $category): ?>
            <tr>
                <td><input type="checkbox"/></td>

                <td><?php echo $i++ ?></td>
                <td><?php echo $category->kat_knowledge_base ?></td>
                <td>
                    <form action="#" onsubmit="return false;"><input type="button" value="Ubah"
                                                                     onclick="tampil_popup('<?php echo $category->id_kat_knowledge_base ?>','<?php echo $category->kat_knowledge_base ?>');"
                                                                     style="float:left; font-size:10px; width:80px; height:25px; "/>
                    </form>
					<a href="<?php echo base_url()?>index.php/admin/knowledge/delete_category/<?php echo $category->id_kat_knowledge_base?>" onclick="return confirm('Anda yakin akan menghapus?');"><input type="button" value="Hapus" onclick="" style="float:left; font-size:10px; width:80px; height:25px; "/></a>
                </td>

            </tr>
            <?php endforeach ?>

            </tbody>
        </table>
    </div>
    <div style="display: none;" id="tab3" class="tab_konten">
        <div id="tail">
            <span style="margin:0px 0px 0px -280px; padding-left:10px; position:absolute; width:50px; height:10px; background:#FFF;">Cari Unit</span>

            <form action="<?php echo site_url('/admin/knowledge/add_category') ?>" method="post"
                  style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px;">
                <table>
                    <tr>
                        <td>Nama Kategori</td>
                        <td>:</td>
                        <td><input type="text" name="category" value=""/></td>
                    </tr>
                </table>
                <br/>
                <input type="reset" style="width:70px; height:23px; margin:0px 76px 0px 20px; font-size:10px; "
                       value="reset"/>
                <input type="submit" style="width:70px; height:23px; font-size:10px; " value="simpan"/>
            </form>
            </form>
        </div>
    </div>
    <div style="display: none;" id="tab4" class="tab_konten">
        <div id="tail">
            <span style="margin:0px 0px 0px -280px; padding-left:10px; position:absolute; width:50px; height:10px; background:#FFF;">Cari Unit</span>

            <form action="<?php echo site_url('/admin/knowledge/add_knowledge') ?>" method="post"
                  style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px;">
                <table>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>
                            <select style="font-size:10px;" name="flist2">
                                <option selected="selected">- pertanyaan -</option>
                                <?php foreach($categories->result() as $lk): ?>
									<option value="<?php echo $lk->id_kat_knowledge_base?>"><?php echo $lk->kat_knowledge_base?></option>
								<?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pertanyaan</td>
                        <td>:</td>
                        <td><input type="text" size="50" name="fjudul2"/></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><textarea cols="100" rows="6" name="fdesripsi2"></textarea></td>
                    </tr>
                    <tr>
                        <td>Jawaban</td>
                        <td>:</td>
                        <td><textarea cols="100" rows="6" name="fjawaban2"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="reset"
                                   style="width:70px; height:23px; margin:0px 76px 0px 20px; font-size:10px; "
                                   value="reset"/><input type="submit" style="width:70px; height:23px; font-size:10px; "
                                                         value="simpan"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/popup-window.js"></script>
<script type="text/javascript">
	setTimeout('$("div#msg").html("")', 3000);
	function tampil_popup(id,kategori){
		$('#pidkat').val(id);
		$('#pkategori').val(kategori);
		popup_show('popup', 'popup_drag', 'popup_exit', 'screen-center', 0, 0);
	}
</script>

<!-- ***** Popup Window **************************************************** -->

<div class="sample_popup" id="popup" style="display: none;">
    <div class="menu_form_header" id="popup_drag">
        <img class="menu_form_exit" id="popup_exit" src="<?php echo base_url()?>css/form_exit.png" alt=""/>
        &nbsp;&nbsp;&nbsp;Ubah Kategori
    </div>
    <div class="menu_form_body">
        <form action="<?php echo site_url("/admin/knowledge/edit_category")?>" method="post" name="formpopup">
			<input type="hidden" name="pidkat" value="" id="pidkat"/>
            <table>
                <tr>
                    <th>Kategori:</th>
                    <td><input class="field" type="text" name="pkategori" value="" id="pkategori"/></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input class="btn" type="submit" value="simpan"/></td>
                </tr>
            </table>
        </form>
    </div>
</div>

