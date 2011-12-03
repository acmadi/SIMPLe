<ul id="nav">
    <li><a href="#tab1" class="active">Kategori Forum</a></li>
    <li><a href="#tab2" class="active">Tambah Kategori Forum</a></li>
    <li><a href="#tab3" class="active">Tambah Forum</a></li>
</ul>
<div class="clear"></div>

    

    <div id="konten">

        <?php
        if ($this->session->flashdata('msg')){
            echo '<div class="msg">';
            echo $this->session->flashdata('msg');
            echo '</div>';
        }
        ?>

        <div style="display: none;" id="tab1" class="tab_konten">
            <div class="table">
                <div id="head">
                    <form id="textfield-search" action="man_forum_cari"><input type="text"
                                                                               value="keyword type in here.."
                                                                               style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                        <div id="search"><input type="submit" value="Search"
                                                style="width:100px; height:23px; font-size:10px; "/></div>
                    </form>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th><input type="checkbox"/></th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>Download</td>
                            <td>Peraturan RUU 2012</td>
                            <td>
                                <span class="button_kecil"><a title="View" href="man_keu_daftar_brg_del.php?id=59"
                                                              onclick='return yesOrNo()'/><img
                                        src="<?php echo base_url(); ?>images/view.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Edit" href="man_forum_ubah"
                                                              onclick='return yesOrNo()'/><img
                                        src="<?php echo base_url(); ?>images/edit.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Delete" href="man_keu_daftar_brg_up.php?id=59"
                                                              onClick="return hapusForum()"><img
                                        src="<?php echo base_url(); ?>images/delete.png"
                                        style="width:20px; height:20px; "/></a></span>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>Informasi</td>
                            <td>Judul Informasi</td>
                            <td>
                                <span class="button_kecil"><a title="View" href="man_keu_daftar_brg_del.php?id=59"
                                                              onclick='return yesOrNo()'/><img
                                        src="<?php echo base_url(); ?>images/view.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Edit" href="man_forum_ubah"
                                                              onclick='return yesOrNo()'/><img
                                        src="<?php echo base_url(); ?>images/edit.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Delete" href="man_keu_daftar_brg_up.php?id=59"
                                                              onClick="return hapusForum()"><img
                                        src="<?php echo base_url(); ?>images/delete.png"
                                        style="width:20px; height:20px; "/></a></span>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>Pengumuman</td>
                            <td>Pengumuman Revisi</td>
                            <td>
                                <span class="button_kecil"><a title="View" href="man_keu_daftar_brg_del.php?id=59"
                                                              onclick='return yesOrNo()'/><img
                                        src="<?php echo base_url(); ?>images/view.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Edit" href="man_forum_ubah"
                                                              onclick='return yesOrNo()'/><img
                                        src="<?php echo base_url(); ?>images/edit.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Delete" href="man_keu_daftar_brg_up.php?id=59"
                                                              onClick="return hapusForum()"><img
                                        src="<?php echo base_url(); ?>images/delete.png"
                                        style="width:20px; height:20px; "/></a></span>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>Report Problem</td>
                            <td>Pengumuman Revisi</td>
                            <td>
                                <span class="button_kecil"><a title="View" href="man_keu_daftar_brg_del.php?id=59"
                                                              onclick='return yesOrNo()'/><img
                                        src="<?php echo base_url(); ?>images/view.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Edit" href="man_forum_ubah"
                                                              onclick='return yesOrNo()'/><img
                                        src="<?php echo base_url(); ?>images/edit.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="Delete" href="man_keu_daftar_brg_up.php?id=59"
                                                              onClick="return hapusForum()"><img
                                        src="<?php echo base_url(); ?>images/delete.png"
                                        style="width:20px; height:20px; "/></a></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="display: none;" id="tab2" class="tab_konten">
            <div id="tail">
                <form action="<?php echo site_url('/admin/man_forum/add_category') ?>" method="post"
                      style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px;">
                    <table>
                        <tr>
                            <td>Nama Kategori Forum: </td>
                            <td><input type="text" name="kat_forum" value=""/></td>
                        </tr>
                    </table>
                    <br/>
                    <input type="reset" style="width:70px; height:23px; margin:0px 76px 0px 20px; font-size:10px; " value="Reset"/>
                    <input type="submit"    style="width:70px; height:23px; font-size:10px; " value="Tambah"/>
                </form>
            </div>
        </div>
        <div style="display: none;" id="tab3" class="tab_konten">


            <div class="table">
                <form action="#" method="post"
                      style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; font-size:12px">
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
                            <td><input type="text" size="65"/></td>
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
                <input class="button" type="button" value="Tambah"
                       style="width:80px; height:25px; float:right; margin:20px 0px 0px 0px; font-size:10px; "/>
                <input type="button" value="reset"
                       style="width:80px; height:25px; float:right; margin:20px 10px 0px 0px; font-size:10px; "/>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>