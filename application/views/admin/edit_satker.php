<div class="content">

    <h1>Ubah Nama Satker <?php echo $satker->id_satker ?></h1>

    <form method="post" action="<?php site_url('/admin/satker/edit/' . $satker->id_satker) ?>">

        <?php
        $errors = validation_errors();
        if (!empty($errors)) {
            echo '<div class="error">' . validation_errors() . '</div>';
        }
        ?>

        <?php
        if ($this->session->flashdata('info')) {
            echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
        }
        ?>

        <p>
            <label>Kode Satker</label>
            <input type="text" value="<?php echo $satker->id_satker ?>" disabled/>
        </p>

        <p>
            <label>Nama Satker</label>
            <input type="text" name="nama_satker" value="<?php echo $satker->nama_satker ?>"/>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>