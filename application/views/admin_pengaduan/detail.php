<!--<ul id="nav">-->
<!--    <li><a href="#tab1" class="active">Akses Kontrol</a></li>-->
<!--</ul>-->

<div class="content">
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



    <h1>Detail Pengaduan</h1>
    <!--
    <fieldset>
        <legend>Kategori</legend>
        <label><input type="checkbox" checked="checked" disabled>
            <?php if ($detail_pengaduan->tipe == 'kl'):
        echo 'K/L';
    else:
        echo 'Umum';
    endif;

    ?>
        </label>
    </fieldset>
-->

    <?php if ($detail_pengaduan->tipe == 'kl'):
    $detail_satker = $this->db->query("SELECT tbs.id_satker,tbs.nama_satker,tbu.id_unit,tbu.nama_unit,tbk.id_kementrian,tbk.nama_kementrian FROM
												   tb_satker tbs, tb_unit tbu,tb_kementrian tbk WHERE tbs.id_unit = tbu.id_unit AND tbs.id_kementrian  = tbu.id_kementrian
												   AND tbs.id_kementrian = tbk.id_kementrian AND tbs.id_satker = ?", array($detail_pengaduan->id_satker))->row();
    ?>
    <!--
            <fieldset>
                <legend>Satker</legend>
                <p>
                    <label>Kode - Nama K/L</label>
                    <label>:</label>
                    <label><?php echo $detail_satker->id_kementrian . ' - ' . $detail_satker->nama_kementrian?></label>
                </p>

                <p>
                    <label>Nama Eseolon 1</label>
                    <label>:</label>
                    <label><?php echo $detail_satker->nama_unit?></label>
                </p>

                <p>
                    <label>Kode - Nama Satker</label>
                    <label>:</label>
                    <label><?php echo $detail_satker->id_satker . ' - ' . $detail_satker->nama_satker?></label>
                </p>
            </fieldset>
-->
    <?php endif; ?>

    <fieldset>
        <legend>Identitas</legend>

        <table style="width: 100%;">

            <tr>
                <td>
                    <label>Nama </label>
                </td>
                <td>
                    <?php echo $detail_pengaduan->nama_petugas?>
                </td>
                <td>
                    <label>Telepon</label>
                </td>
                <td>
                    <?php echo $detail_pengaduan->no_hp?>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Instansi</label>
                </td>
                <td>
                    <?php echo $detail_pengaduan->instansi?>
                </td>
                <td>
                    <label>E-mail</label>
                </td>
                <td>
                    <?php echo $detail_pengaduan->email?>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Alamat</label>
                </td>
                <td>
                    <?php echo $detail_pengaduan->alamat?>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

        </table>
    </fieldset>

    <fieldset>
        <legend>Pengaduan</legend>

        <table style="width: 100%;">
            <tr>
                <td style="width: 10%;">
                    <label>Kepada</label>
                </td>
                <td>
                    <?php echo $detail_pengaduan->nama_lavel?>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Pengaduan</label>
                </td>
                <td>
                    <?php echo $detail_pengaduan->pengaduan?>
                </td>
            </tr>
        </table>
    </fieldset>
    <a href="<?php echo site_url('/admin_pengaduan/dashboard') ?>" class="button gray-pill">Kembali</a>

</div>