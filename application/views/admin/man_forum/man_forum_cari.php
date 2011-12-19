<ul id="nav">
    <li><a href="#tab1" class="active">Forum</a></li>
    <li><a href="#tab2">Kategori Forum</a></li>
    <li><a href="#tab3">Tambah Forum</a></li>
    <li><a href="#tab4">Tambah Kategori Forum</a></li>
</ul>
<div class="clear"></div>



    <div id="konten">

        <?php
        if ($this->session->flashdata('success')) {
			echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
		} elseif ($this->session->flashdata('error')) {
			echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
		} elseif ($this->session->flashdata('info')) {
			echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
		} elseif ($this->session->flashdata('notice')) {
			echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
		}
        ?>

        <div style="display: none;" id="tab1" class="tab_konten">
            <div class="table">
                <div id="head">
                    <form id="textfield-search" action="<?php echo site_url('/admin/man_forum_cari') ?>" method="post">
                        <input type="text" placeholder="Type Keywords in here" name="fcari"/><input type="submit" class="button blue-pill" value="Search" />
                    </form>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                           
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th class="action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($result as $forum): ?>
                        <tr>
                           
                            <td><?php echo $forum->judul_forum ?></td>
                            <td><?php echo $forum->kat_forum ?></td>
                            <td class="action">
                                <span class="button_kecil"><a title="View"
                                                              href="<?php echo site_url('/admin/man_forum_ubah/index/'.$forum->id_forum) ?>"/><img
                                        src="<?php echo base_url(); ?>images/view.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Edit"
                                                              href="<?php echo site_url('/admin/man_forum/edit_forum/' . $forum->id_forum) ?>"/><img
                                        src="<?php echo base_url(); ?>images/edit.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil">
                                    <a title="Delete" 
                                       href="<?php echo site_url('/admin/man_forum/delete/' . $forum->id_forum) ?>" onclick="return yesOrNo()">
                                        <img src="<?php echo base_url(); ?>images/delete.png"
                                             style="width:20px; height:20px; "/>
                                    </a>
                                </span>
                            </td>
                        </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
				<div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
            </div>
        </div>


        <div style="display: none;" id="tab2" class="tab_konten">
            <div class="table">
                
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th>Kategori</th>
                            <th class="action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($categories->result() as $category): ?>
                        <tr>
                            <td><?php echo $category->kat_forum ?></td>
                            <td class="action">
                                <span class="button_kecil"><a title="Edit" href="<?php echo site_url('/admin/man_forum/edit_kategori/'.$category->id_kat_forum) ?>"/><img
                                        src="<?php echo base_url(); ?>images/edit.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil">
                                    <a title="Delete" href="<?php echo site_url('/admin/man_forum/delete_category/' . $category->id_kat_forum) ?>" onclick="return yesOrNo()">
                                        <img src="<?php echo base_url(); ?>images/delete.png" style="width:20px; height:20px; "/>
                                    </a>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div style="display: none;" id="tab3" class="tab_konten">


            <div class="table">
                <form action="<?php echo site_url('/admin/man_forum/add_forum'); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8"
                      style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; font-size:12px">
                    <table>
                        <tr>
                            <td width="100px">Kategori Forum</td>
                            <td>:</td>
                            <td>
                                <select name="id_kat_forum">
                                    <?php foreach ($categories->result() as $category): ?>
                                    <option value="<?php echo $category->id_kat_forum ?>"><?php echo $category->kat_forum ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><input type="text" name="judul_forum" size="65"/></td>
                        </tr>
                        <tr>
                            <td valign="top">Isi</td>
                            <td valign="top">:</td>
                            <td><textarea name="isi_forum" cols="58" rows="15"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Lampiran</td>
                            <td valign="top">:</td>
                            <td><input type="file" name="lampiran"></td>
                        </tr>
                    </table>
					
					<input class="button blue-pill" type="submit" value="Tambah"/>
					<input type="button" value="reset" class="button gray-pill"/>
                                        
                </form>
            </div>
        </div>


        <div style="display: none;" id="tab4" class="tab_konten">
            <div id="tail">
                <form action="<?php echo site_url('/admin/man_forum/add_category') ?>" method="post"
                      style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px;">
                    <table>
                        <tr>
                            <td>Nama Kategori Forum:</td>
                            <td><input type="text" name="kat_forum" value=""/></td>
                        </tr>
                    </table>
                    <br/>
                    <input type="reset" class="button gray-pill"
                           value="Reset"/>
                    <input type="submit" class="button blue-pill" value="Tambah"/>
                </form>
            </div>
        </div>


        <script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>