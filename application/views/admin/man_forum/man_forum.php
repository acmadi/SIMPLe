<ul id="nav">
    <li><a href="#tab1" class="active">Forum</a></li>
    <li><a href="#tab2">Kategori Forum</a></li>
    <li><a href="#tab3">Tambah Kategori Forum</a></li>
    <li><a href="#tab4">Tambah Forum</a></li>
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
                    <form id="textfield-search" action="man_forum_cari">
                        <input type="text" placeholder="Type Keywords in here"
                               style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                        <div id="search"><input type="submit" value="Search"
                                                style="width:100px; height:23px; font-size:10px; "/></div>
                    </form>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th style="width: 10px"><input type="checkbox"/></th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th class="action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($forums->result() as $forum): ?>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><?php echo $forum->judul_forum ?></td>
                            <td><?php echo $forum->kat_forum ?></td>
                            <td class="action">
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
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div style="display: none;" id="tab2" class="tab_konten">
            <div class="table">
                <div id="head">
                    <form id="textfield-search" action="man_forum_cari">
                        <input type="text" placeholder="Type Keywords in here"
                               style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                        <div id="search"><input type="submit" value="Search"
                                                style="width:100px; height:23px; font-size:10px; "/></div>
                    </form>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th style="width: 10px"><input type="checkbox"/></th>
                            <th>Kategori</th>
                            <th class="action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($categories->result() as $category): ?>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><?php echo $category->kat_forum ?></td>
                            <td class="action">
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
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div style="display: none;" id="tab3" class="tab_konten">
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
                    <input type="reset" style="width:70px; height:23px; margin:0px 76px 0px 20px; font-size:10px; "
                           value="Reset"/>
                    <input type="submit" style="width:70px; height:23px; font-size:10px; " value="Tambah"/>
                </form>
            </div>
        </div>


        <div style="display: none;" id="tab4" class="tab_konten">


            <div class="table">
                <form action="<?php echo site_url('/admin/man_forum/add_forum') ?>" method="post"
                      enctype="multipart/form-data" accept-charset="utf-8"
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
                            <td><textarea name="isi_forum" cols="58" rows="15">Penjelasan Pertanyaan tersebut</textarea></td>
                        </tr>
                        <tr>
                            <td valign="top">Lampiran</td>
                            <td valign="top">:</td>
                            <td><input type="file" name="lampiran"></td>
                        </tr>
                    </table>

                    <input class="button" type="submit" value="Tambah"
                       style="width:80px; height:25px; float:right; margin:20px 0px 0px 0px; font-size:10px; "/>
                    <input type="button" value="reset"
                       style="width:80px; height:25px; float:right; margin:20px 10px 0px 0px; font-size:10px; "/>
                </form>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>