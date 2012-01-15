<div class="content">

    <h1>Tambah Kementrian</h1>

    <form method="post" action="<?php site_url('/admin/kementrian/add') ?>">

        <?php
        $errors = validation_errors();
        if (!empty($errors)) {
            echo '<div class="error">' . validation_errors() . '</div>';
        }
        ?>

        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
        }
        if ($this->session->flashdata('error')) {
            echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
        }
        ?>

        <p>
            <label>Kode Kementrian</label>
            <input type="text" name="id_kementrian" value="<?php echo set_value('id_kementrian') ?>" maxlength="3"/>
        </p>

        <p>
            <label>Nama Kementrian</label>
            <input type="text" name="nama_kementrian" value="<?php echo set_value('nama_kementrian')?> "/>
        </p>

        

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>