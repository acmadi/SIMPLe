<ul id="nav">
    <li><a href="#tab1" class="active">Akses Kontrol / Tambah</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">

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

        <div class="table">
            <div id="tail">
                <form action="<?php echo site_url("/admin/akses_kontrol/update");?>" method="post">
                    <?php if (isset($ubah->kode_unit)) echo form_hidden('fid', $ubah->kode_unit);?>
                    <div class="form">
                        <p>
                            <label>No Level</label>
                            <input type="text" name="fid" value="<?php echo $ubah->kode_unit?>"/>
                        </p>

                        <p>
                            <label>Nama Level</label>
                            <input type="text" name="fnamalevel" value="<?php echo $ubah->nama_unit?>"/>
                        </p>

                        <p>
                            <input class="button blue-pill" type="submit" value="simpan"/></a>
                            <input class="button blue-pill" type="reset" value="reset"/>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
