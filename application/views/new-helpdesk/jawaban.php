<script type="text/javascript">
    $(function () {

        $('#dialog').dialog('destroy');

        $('#dialog').dialog({
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
                    text:'Pilih Jawaban Ini',
                    click:function () {
                        var status = confirm('Anda yakin memilih jawaban ini?');
                        if (status === true) {
                            url = '<?php echo site_url("/helpdesks/jawab/{$this->session->userdata('no_tiket_helpdesk')}") ?>/';
                            console.log(url)
                        }
                    }
                },
                {
                    text:'Eskalasi',
                    click:function () {
                        var status = confirm('Anda yakin akan melakukan eskalasi?');
                        if (status === true) {
                            window.location.href = '<?php echo site_url('helpdesks/eskalasi/' . $this->session->userdata('id_tiket_helpdesk') . '/' . $this->session->userdata('no_tiket_helpdesk')) ?>';
                        }
                    }
                }
            ]
        });

        $('.jawaban').live('click', function () {
            $('#dialog h1').html($(this).data('pertanyaan'));
            $('#dialog p').html($(this).data('jawaban'));
            $('#dialog').dialog('open');
        })

        $('#cari_knowledge form').submit(function () {
            data = $(this).serialize();

            $.get('<?php echo site_url('/helpdesk/knowledge_base/search') ?>', data, function (response) {
                console.log(response);
                $('#referensi_jawaban').html(response);
            });
            return false;
        })

    })
</script>

<div class="content">

    <h1>Konsultasi Help Desk</h1>

    <div style="text-align: right; text-decoration: underline; font-weight: bold; font-size: 14px;">
        No Tiket: <?php echo sprintf('%05d', $this->session->userdata('no_tiket_helpdesk')) ?>
    </div>

    <fieldset>
        <legend>Identitas</legend>

        <div class="grid_6">
            <p>
                <label style="display: inline-block; width: 100px;">No Tiket</label>
                <span><?php echo sprintf('%05d', $this->session->userdata('no_tiket_helpdesk')) ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Kode - Nama Satker</label>
                <span><?php echo $identitas->id_satker . ' - ' . $identitas->nama_satker ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Nama Petugas</label>
                <span><?php echo $identitas->nama_petugas ?></span>
            </p>
        </div>
        <div class="grid_5">
            <p>
                <label style="display: inline-block; width: 100px;">Telpon Kantor</label>
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

        <table style="width:100%;">
            <tr>
                <td style="width: 10px"><label>Kategori</label></td>
                <td style="width: 100px"><?php echo $pertanyaan->kat_knowledge_base ?></td>
                <td style="width: 10px"><label>Pertanyaan</label></td>
                <td style="width: 500px"><?php echo $pertanyaan->pertanyaan ?></td>

            </tr>
            <tr>
                <td style="width: 10px"><label>Prioritas</label></td>
                <td style="width: 100px">
                    <?php if ($pertanyaan->prioritas == 'high'): ?>
                    <span style="color: red; text-transform: uppercase;"><?php echo $pertanyaan->prioritas ?></span>
                    <?php endif ?>

                    <?php if ($pertanyaan->prioritas == 'medium'): ?>
                    <span style="color: blue; text-transform: uppercase;"><?php echo $pertanyaan->prioritas ?></span>
                    <?php endif ?>

                    <?php if ($pertanyaan->prioritas == 'low'): ?>
                    <span style="color: green; text-transform: uppercase;"><?php echo $pertanyaan->prioritas ?></span>
                    <?php endif ?>

                </td>
                <td style="width: 10px"><label>Deskripsi</label></td>
                <td style="width: 500px"><?php echo $pertanyaan->description ?></td>

            </tr>
        </table>

    </fieldset>

    <fieldset>
        <legend>Referensi Jawaban</legend>

        <div id="cari_knowledge">
            <?php echo search('#') ?>
        </div>

        <hr/>

        <div id="referensi_jawaban">
            <ul>
                <?php foreach ($jawaban->result() as $value): ?>

                <li>
                    <a href="javascript:void(0)"
                       class="jawaban"
                       data-id_knowledge_base="<?php echo $value->id_knowledge_base ?>"
                       data-pertanyaan="<?php echo $value->judul ?>"
                       data-deskripsi="<?php echo $value->desripsi ?>"
                       data-jawaban="<?php echo $value->jawaban ?>">
                        <?php echo $value->judul ?>
                    </a>
                </li>

                <?php endforeach ?>
            </ul>
        </div>
    </fieldset>

    <p>
        <a href="<?php echo site_url('helpdesks/eskalasi/' . $this->session->userdata('id_tiket_helpdesk') . '/' . $this->session->userdata('no_tiket_helpdesk')) ?>"
           type="submit" class="button blue" onclick="return confirm('Anda yakin akan melakukan eskalasi?') ? true : false">
            Eskalasi
        </a>
    </p>

</div>

<div id="dialog">
    <h1></h1>

    <p></p>
</div>