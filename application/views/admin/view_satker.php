<div class="content">
    <h1>Lihat Petugas Satker <?php echo $this->uri->segment(4) ?></h1>

    <?php if ($satker->num_rows() > 0): ?>
    <?php $i = 1 ?>
    <?php foreach ($satker->result() as $value): ?>
        <fieldset>
            <legend>Petugas #<?php echo $i++ ?></legend>
            <p>
                <span style="width: 200px; display: inline-block;">Kode Satker</span>
                <span><?php echo $value->id_satker ?></span>
            </p>

            <p>
                <span style="width: 200px; display: inline-block;">Nama Satker</span>
                <span><?php echo $value->nama_satker ?></span>
            </p>

            <p>
                <span style="width: 200px; display: inline-block;">Nama Kementrian</span>
                <span><?php echo $value->nama_kementrian ?></span>
            </p>

            <p>
                <span style="width: 200px; display: inline-block;">Nama Petugas</span>
                <span><?php echo $value->nama_petugas ?></span>
            </p>

            <p>
                <span style="width: 200px; display: inline-block;">Jabatan</span>
                <span><?php echo $value->jabatan_petugas ?></span>
            </p>

            <p>
                <span style="width: 200px; display: inline-block;">No HP</span>
                <span><?php echo $value->no_hp ?></span>
            </p>

            <p>
                <span style="width: 200px; display: inline-block;">Email</span>
                <span><?php echo $value->email ?></span>
            </p>

            <p>
                <span style="width: 200px; display: inline-block;">Alamat</span>
                <span><?php echo $value->alamat ?></span>
            </p>

            <p>
                <span style="width: 200px; display: inline-block;">No Kantor</span>
                <span><?php echo $value->no_kantor ?></span>
            </p>
        </fieldset>
        <?php endforeach ?>
    <?php else: ?>
    Data Petugas Satker belum ada
    <?php endif ?>
</div>