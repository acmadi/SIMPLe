<div class="content">

    <h1>Ubah Nama Kementrian <?php echo $kementrian->id_kementrian ?></h1>

    <form method="post" action="<?php site_url('/admin/kementrian/edit/' . $kementrian->id_kementrian) ?>">

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
            <label>Kode Kementrian</label>
            <input type="text" value="<?php echo $kementrian->id_kementrian ?>" disabled/>
        </p>

        <p>
            <label>Nama Kementrian</label>
            <input type="text" name="nama_kementrian" value="<?php echo $kementrian->nama_kementrian ?>"/>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>