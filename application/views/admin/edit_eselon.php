<div class="content">

    <h1>Ubah Nama Eselon <?php echo $eselon->id_unit ?></h1>

    <form method="post" action="<?php site_url('/admin/eselon/edit/' . $eselon->id_unit) ?>">

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
            <label>Kode Eselon</label>
            <input type="text" value="<?php echo $eselon->id_unit?>" disabled/>
        </p>

        <p>
            <label>Nama Eselon</label>
            <input type="text" name="nama_unit" value="<?php echo $eselon->nama_unit ?>"/>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>