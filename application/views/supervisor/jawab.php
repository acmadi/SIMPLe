<?php //print_r($pertanyaan)?>

<div class="content">

    <h1>Jawab Pertanyaan</h1>

    <fieldset>
        <legend>Identitas</legend>
        <div style="width: 600px; float: left;">
            <p>
                <label style="display: inline-block; width: 100px;">No Tiket</label>
                <span><?php echo $pertanyaan->no_tiket_helpdesk ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">No Satker</label>
                <span><?php echo $pertanyaan->id_satker ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Nama Satker</label>
                <span><?php echo $pertanyaan->nama_satker ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Nama Petugas</label>
                <span><span><?php echo $pertanyaan->nama_petugas ?></span></span>
            </p>

        </div>

        <div style="width: 500px; float: left;">

            <p>
                <label style="display: inline-block; width: 100px;">No Kantor</label>
                <span><?php echo $pertanyaan->no_kantor ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">No HP</label>
                <span><?php echo $pertanyaan->no_hp ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Email</label>
                <span><?php echo $pertanyaan->email ?></span>
            </p>
        </div>
    </fieldset>


    <fieldset>
        <legend>Pertanyaan</legend>
        <div style="width: 600px; float: left;">

<!--            <p>-->
<!--                <label style="display: inline-block; width: 100px;">Kategori</label>-->
<!--                <span>--><?php //echo $pertanyaan->kategori ?><!--</span>-->
<!--            </p>-->

            <p>
                <label style="display: inline-block; width: 100px;">Pertanyaan</label>
                <span><?php echo $pertanyaan->pertanyaan ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Deskripsi</label>
                <span><?php echo $pertanyaan->description ?></span>
            </p>

        </div>

        <div style="width: 500px; float: left;">

            <p>
                <label style="display: inline-block; width: 100px;">Prioritas</label>
                <span><?php echo $pertanyaan->prioritas ?></span>
            </p>

        </div>
    </fieldset>

    <fieldset>
        <legend>Jawab</legend>

        <p>
            <label style="display: inline-block; width: 100px;">Jawaban</label><br/>
            <label>
                <textarea rows="7" cols="120"></textarea>
            </label>
        </p>

        <p>
            <label style="display: inline-block; width: 100px;">Nama Nara Sumber: </label>
            <span><input type="text"/></span>
        </p>

        <p>
            <label style="display: inline-block; width: 100px;">Jabatan</label>
            <span><input type="text"/></span>
        </p>

        <p>
            <label style="display: inline-block; width: 100px;">Bukti File</label>
            <span><input type="file"/></span>
        </p>

    </fieldset>

    <div>
        <label><input type="checkbox" /> Kirim jawaban ke email petugas Satker </label>
    </div>

    <div style="float: left;">
        <input type="submit" value="Batal" class="button gray-pill"/>
    </div>

    <div style="float: right;">

        <input type="button" onclick="window.print()" value="Print" class="button gray-pill"/>
        <input type="submit" value="Eskalasi" class="button blue-pill"/>
        <input type="submit" value="Jawab" class="button blue-pill"/>
    </div>

    <div class="clear"></div>
</div>