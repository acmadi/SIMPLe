<div class="content">
    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Tiket</th>
            <th>Satker</th>
            <th>Tanggal</th>
            <th>Pertanyaan</th>
            <th>Prioritas</th>
            <th>Status</th>
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
            <td><?php echo $value->prioritas ?></td>
            <td><?php echo $value->status ?></td>
            <td>
                <?php if ($value->jawab != NULL): ?>
                <a class="button green referensi-jawaban"
                   data-pertanyaan="<?php echo $value->pertanyaan ?>"
                   data-jawaban="<?php echo $value->jawab ?>"
                   href="javascript:void(0)">Lihat Jawaban</a>
                <?php endif ?>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

    
<div style="display: none" id="jawaban">
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
            dialogClass:'centered-dialog'
        });

        $('.referensi-jawaban').live('click', function () {
            var title = $(this).data('pertanyaan');
            var jawabannya = $(this).data('jawaban');
            $('#jawaban').dialog('open');
            $('#pertanyaan').html(title);
            $('#jawabannya').html(jawabannya);
        });
    })
</script>