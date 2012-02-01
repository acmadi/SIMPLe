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
                }
                // {
                //     text:'Pilih Jawaban Ini',
                //     click:function () {
                //         var status = confirm('Anda yakin memilih jawaban ini?');
                //         if (status === true) {
                //             url = '<?php echo site_url("/helpdesks/jawab/{$this->session->userdata('id_tiket_helpdesk')}") ?>/';
                //             console.log(url)
                //         }
                //     }
                // }
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

        oTable = $('.table').dataTable();
        oTable.fnFilter( '' );

        $('.dataTables_filter input').click(function(){
            $(this).select();
        });

        $('.answer-btn').click(function(){

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

        <table style="width: 100%">
            <tr>
                <td style="width: 200px">
                    <label>No Tiket</label>
                </td>
                <td style="width: 200px">
                    <?php echo sprintf('%05d', $this->session->userdata('no_tiket_helpdesk')) ?>
                </td>

                <td>
                    <label>Telpon Kantor</label>
                </td>
                <td>
                    <span><?php echo $identitas->no_kantor ?></span>
                </td>
            </tr>

            <tr>
                <td style="width: 150px">
                    <label>Kode - Nama Satker</label>
                </td>
                <td style="width: 500px">
                    <span><?php echo $identitas->id_satker . ' - ' . $identitas->nama_satker ?></span>
                </td>

                <td>
                    <label>No HP</label>
                </td>
                <td>
                    <span><?php echo $identitas->no_hp ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <label style="display: inline-block; width: 100px;">Nama Petugas</label>
                </td>
                <td>
                    <span><?php echo $identitas->nama_petugas ?></span>
                </td>

                <td>
                    <label style="display: inline-block; width: 100px;">Email</label>
                </td>
                <td>
                    <span><?php echo $identitas->email ?></span>
                </td>
            </tr>

        </table>
    </fieldset>

    <fieldset>
        <legend>Topik</legend>

        <table style="width:100%;">
            <tr>
                <td style="width: 10px"><label>Kategori</label></td>
                <td style="width: 100px"><?php echo $pertanyaan->kat_knowledge_base ?></td>
                <td style="width: 10px"><label>Topik</label></td>
                <td style="width: 500px"><?php echo $pertanyaan->pertanyaan ?></td>

            </tr>
            <tr>
                <td style="width: 10px"><label>Prioritas</label></td>
                <td style="width: 100px">
                    <?php if ($pertanyaan->prioritas == 'high'): ?>
                    <span style="color: red; text-transform: uppercase;"><?php echo $pertanyaan->prioritas ?></span>
                    <?php endif ?>

                    <?php if ($pertanyaan->prioritas == 'medium'): ?>
                    <span style="color: orange; text-transform: uppercase;"><?php echo $pertanyaan->prioritas ?></span>
                    <?php endif ?>

                    <?php if ($pertanyaan->prioritas == 'low'): ?>
                    <span style="color: green; text-transform: uppercase;"><?php echo $pertanyaan->prioritas ?></span>
                    <?php endif ?>

                </td>
                <td style="width: 10px"><label>Pertanyaan</label></td>
                <td style="width: 500px"><?php echo $pertanyaan->description ?></td>

            </tr>
        </table>
       
        <div style="text-align: center;">
            <a href="<?php echo site_url('helpdesks/eskalasi/' . $this->session->userdata('id_tiket_helpdesk') . '/' . $this->session->userdata('no_tiket_helpdesk')) ?>"
               type="submit"
               class="button blue"
               style="padding: 10px 20px; font-size: 10px;"
               onclick="return confirm('Anda yakin akan melakukan eskalasi?') ? true : false">
                Eskalasi
            </a>
			<button type="submit"
               class="button green answer-btn"
               style="padding: 10px 20px; font-size: 10px;"
               onclick="return confirm('Anda yakin akan menjawab langsung?') ? true : false" />
                Jawab Langsung
            </button>
        </div>
        

    </fieldset>

    <fieldset>
        <legend>Referensi jawaban untuk kategori: <?php echo $pertanyaan->kat_knowledge_base ?></legend>

        <div id="referensi_jawaban">
            <table class="table">
                <thead>
                <tr>
                    <th class="no">No</th>
                    <th class="medium">Pertanyaan</th>
                    <th class="medium">Jawaban</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                </tr>
                </tfoot>
                <?php $i = 1 ?>
                <?php foreach ($jawaban->result() as $value): ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td>
                        <?php echo ascii_to_entities($value->judul) ?>
                    </td>
                    <td>
                        <?php echo word_limiter(ascii_to_entities($value->jawaban), 50) ?>
                    </td>
                    <td class="action">
                        <a href="javascript:void(0)"
                           class="button green jawaban"
                           data-id_knowledge_base='<?php echo $value->id_knowledge_base ?>'
                           data-pertanyaan='<?php echo ascii_to_entities($value->judul) ?>'
                           data-deskripsi='<?php echo ascii_to_entities($value->desripsi) ?>'
                           data-jawaban='<?php echo ascii_to_entities($value->jawaban) ?>'>
                           Lihat
                        </a> <br/>
                        <?php
                        echo anchor('helpdesks/jawab_cs/' . $this->session->userdata('id_tiket_helpdesk') . 
                                        '/'. $value->id_knowledge_base,
                                    'Jawab',
                                    'class="button blue"
                                     onclick="return confirm(\'Anda yakin ingin menjawab dengan knowledge ini?\')"'
                                   );
                        ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </fieldset>

    <form method="post" action="<?php echo site_url('helpdesks/jawab_langsung') ?>">
        <input type="hidden" name="no_tiket_helpdesk" value="<?php echo $this->session->userdata('no_tiket_helpdesk') ?>">
        <input type="hidden" name="id_tiket_helpdesk" value="<?php echo $this->session->userdata('id_tiket_helpdesk') ?>">

        <fieldset>
            <legend>Jawab</legend>
            <textarea name="jawaban" style="min-width: 930px; max-width: 930px; height: 100px;" required></textarea>
        </fieldset>

        <div style="text-align: center;">
            <a href="<?php echo site_url('helpdesks/eskalasi/' . $this->session->userdata('id_tiket_helpdesk') . '/' . $this->session->userdata('no_tiket_helpdesk')) ?>"
               type="submit"
               class="button blue"
               style="padding: 10px 20px; font-size: 16px;"
               onclick="return confirm('Anda yakin akan melakukan eskalasi?') ? true : false">
                Eskalasi
            </a>
            <button type="submit"
               class="button green answer-btn"
               style="padding: 10px 20px; font-size: 16px;"
               onclick="return confirm('Anda yakin akan menjawab langsung?') ? true : false" />
                Jawab Langsung
            </button>
        </div>

    </form>

</div>

<div id="dialog">
    <h1></h1>

    <p></p>
</div>