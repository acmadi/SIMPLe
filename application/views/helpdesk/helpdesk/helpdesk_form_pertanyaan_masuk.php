<div class="content">

    <h1>Konsultasi Help Desk-Umum</h1>

    <div style="text-align: right; text-decoration: underline; font-weight: bold; font-size: 14px;">
        No Tiket: <?php echo sprintf('%05d', $this->session->userdata('no_tiket')) ?>
    </div>

    <fieldset>
        <legend>Identitas</legend>

        <div style="float: left; width: 500px">
             <p>
                <label style="display: inline-block; width: 100px;">Nama</label>
                <span><?php echo $identitas->nama_petugas ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Instansi</label>
                <span><?php echo $identitas->instansi ?></span>
            </p>


        </div>
        <div style="float: left; width: 500px;">

            <p>
                <label style="display: inline-block; width: 100px;">No HP</label>
                <span><?php echo $identitas->no_hp ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Email</label>
                <span><?php echo $identitas->email ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Alamat</label>
                <span><?php echo $identitas->alamat ?></span>
            </p>


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
            <label style="width: 120px; display: inline-block;">Prioritas</label>
            <span>: <?php echo $prioritas ?></span>
        </p>

        <p>
            <label style="width: 120px; display: inline-block;">Deskripsi</label><br/>
            <span>: <?php echo $description ?></span>
        </p>
    </fieldset>
	
    <fieldset>
        <legend>Referensi Jawaban</legend>

        <form method="POST" id="cari_knowledge">
            <div style="float: left;">
                <input type="text" name="cari"/><input type="submit" value="Cari"/>
            </div>
            <div style="float: right;">
                <select>
                    <option>Paling banyak dibuka</option>
                    <option>Terbaru</option>
                </select>
            </div>
            <div class="clear"></div>
        </form>

        <hr style="margin: 20px 0;"/>

        <div id="referensi_jawaban">
            <?php if ($knowledge->num_rows() > 0): ?>
            <ul style="list-style: inside">
                <?php foreach ($knowledge->result() as $value): ?>
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
        <a href="<?php echo site_url('/helpdesk/helpdesk/eskalasi/' . $this->session->userdata('id_tiket') ) ?>" class="button blue-pill">Eskalasi</a>
    </div>
</div>

<div id="jawaban" style="display: none;"></div>

<script type="text/javascript">
    var jawaban_id = null; // Knowledge Base ID

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
            height:400,
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
//                        var status = confirm('Apakah ada pertanyaan lain?');
                        status = false;
                        if (status === true) {
                            window.location.href = '<?php echo site_url("/helpdesk/helpdesk/next/{$this->session->userdata('id_tiket')}") ?>/' + jawaban_id;
                        } else {
                            window.location.href = '<?php echo site_url("/helpdesk/helpdesk/done/{$this->session->userdata('id_tiket')}") ?>/' + jawaban_id;
                        }
                    }
                },
                {
                    text:'Eskalasi',
                    click:function () {
//                        var status = confirm('Apakah ada pertanyaan lain?');
                        status = false;
                        if (status === true) {
                            window.location.href = '<?php echo site_url("/helpdesk/helpdesk/eskalasi_next/{$this->session->userdata('id_tiket')}") ?>/';
                        } else {
                            window.location.href = '<?php echo site_url('/helpdesk/helpdesk/eskalasi/' . $this->session->userdata('id_tiket') ) ?>/';
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