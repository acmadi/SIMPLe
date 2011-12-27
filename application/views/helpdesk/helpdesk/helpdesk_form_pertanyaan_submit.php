<div class="content">

    <h1>Konsultasi Help Desk</h1>

    <div style="text-align: right; text-decoration: underline; font-weight: bold; font-size: 14px;">
        No Tiket: <?php echo sprintf('%05d', $this->session->userdata('tiket')) ?>
    </div>

    <fieldset>
        <legend>Identitas</legend>

        <div style="float: left; width: 500px">
            <p>
                <label style="display: inline-block; width: 100px;">No Tiket</label>
                <span><?php echo sprintf('%05d', $this->session->userdata('tiket')) ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">No Satker</label>
                <span><?php echo $identitas->id_satker ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Nama Satker</label>
                <span><?php echo $identitas->nama_satker ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Nama Petugas</label>
                <span><?php echo $identitas->nama_petugas ?></span>
            </p>
        </div>
        <div style="float: left; width: 500px;">
            <p>
                <label style="display: inline-block; width: 100px;">No Kantor</label>
                <span><?php echo $identitas->no_kantor ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">No HP</label>
                <span><?php echo $identitas->no_hp ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Email</label>
                <span><?php echo $identitas->email ?></span>
            </p>
        </div>
    </fieldset>

    <fieldset>

        <legend>Pertanyaan</legend>

        <p>
            <label style="width: 120px; display: inline-block;">Kategori</label>
            <span>: <?php echo $kategori_knowledge_base ?></span>
        </p>

        <p>
            <label style="width: 120px; display: inline-block;">Pertanyaan</label>
            <span>: <?php echo $pertanyaan ?></span>
        </p>

        <p>
            <label style="width: 120px; display: inline-block;">Deskripsi</label>
            <span>: <?php echo $description ?></span>
        </p>

        <p>
            <label style="width: 120px; display: inline-block;">Prioritas</label>
            <span>: <?php echo $prioritas ?></span>
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

        <hr style="margin: 20px 0;"/>

        <div id="referensi_jawaban">
            <?php if ($knowledges->num_rows() > 0): ?>
            <ul>
                <?php foreach ($knowledges->result() as $value): ?>
                <li>
                    <a href="javascript:void(0)" class="referensi-jawaban" title="<?php echo $value->id_knowledge_base ?>"><?php echo $value->judul ?></a>
                </li>
                <?php endforeach ?>
            </ul>
            <?php else: ?>
                Data tidak ditemukan
            <?php endif ?>
        </div>
    </fieldset>

    <div style="text-align: right;">
        <a href="<?php echo site_url("/helpdesk/ekskalasi/{$this->session->userdata('tiket')}")  ?>" class="button blue-pill">Ekskalasi</a>
    </div>
</div>

<div id="jawaban" style="display: none;"></div>

<script type="text/javascript">
    var jawaban_id = null;

    $(function () {
        // Cari Knowledge
        $('#cari_knowledge').submit(function () {

            var data = $(this).serialize();

            console.log(data);

            $.get('<?php echo site_url('/helpdesk/knowledge_base/search') ?>', data, function (response) {
                $('#referensi_jawaban').html(response);
            });
            return false;
        })

        $('#jawaban').dialog('destroy');

        $('#jawaban').dialog({
            autoOpen:false,
            title:'Referensi Jawaban',
            modal:true,
            resizable:false,
            draggable:false,
            width:700,
            height:200,
            dialogClass:'centered-dialog',
            buttons:[
                {
                    text:'Batal',
                    click:function () {
                        $(this).dialog('close');
                    }
                },
                {
                    text:'Jawab',
                    click:function () {
                        var status = confirm('Apakah ada pertanyaan lain?');
                        if (status) {
                            window.location.href = '<?php echo site_url("/helpdesk/pertanyaan/{$this->session->userdata('tiket')}") ?>/' + jawaban_id;
                        } else {
                            window.location.href = '<?php echo site_url("/helpdesk/helpdesk/done/{$this->session->userdata('tiket')}") ?>/' + jawaban_id;
                        }
                    }
                },
                {
                    text:'Ekskalasi',
                    click:function () {
                        var status = confirm('Apakah ada pertanyaan lain?');
                        if (status) {
                            window.location.href('<?php echo site_url('/helpdesk/ekskalasi/') ?>' + jawaban_id);
                        } else {
                            window.location.href('<?php echo site_url('/helpdesk/ekskalasi/') ?>' + jawaban_id);
                        }
                    }
                }
            ]
        });

        $('.referensi-jawaban').live('click', function () {
            var knowledge_base_id = $(this).attr('title');
            var url = '<?php echo site_url('helpdesk/knowledge_base/get_by_id/') ?>/' + knowledge_base_id;

            $.get(url, function (response) {
                $('#jawaban').html(response).dialog('open');
                jawaban_id = $('#jawaban input[type="hidden"]').val();
            });

        });
    })
</script>