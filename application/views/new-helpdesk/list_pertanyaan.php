<div class="content">

    <?php echo search('helpdesks/list_pertanyaan/?search', 'keyword', 'get') ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="no">Tiket</th>
            <th class="medium">Satker</th>
            <th class="no">Tanggal</th>
            <th class="medium">Pertanyaan</th>
            <th class="no">Prioritas</th>
            <th class="no">Status</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($helpdesk->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->no_tiket_helpdesk ?></td>
            <td><?php echo $value->id_satker ?> - <?php echo $value->nama_satker ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><?php echo $value->pertanyaan ?></td>
            <td>
                <?php if ($value->prioritas == 'high'): ?>
                <span style="color: red; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

                <?php if ($value->prioritas == 'medium'): ?>
                <span style="color: blue; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

                <?php if ($value->prioritas == 'low'): ?>
                <span style="color: green; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

            </td>
            <td><?php echo $value->status ?></td>
            <td>
                <?php if ($value->jawab != NULL): ?>
                <a class="button green referensi-jawaban"
                   data-id="<?php echo $value->id ?>"
                   data-pertanyaan="<?php echo $value->pertanyaan ?>"
                   data-jawaban="<?php echo $value->jawab ?>"
                   href="javascript:void(0)">Lihat Jawaban</a>
                <?php endif ?>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php if (($this->pagination->create_links())): ?>
    <div class="pagination">
        <?php echo $this->pagination->create_links() ?>
    </div>
    <?php endif ?>
</div>


<div style="display: none" id="jawaban" data-id="">
    <h1 id="pertanyaan"></h1>

    <p id="jawabannya"></p>
</div>

<script type="text/javascript">
    $(function () {
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
                    text:'Tutup Tiket',
                    click:function () {
                        var status = confirm('Anda yakin akan menutup tiket ini?');
                        if (status) {
                            var id = $('#jawaban').data('id');
                            $.get('<?php echo site_url('helpdesks/close') ?>/' + id, function (response) {
                                window.location.href = '<?php echo site_url('helpdesks/list_pertanyaan') ?>';
                            })
                        }
                    }

                }
            ]
        });

        $('.referensi-jawaban').live('click', function () {
            var title = $(this).data('pertanyaan');
            var jawabannya = $(this).data('jawaban');
            var id = $(this).data('id');
            $('#jawaban').dialog('open');
            $('#pertanyaan').html(title);
            $('#jawabannya').html(jawabannya);
            $('#jawaban').data('id', id);
        });
    })
</script>