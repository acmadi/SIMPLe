    <script>
    $(document).ready(function(){
        
        $('.popupz').twipsy(
            );
    });
    </script>
<div class="content">
    <h1>Pertanyaan</h1>
    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="no">Tiket</th>
            <th class="medium">Identitas Penanya</th>
            <th class="no">Prioritas</th>
            <th class="medium">Pertanyaan</th>
            <th class="no">Ditanyakan</th>
            <th class="no">Terjawab</th>
            <th class="no">Status</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="9">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($tikets->result() as $value): ?>
        <tr>
            <!-- Nomor -->
            <td><?php echo $i++ ?></td>
            
            <!-- Nomor Tiket -->
            <td><?php echo $value->no_tiket_helpdesk ?></td>
            
            <!-- Identitas Penanya -->
            <td>
                <?php 
                if($value->id_satker == NULL) : 
                    echo 'UMUM - ' . $value->nama_petugas;
                else :
                    echo $value->id_satker ?> - <?php echo $value->nama_satker;
                endif; 
                ?>
            </td>
            
            
            <!-- Prioritas -->
            <td>
                <?php if ($value->prioritas == 'high'): ?>
                <span style="color: red; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

                <?php if ($value->prioritas == 'medium'): ?>
                <span style="color: orange; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

                <?php if ($value->prioritas == 'low'): ?>
                <span style="color: green; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

            </td>

            <!-- Pertanyaan -->
            <td> <?php echo $value->pertanyaan ?> </td>

            <!-- Tanggal Ditanyakan -->
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            
            <!-- Tanggal Terjawab -->
            <td>
                <?php if ($value->tanggal_selesai != NULL) : ?>
                    <a class="referensi-jawaban"
                       data-id='<?php echo $value->id ?>'
                       data-pertanyaan='<?php echo ascii_to_entities($value->pertanyaan) ?>'
                       data-jawaban='<?php echo ascii_to_entities($value->jawab) ?>'
                       href='javascript:void(0)'>
                    <span class="text green">
                    <?php 
                        echo table_tanggal($value->tanggal_selesai, $value->nama)
                            ;
                    ?>
                    </span>
                </a>
                <?php else :
                    echo '-';
                endif;
                ?>
            </td>

            <!-- Status -->
            <td>
                <?php 
                $color = ($value->status == 'open') ? 'yellow' : 'grey'; ?>
                    <a class="referensi-jawaban button <?php echo $color ?>"
                       data-id='<?php echo $value->id ?>'
                       data-pertanyaan='<?php echo ascii_to_entities($value->pertanyaan) ?>'
                       data-jawaban='<?php echo ascii_to_entities($value->jawab) ?>'
                       href='javascript:void(0)'><?php echo strtoupper($value->status) ?></a>
            </td>
            <td>
                
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