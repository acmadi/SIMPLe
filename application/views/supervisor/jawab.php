<?php //print_r($pertanyaan)?>
<script src="<?php echo base_url() ?>js/nicedit/nicEdit.js.php?base=<?php echo base_url() ?>" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<div class="content">

    <h1>Jawab Pertanyaan</h1>

    <form method="post" action="<?php echo site_url('supervisor/jawab/do_jawab') ?>">

        <fieldset>
            <legend>Identitas</legend>
            <div class="grid_6 alpha omega">
                <p>
                    <label style="display: inline-block; width: 100px;">No Tiket</label>
                    <span><?php echo $pertanyaan->no_tiket_helpdesk ?></span>
                    <input type="hidden" name="no_tiket_helpdesk" value="<?php echo $pertanyaan->no_tiket_helpdesk ?>"/>
                </p>

                <p>
                    <label style="display: inline-block; width: 100px;">No Satker</label>
                    <span><?php echo $pertanyaan->id_satker ?></span>
                    <input type="hidden" name="id_satker" value="<?php echo $pertanyaan->id_satker ?>"/>
                </p>

                <p>
                    <label style="display: inline-block; width: 100px;">Nama Satker</label>
                    <span><?php echo $pertanyaan->nama_satker ?></span>
                    <input type="hidden" name="nama_satker" value="<?php echo $pertanyaan->nama_satker ?>"/>
                </p>

                <p>
                    <label style="display: inline-block; width: 100px;">Nama Petugas</label>
                    <span><span><?php echo $pertanyaan->nama_petugas ?></span></span>
                    <input type="hidden" name="nama_petugas" value="<?php echo $pertanyaan->nama_petugas ?>"/>
                </p>

            </div>

            <div class="grid_6 alpha omega">

                <p>
                    <label style="display: inline-block; width: 100px;">No Kantor</label>
                    <span><?php echo $pertanyaan->no_kantor ?></span>
                    <input type="hidden" name="no_kantor" value="<?php echo $pertanyaan->no_kantor ?>"/>
                </p>

                <p>
                    <label style="display: inline-block; width: 100px;">No HP</label>
                    <span><?php echo $pertanyaan->no_hp ?></span>
                    <input type="hidden" name="no_hp" value="<?php echo $pertanyaan->no_hp ?>"/>
                </p>

                <p>
                    <label style="display: inline-block; width: 100px;">Email</label>
                    <span><?php echo $pertanyaan->email ?></span>
                    <input type="hidden" name="email" value="<?php echo $pertanyaan->email ?>"/>
                </p>
            </div>
        </fieldset>


        <fieldset>
            <legend>Pertanyaan</legend>
            <div class="grid_6 alpha omega">

                <!-- <p>
                    <label style="display: inline-block; width: 100px;">Kategori</label>
                    <span><?php echo $kategori_jawaban ?></span>
                    <input type="hidden" name="kategori" value="<?php //echo $pertanyaan->kategori ?>"/>
                </p> -->

                <p>
                    <label style="display: inline-block; width: 100px;">Pertanyaan</label><br/>
                    <span><?php echo $pertanyaan->pertanyaan ?></span>
                    <input type="hidden" name="pertanyaan" value="<?php echo $pertanyaan->pertanyaan ?>"/>
                </p>

            </div>

            <div class="grid_6 alpha omega">


                <p>
                    <label style="display: inline-block; width: 100px;">Prioritas</label>
                    <span><?php echo $pertanyaan->prioritas ?></span>
                    <input type="hidden" name="prioritas" value="<?php echo $pertanyaan->prioritas ?>"/>
                </p>

            </div>
                <div class="grid_12 alpha omega">
                    <label style="display: inline-block; width: 100px;">Deskripsi</label><br/>
                    <span><?php echo $pertanyaan->description ?></span>
                    <input type="hidden" name="description" value="<?php echo $pertanyaan->description ?>"/>
                </div>
        </fieldset>

        <fieldset>
            <legend>Jawaban</legend>

            <div class="grid_6">
            <p>
<!--                <label style="display: inline-block; width: 100px;">Jawaban</label><br/>-->
                <label>
                    <textarea name="jawaban" style="width: 450px; min-height: 100px;"></textarea>
                </label>
            </p>
            </div>

            <div class="grid_5">
            <p>
                <label style="display: inline-block; width: 100px;">Nama Nara Sumber </label>
                <span style="display: inline-block; vertical-align: top"><input name="nama_narasumber" type="text"/></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Jabatan</label>
                <span><input name="jabatan" type="text"/></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Bukti File</label>
                <span><input name="file" type="file"/></span>
            </p>
            </div>

        </fieldset>

        <div>
            <label><input name="sendmail" type="checkbox" checked="checked"/> Kirim jawaban ke email petugas Satker </label>
        </div>

        <div style="float: left;">
            <input type="submit" value="Batal" class="button gray-pill"/>
        </div>

        <div style="float: right;">

            <input type="button" onclick="window.print()" value="Print" class="button"/>
<!--            <input type="submit" name="submit" value="Eskalasi" class="button blue"/>-->
            <input type="submit" name="submit" value="Jawab" class="button green"/>
        </div>

        <div class="clear"></div>

    </form>
</div>