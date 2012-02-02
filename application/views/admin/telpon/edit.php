<div class="content">
    <h1>Ubah Telpon</h1>

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
                <input type="text" name="nama" id="nama" value="<?php echo $telpon->nama ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="telpon">Telpon #1</label></td>
            <td>
                <?php if (set_value('telpon')): ?>
                <input type="text" name="telpon" id="telpon" value="<?php echo set_value('telpon') ?>"/>
                <?php else: ?>
                <input type="text" name="telpon" id="telpon" value="<?php echo $telpon->telpon1 ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="telpon2">Telpon #2</label></td>
            <td>
                <?php if (set_value('telpon2')): ?>
                <input type="text" name="telpon2" id="telpon2" value="<?php echo set_value('telpon2') ?>"/>
                <?php else: ?>
                <input type="text" name="telpon2" id="telpon2" value="<?php echo $telpon->telpon2 ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="keterangan">Keterangan</label></td>
            <td>
                <?php if (set_value('keterangan')): ?>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo set_value('keterangan') ?>"/>
                <?php else: ?>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo $telpon->keterangan ?>"/>
                <?php endif ?>
            </td>
        </tr>
    </table>

    <div>
        <input type="submit" value="Ubah"/>
        <a href="<?php echo site_url('admin/telpon') ?>" class="button green">Batal</a>
    </div>

    <?php echo form_close() ?>

</div>