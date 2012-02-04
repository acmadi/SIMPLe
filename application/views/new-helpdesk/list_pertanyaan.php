    <script>
    var oTable;
    $(document).ready(function(){
        
        oTable = $('.table').dataTable();
        oTable.fnSort( [ [7,'desc'],[2,'asc'] ] );
        oTable.fnAdjustColumnSizing();
        oTable.fnFilter( 'open', 8 );

        $('#Semua').click(function(){
            oTable.fnFilter( '', 8);
        });
        $('#Open').click(function(){
            oTable.fnFilter( 'open', 8 );
        });
        $('#Close').click(function(){
            oTable.fnFilter( 'close', 8 );
        });
		
		$('#kategori_list').chosen().change(function(){
            var nama_kategori = $(this).val();
			 oTable.fnFilter( nama_kategori, 4 );
            
        })
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
	
	$user = $this->session->userdata('id_user');
    ?>
    <fieldset>
        <legend>Filter </legend>
		<table>
		<tr>
			<td><strong>Berdasarkan status tiket</strong></td>
			<td>&nbsp;&nbsp;</td>
			<td><strong>Berdasarkan kategori</strong></td>
			
		</tr>
		<tr>
			<td>
				<input type="radio" id="Semua" value="Semua" name="filter" />
					<label for="Semua">Semua</label>
				<input type="radio" id="Open" value="Open" name="filter" checked="checked"/>
					<label for="Open">Open</label>
				<input type="radio" id="Close" value="Close" name="filter"/>
					<label for="Close">Close</label>
			</td>
			<td>&nbsp;
			</td>
			<td>
				<select name="kategori_list" id="kategori_list" class="chzn-select" data-placeholder="Pilih Kategori" style="width: 200px;float:right;">
					<option></option>
					<option value="">Semua</option>
				<?php foreach($list_kategori->result() as $v):?>
					<option value="<?php echo $v->kat_knowledge_base;?>"><?php echo $v->kat_knowledge_base;?></option>		
				<?php endforeach;?>
				</select>
			</td>
			
		</tr>
		</table>
    </fieldset>
    <br/>
    <table class="table">
        <thead>
        <tr>
            <!-- <th class="no">No</th> -->
            <th class="no">#Tiket</th>
            <th class="medium">Identitas Penanya</th>
            <th class="small">No HP</th>
            <th class="no">Prioritas</th>
            <th class="no">Kategori</th>
            <th class="medium">Topik</th>
            <th class="no">Ditanyakan</th>
            <th class="no">Terjawab</th>
            <th class="no">Status</th>
            <th width="110">&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="10">&nbsp;</td>
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
			
			<td>
				<?php
					echo $value->no_hp;
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
			
			<td><?php echo $value->kat_knowledge_base;?></td>

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
				$cek = (($user == $value->id_user_cs) AND ($value->tanggal_selesai != NULL) AND ($value->status == 'open'))?'1':'2';
                $color = ($value->status == 'open') ? 'yellow' : 'grey'; ?>
                    <a class="referensi-jawaban button <?php echo $color ?>"
                       data-id='<?php echo $value->id ?>'
					   data-kategori='<?php echo ascii_to_entities($value->kat_knowledge_base) ?>'
                       data-topik='<?php echo ascii_to_entities($value->pertanyaan) ?>'
                       data-pertanyaan='<?php echo ascii_to_entities($value->description) ?>'
                       data-jawaban='<?php echo ascii_to_entities($value->jawab) ?>'
                       data-jawabanrev='<?php echo ascii_to_entities($value->revisi) ?>'
                       data-cek='<?php echo ascii_to_entities($cek) ?>'
                       href='javascript:void(0)'><?php echo strtoupper($value->status) ?></a>
            </td>

            <!-- Lihat jawaban -->
            <td>
                <?php if (($value->id_knowledge_base != NULL) AND ($value->status == 'open')) : ?>
                    <a class="link-jawaban referensi-jawaban button green"
                       data-id='<?php echo $value->id ?>'
                       data-kategori='<?php echo ascii_to_entities($value->kat_knowledge_base) ?>'
                       data-topik='<?php echo ascii_to_entities($value->pertanyaan) ?>'
                       data-pertanyaan='<?php echo ascii_to_entities($value->description) ?>'
                       data-jawaban='<?php echo ascii_to_entities($value->jawab) ?>'
                       data-jawabanrev='<?php echo ascii_to_entities($value->revisi) ?>'
					   data-cek='<?php echo ascii_to_entities($cek) ?>'
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
    Kategori : <h1 id="kategori"></h1>
    Topik : <h1 id="topik"></h1>
    Pertanyaan : <h1 id="pertanyaan"></h1>
    Jawaban : <p id="jawabannya"></p>
    Jawaban revisi admin : <p id="jawabannya_adm"></p>
</div>

<div style="display: none" id="jawaban_default" data-id="">
	Kategori : <h1 id="kategori_def"></h1>
    Topik : <h1 id="topik_def"></h1>
    Pertanyaan : <h1 id="pertanyaan_def"></h1>
    Jawaban : <p id="jawabannya_def"></p>
    Jawaban revisi admin : <p id="jawabannya_adm_def"></p>
</div>

<script type="text/javascript">
    $(function () {
        $('#jawaban').dialog('destroy');
        $('#jawaban_default').dialog('destroy');

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
		
		$('#jawaban_default').dialog({
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
            ]
        });

        $('.referensi-jawaban').live('click', function () {
            var title = $(this).data('pertanyaan');
            var jawabannya = $(this).data('jawaban');
            var jawabannya_rev = $(this).data('jawabanrev');
            var topik = $(this).data('topik');
            var kategori = $(this).data('kategori');
            var id = $(this).data('id');
            var cek = $(this).data('cek');
			
			
			
			if(cek == 1){
				$('#jawaban').dialog('open');
				$('#jawaban').data('id', id);
				$('#kategori').html(kategori);
				$('#topik').html(topik);
				$('#pertanyaan').html(title);
				$('#jawabannya').html(jawabannya);
				$('#jawabannya_adm').html(jawabannya_rev);
			}else{
				$('#jawaban_default').dialog('open');
				$('#kategori_def').html(kategori);
				$('#topik_def').html(topik);
				$('#pertanyaan_def').html(title);
				$('#jawabannya_def').html(jawabannya);
				$('#jawabannya_rev_def').html(jawabannya_rev);
				$('#jawaban_default').data('id', id);
			}
			
           
            
        });
    })
</script>