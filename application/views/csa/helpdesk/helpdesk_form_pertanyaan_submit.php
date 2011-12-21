<script type="text/javascript">
    $(function(){
        $('#cari_knowledge').submit(function(){

            var data = $(this).serialize();

            console.log(data);

            $.get('<?php echo site_url('/csa/knowledge_base/search') ?>', data, function(response){
                $('#referensi_jawaban').html(response);
            });
            return false;
        })
    });
</script>

<div class="content">

    <fieldset>

        <legend>Identitas</legend>

        <p>
            <label>No Tiket</label>
            <span><?php echo $identitas->no_tiket_helpdesk ?></span>
        </p>

        <p>
            <label>No Satker</label>
            <span><?php echo $identitas->id_satker ?></span>
        </p>

        <p>
            <label>Nama Satker</label>
            <span><?php echo $identitas->nama_satker ?></span>
        </p>

        <p>
            <label>Nama Petugas</label>
            <span><?php echo $identitas->nama_petugas ?></span>
        </p>

        <p>
            <label>Np Kantor</label>
            <span><?php echo $identitas->no_kantor ?></span>
        </p>

        <p>
            <label>No HP</label>
            <span><?php echo $identitas->no_hp ?></span>
        </p>

        <p>
            <label>Email</label>
            <span><?php echo $identitas->email ?></span>
        </p>

    </fieldset>

    <fieldset>

        <legend>Pertanyaan</legend>

        <p>
            <label>Kategori</label>
            <span><?php echo $kategori_knowledge_base ?></span>
        </p>

        <p>
            <label>Pertanyaan</label>
            <span><?php echo $pertanyaan ?></span>
        </p>

        <p>
            <label>Deskripsi</label>
            <span><?php echo $description ?></span>
        </p>

        <p>
            <label>Prioritas</label>
            <span><?php echo $prioritas ?></span>
        </p>

    </fieldset>

    <fieldset>
        <legend>Referensi Jawaban</legend>

        <form method="POST" id="cari_knowledge">
            <div style="float: left;">
                <input type="text" name="cari"/><input type="submit" value="Cari"/>
            </div>
            <div style="float: right;">
                <select name="sort">
                    <option>Paling banyak dibuka</option>
                    <option>Terbaru</option>
                </select>
            </div>
            <div class="clear"></div>
        </form>

        <hr/>

        <div id="referensi_jawaban">
            <?php foreach ($knowledges->result() as $value): ?>

            <h2><a href="javascript:void(0)" onclick="popUpReferensiJawaban(<?php echo $value->id_knowledge_base ?>)"><?php echo $value->judul ?></a></h2>

            <p><em><?php echo $value->judul ?></em></p>

            <hr/>

            <!--                <p>--><?php //echo $value->jawaban ?><!--</p>-->

            <?php endforeach ?>
        </div>
    </fieldset>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript">
    function popUpReferensiJawaban(id) {
        window.open("popup_ref_jawaban/" + id, "_blank", "width=800, height=360");
    }
    function popUpReferensiPeraturan() {
        window.open("popup_ref_peraturan", "_blank", "width=800, height=400");
    }
</script>