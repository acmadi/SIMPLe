    <script>
    var oTable;
    $(document).ready(function(){
        
        oTable = $('.table').dataTable();
        oTable.fnSort( [ [0,'asc'],[1,'asc'] ] );
        oTable.fnAdjustColumnSizing();
        //oTable.fnFilter( 'open', 7 );

  
		$('#kategori_list').chosen().change(function(){
            var nama_kategori = $(this).val();
			 oTable.fnFilter( nama_kategori, 1 );
            
        })
    });
    </script>
	
<div class="content">
    <h1>Knowledge Base</h1>
	<fieldset>
        <legend>Filter berdasarkan kategori </legend>
				<select name="kategori_list" id="kategori_list" class="chzn-select" data-placeholder="Pilih Kategori" style="width: 200px;float:right;">
					<option></option>
					<option value="">Semua</option>
				<?php foreach($list_kategori->result() as $v):?>
					<option value="<?php echo $v->kat_knowledge_base;?>"><?php echo $v->kat_knowledge_base;?></option>		
				<?php endforeach;?>
				</select>
			
    </fieldset>
    <br/>
    <br/>
    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
			<th class="small">Kategori</th>
            <th class="medium">Pertanyaan</th>
            <th class="medium">Jawaban</th>
            
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($knowledgebase->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
			<td><?php echo $value->kat_knowledge_base ?></td>
            <td><?php echo $value->judul ?></td>
            <td><?php echo $value->jawaban ?></td>
            
         
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>