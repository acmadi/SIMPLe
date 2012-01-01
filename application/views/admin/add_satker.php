<div class="content">

    <h1>Tambah Satker</h1>

    <form method="post" action="<?php site_url('/admin/satker/add') ?>">

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
            <label>Kode Satker</label>
            <input type="text" name="id_satker" value="<?php echo set_value('id_satker') ?>" maxlength="6"/>
        </p>

        <p>
            <label>Nama Satker</label>
            <input type="text" name="nama_satker" value="<?php echo set_value('nama_satker')?> "/>
        </p>

        <p>
            <label>Nama Kementrian</label>
            <select name="id_kementrian">
                <option value="">&nbsp;</option>
                <?php foreach ($kementrian->result() as $value): ?>
                <?php if (set_value('id_kementrian') == $value->id_kementrian): ?>
                    <option selected value="<?php echo $value->id_kementrian ?>"><?php echo $value->nama_kementrian ?></option>
                    <?php else: ?>
                    <option value="<?php echo $value->id_kementrian ?>"><?php echo $value->nama_kementrian ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>