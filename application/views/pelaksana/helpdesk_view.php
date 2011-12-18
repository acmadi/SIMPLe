<?php //print_r($antrian) ?>

<div class="content">
    <fieldset>
        <legend>Identitas</legend>
        <div style="width: 500px; float: left;">
            <p>
                <label>No Tiket</label>
                <?php echo $antrian->no_tiket_helpdesk ?>
            </p>

            <p>
                <label>No Satker</label>
                <?php echo $antrian->id_satker ?>
            </p>

            <p>
                <label>Nama Satker</label>
                <?php echo $antrian->nama_satker ?>
            </p>

            <p>
                <label>Nama Petugas</label>
                <?php echo $antrian->nama_petugas ?>
            </p>
        </div>
        <div style="width: 500px; float: left;">
            <p>
                <label>No Kantor</label>
                <?php echo $antrian->no_kantor ?>
            </p>

            <p>
                <label>No HP</label>
                <?php echo $antrian->no_hp ?>
            </p>

            <p>
                <label>Email</label>
                <?php echo $antrian->email ?>
            </p>
        </div>
    </fieldset>

    <fieldset>
        <legend>Pertanyaan</legend>
        <div style="width: 500px; float: left;">
            <p>
                <label>Kategori</label>
                <?php echo $antrian->kategori ?>
            </p>

            <p>
                <label>Pertanyaan</label>
                <?php echo $antrian->pertanyaan ?>
            </p>

            <p>
                <label>Description</label>
                <?php echo $antrian->description ?>
            </p>
        </div>
        <div style="width: 500px; float: left;">

            <p>
                <label>Prioritas</label>
                <?php echo $antrian->prioritas ?>
            </p>
        </div>
    </fieldset>

    <fieldset>
        <legend>Jawab</legend>

        <p>

            <label>Jawaban <br/>
                <textarea name="jawaban" rows="10" cols="70"></textarea>
            </label>
        </p>

        <p><strong>Sumber Jawaban</strong></p>

        <p>
            <label>
                Nama Nara Sumber
                <input name="nara_sumber" type="text"/>
            </label>
        </p>

        <p>
            <label>
                Jabatan
                <input name="jabatan" type="text"/>
            </label>
        </p>

        <p>
            <label>
                Bukti file
                <input name="file" type="file"/>
            </label>
        </p>
    </fieldset>

    <p><label><input name="kirim_email" type="checkbox" /> Kirim jawaban ke email petugas satker </label></p>

    <p style="float: left;">
        <a href="<?php echo site_url('/pelaksana/helpdesk') ?>" class="button gray-pill">Batal</a>
    </p>
    
    <p style="float: right;">
        <input type="submit" name="ekskalasi" value="Ekskalasi" class="button blue-pill" />
        <input type="submit" name="jawab" value="Jawab" class="button blue-pill" />
    </p>
</div>