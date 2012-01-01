<ul id="nav">
    <li><a href="#tab1" class="active">Knowledge</a></li>
    <li><a href="#tab2" class="">Kategori</a></li>
</ul>
<div class="clear"></div>

<div id="konten">


    <?php
    // TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }
    if ($this->session->flashdata('notice')) {
        echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
    }
    if ($this->session->flashdata('info')) {
        echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
    }
    ?>


    <div style="display: none;" id="tab1" class="tab_konten">

        <a class="button blue-pill" href="<?php echo site_url('/admin/knowledge/add_knowledge') ?>">Tambah</a>

        <div class="table">
            <div id="tail">
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <!--                        <th class="short"><input type="checkbox"/></th>-->
                        <th class="short">No</th>
                        <th class="short">Kategori</th>
                        <th>Pertanyaan</th>
                        <th class="short">Ranah</th>
                        <th class="action">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $i = 0 ?>
                    <?php foreach ($knowledges->result() as $knowledge): ?>
                    <tr>
                        <!--                        <td class="short"><input type="checkbox"/></td>-->
                        <td class="short"><?php echo ++$i?></td>
                        <td><?php echo $knowledge->kat_knowledge_base ?></td>
                        <td><?php echo $knowledge->judul?></td>
                        <td class="short">
                            <?php
                            if ($knowledge->is_public)
                                echo 'Publik';
                            else
                                echo 'Privat';
                            ?>
                        </td>
                        <td class="action">
                            <a href="<?php echo base_url()?>index.php/admin/knowledge_ubah/index/<?php echo $knowledge->id_knowledge_base?>">
                                <img src="<?php echo base_url() . 'images/edit.png' ?>" title="Ubah"/>
                            </a>
                            <a href="<?php echo base_url()?>index.php/admin/knowledge/delete/<?php echo $knowledge->id_knowledge_base?>"
                               onclick="return confirm('Anda yakin akan menghapus?');">
                                <img src="<?php echo base_url() . 'images/delete.png' ?>" title="Hapus"/>
                            </a>
                        </td>
                    </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div style="display: none;" id="tab2" class="tab_konten">

        <a class="button blue-pill" href="<?php echo site_url('/admin/knowledge/add_category') ?>">Tambah</a>

        <div id="tail">
            <table id="tableOne" class="yui">
                <thead>
                <tr>
                    <!--                    <th class="short"><input type="checkbox"/></th>-->
                    <th class="short">No</th>
                    <th>Kategori</th>
                    <th class="action">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                <?php foreach ($categories->result() as $category): ?>
                <tr>
                    <!--                    <td class="short"><input type="checkbox"/></td>-->

                    <td class="short"><?php echo $i++ ?></td>
                    <td><?php echo $category->kat_knowledge_base ?></td>
                    <td class="action">
                        <a href="#"
                           onclick="tampil_popup('<?php echo $category->id_kat_knowledge_base ?>','<?php echo $category->kat_knowledge_base ?>');">
                            <img src="<?php echo base_url() . 'images/edit.png' ?>" title="Ubah"/>
                        </a>
                        <a href="<?php echo base_url()?>index.php/admin/knowledge/delete_category/<?php echo $category->id_kat_knowledge_base?>"
                           onclick="return confirm('Anda yakin akan menghapus?');">
                            <img src="<?php echo base_url() . 'images/delete.png' ?>" title="Hapus"/>
                        </a>
                    </td>

                </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/popup-window.js"></script>
<script type="text/javascript">
    setTimeout('$("div#msg").html("")', 3000);
    function tampil_popup(id, kategori) {
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

