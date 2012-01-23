    <script>
    var oTable;
    $(document).ready(function(){
        
        oTable = $('.table').dataTable();
        oTable.fnSort( [ [2,'asc']] );
        oTable.fnAdjustColumnSizing();

        $('#Semua').click(function(){
            oTable.fnFilter( '', 6);
        });
        $('#Open').click(function(){
            oTable.fnFilter( 'open', 6 );
        });
        $('#Close').click(function(){
            oTable.fnFilter( 'close', 6 );
        });
    });
    </script>

<div class="content">
    <h1>Pertanyaan Helpdesk</h1>
    <?php
    if($this->session->flashdata('success')) : 
        echo '<div class="notification green">';
        echo $this->session->flashdata('success');
        echo '</div>';
    endif;
    ?>
    <fieldset>
        <legend>Filter berdasarkan status tiket</legend>
        <input type="radio" id="Semua" value="Semua" name="filter" checked="checked" />
            <label for="Semua">Semua</label>
        <input type="radio" id="Open" value="Open" name="filter"/>
            <label for="Open">Open</label>
        <input type="radio" id="Close" value="Close" name="filter"/>
            <label for="Close">Close</label>
    </fieldset>
    <br/>
    <table class="table">
        <thead>
        <tr>
            <!-- <th class="no">No</th> -->
            <th class="no">#Tiket</th>
            <th class="medium">Identitas Penanya</th>
            <th class="no">Prioritas</th>
            <th class="medium">Pertanyaan</th>
            <th class="no">Ditanyakan</th>
            <th class="no">Terjawab</th>
            <th class="no">Status</th>
            <th width="110">&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($tikets->result() as $value): ?>
        <?php
            $row_status = ($value->tanggal_selesai != NULL && $value->status == 'open')
                ? 'row-highlight' 
                : '';
        ?>
        <tr class="<?php echo $row_status?>">
            <!-- Nomor -->
            <!-- <td><?php echo $i++ ?></td> -->
            
            <!-- Nomor Tiket -->
            <td><?php echo $value->no_tiket_helpdesk ?></td>
            
            <!-- Identitas Penanya -->
            <td>
                <?php 
                if($value->id_satker == NULL) : 
                    echo 'UMUM - ' . $value->nama_petugas . ' (' . $value->instansi .')';
                else :
                    echo $value->id_satker ?> - <?php echo $value->nama_satker;
                endif; 
                ?>
            </td>
            
            
            <!-- Prioritas -->
            <td>
                <?php if ($value->prioritas == 'high'): ?>
                <span style="display:none">1</span>
                <span style="color: red; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

                <?php if ($value->prioritas == 'medium'): ?>
                <span style="display:none">2</span>
                <span style="color: orange; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

                <?php if ($value->prioritas == 'low'): ?>
                <span style="display:none">3</span>
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
                    if($value->lavel > 1)
                        echo 'Eskalasi';
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

            <!-- Lihat jawaban -->
            <td>
                <?php if ($value->id_knowledge_base != NULL) : ?>
                    <a class="link-jawaban referensi-jawaban button green"
                       data-id='<?php echo $value->id ?>'
                       data-pertanyaan='<?php echo ascii_to_entities($value->pertanyaan) ?>'
                       data-jawaban='<?php echo ascii_to_entities($value->jawab) ?>'
                       href='javascript:void(0)'>
                    <span class="text green">
                        Jawaban
                    </span>
                    </a>

                <?php endif; ?>
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