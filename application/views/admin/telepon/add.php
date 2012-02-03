<div class="content">
    <h1>Tambah Telepon</h1>

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
            <td><input type="text" name="nama" id="nama"/></td>
        </tr>
        <tr>
            <td><label for="telepon">Telepon #1</label></td>
            <td><input type="text" name="telepon" id="telepon"/></td>
        </tr>
        <tr>
            <td><label for="telepon2">Telepon #2</label></td>
            <td><input type="text" name="telepon2" id="telepon2"/></td>
        </tr>
        <tr>
            <td><label for="keterangan">Keterangan</label></td>
            <td><input type="text" name="keterangan" id="keterangan"/></td>
        </tr>
    </table>

    <div>
        <input type="submit" value="Tambah"/>
        <a href="<?php echo site_url('admin/telepon') ?>" class="button green">Batal</a>
    </div>

    <?php echo form_close() ?>

</div>