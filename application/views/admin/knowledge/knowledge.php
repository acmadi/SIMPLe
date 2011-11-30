<ul id="nav">
    <li><a href="#tab1" class="active">Knowledge</a></li>
    <li><a href="#tab2" class="active">Kategori</a></li>
    <li><a href="#tab3" class="active">Tambah Kategori</a></li>
    <li><a href="#tab4" class="active">Tambah Knowledge Base</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
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
                        <td>1</td>
                        <td><?php echo $knowledge->kat_knowledge_base ?></td>
                        <td><?php echo $knowledge->judul?></td>
                        <td>
                            <a href="knowledge_ubah"><input type="button" value="Ubah" onclick=""
                                                            style="float:left; font-size:10px; width:80px; height:25px; "/></a>
                                <input type="button" value="hapus" class="delete" link="<?php echo site_url("/admin/knowledge/delete/{$knowledge->id_knowledge_base}") ?>" style="font-size:10px; width:80px; height:25px;" />
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
                                                                     onclick="popup_show('popup', 'popup_drag', 'popup_exit', 'screen-center', 0, 0);"
                                                                     style="float:left; font-size:10px; width:80px; height:25px; "/>
                    </form>
                    <input type="button" value="hapus" class="delete" link="<?php echo site_url("/admin/knowledge/delete_category/{$category->id_kat_knowledge_base}") ?>" style="font-size:10px; width:80px; height:25px;" />

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

            <form action="#" method="post"
                  style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px;">
                <table>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>
                            <select style="font-size:10px; ">
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
                        <td><input type="button"
                                   style="width:70px; height:23px; margin:0px 76px 0px 20px; font-size:10px; "
                                   value="reset"/><input type="button" style="width:70px; height:23px; font-size:10px; "
                                                         value="simpan"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/popup-window.js"></script>

<!-- ***** Popup Window **************************************************** -->

<div class="sample_popup" id="popup" style="display: none;">
    <div class="menu_form_header" id="popup_drag">
        <img class="menu_form_exit" id="popup_exit" src="form_exit.png" alt=""/>
        &nbsp;&nbsp;&nbsp;Ubah Kategori
    </div>
    <div class="menu_form_body">
        <form action="#">
            <table>
                <tr>
                    <th>Kategori:</th>
                    <td><input class="field" type="text" name="kategori" value="Peraturan"/></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input class="btn" type="submit" value="simpan"/></td>
                </tr>
            </table>
        </form>
    </div>
</div>


<div class="sample_popup" id="popup" style="display: none;">
    <div class="menu_form_header" id="popup_drag">
        <img class="menu_form_exit" id="popup_exit" src="form_exit.png" alt=""/>
        &nbsp;&nbsp;&nbsp;Ubah Kategori
    </div>
    <div class="menu_form_body">
        <form action="#">
            <table>
                <tr>
                    <th>ad:</th>
                    <td><input class="field" type="text" name="kategori" value="Peraturan"/></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input class="btn" type="submit" value="simpan"/></td>
                </tr>
            </table>
        </form>
    </div>
</div>

