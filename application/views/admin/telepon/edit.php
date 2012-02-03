<div class="content">
    <h1>Ubah Telepon</h1>

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
    if (validation_errors()) {
        echo validation_errors();
    }
    ?>

    <?php echo form_open('') ?>

    <table>
        <tr>
            <td><label for="nama">Nama</label></td>
            <td>
                <?php if (set_value('nama')): ?>
                <input type="text" name="nama" id="nama" value="<?php echo set_value('nama') ?>"/>
                <?php else: ?>
                <input type="text" name="nama" id="nama" value="<?php echo $telepon->nama ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="telepon">Telepon #1</label></td>
            <td>
                <?php if (set_value('telepon')): ?>
                <input type="text" name="telepon" id="telepon" value="<?php echo set_value('telepon') ?>"/>
                <?php else: ?>
                <input type="text" name="telepon" id="telepon" value="<?php echo $telepon->telepon1 ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="telepon2">Telepon #2</label></td>
            <td>
                <?php if (set_value('telepon2')): ?>
                <input type="text" name="telepon2" id="telepon2" value="<?php echo set_value('telepon2') ?>"/>
                <?php else: ?>
                <input type="text" name="telepon2" id="telepon2" value="<?php echo $telepon->telepon2 ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="keterangan">Keterangan</label></td>
            <td>
                <?php if (set_value('keterangan')): ?>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo set_value('keterangan') ?>"/>
                <?php else: ?>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo $telepon->keterangan ?>"/>
                <?php endif ?>
            </td>
        </tr>
    </table>

    <div>
        <input type="submit" value="Ubah"/>
        <a href="<?php echo site_url('admin/telepon') ?>" class="button green">Batal</a>
    </div>

    <?php echo form_close() ?>

</div>