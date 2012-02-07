<style type="text/css">
    table.form td {
        padding: 10px 0;
    }
    table.form td:nth-child(odd) {
        padding-right: 20px;
    }
</style>

<div class="content">
    <h1>Tambah Telepon Baru</h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php echo site_url('telepon/add') ?>">
        <fieldset>
            <table class="form">
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" name="nama" id="nama" value="<?php echo set_value('nama') ?>" /> * </td>
                </tr>
                <tr>
                    <td><label for="telepon1">Telepon #1</label></td>
                    <td><input type="text" name="telepon1" id="telepon1" value="<?php echo set_value('telepon1') ?>" /> * </td>
                </tr>
                <tr>
                    <td><label for="telepon2">Telepon #2</label></td>
                    <td><input type="text" name="telepon2" id="telepon2" value="<?php echo set_value('telepon2') ?>" /></td>
                </tr>
                <tr>
                    <td><label for="keterangan">Keterangan</label></td>
                    <td><input type="text" name="keterangan" id="keterangan" value="<?php echo set_value('keterangan') ?>"/></td>
                </tr>
            </table>
        </fieldset>

        <div>
            <input type="submit" value="Tambah" class="button green"/>
            <a href="<?php echo site_url('telepon') ?>" class="button">Batal</a>
            Penambahan nomor telepon baru akan melalui tahap moderasi oleh administrator
        </div>

    </form>
</div>