<ul id="nav">
    <li><a href="#tab1" class="active">Akses Kontrol / Tambah</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">

        <?php generate_notifkasi() ?>


        <div class="table">
            <div id="tail">
                <form action="<?php echo site_url("/admin/akses_kontrol/save");?>" method="post">

                    <div class="form">
                        <p>
                            <label>Level</label>
                            <input type="text" name="fid" value="<?php echo $tambah->fid?>" maxlength="16" />
                        </p>

                        <p>
                            <label>Nama Level</label>
                            <input type="text" name="fnamalevel" value="<?php echo $tambah->fnamalevel?>"/>
                        </p>

                        <p>
                            <input class="button blue-pill" type="submit" value="simpan"/></a>
                            <a href="<?php echo site_url('/admin/akses_kontrol/') ?>" class="button gray-pill">Batal</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>