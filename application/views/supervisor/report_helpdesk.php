<script>
function knowledge(id){
	// alert(id);
	var knowledge_base_id = id;
    var url = '<?php echo site_url('helpdesk/knowledge_base/get_by_id/') ?>/' + knowledge_base_id;

    $.get(url, function (response) {
        $('#jawaban').html(response).dialog('open');
    });
}
$(document).ready(function(){

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

    });

});
</script>
<div class="content">
    <h1>Pertanyaan yang Terjawab oleh CS Helpdesk</h1>

    <table class="table">
    <thead>
    <tr>
    	<th class="no">No</th>
    	<th class="no">Terjawab</th>
    	<th class="no">ID / Nama CS</th>
    	<th class="no">Pertanyaan</th>
    	<th class="no">Deskripsi</th>
    	<th class="no">Jawaban</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($tiket_helpdesk as $tiket) : ?>
  	<tr>
  		<td class="no"><?php echo $i++ ?></td>
  		<td class="no"><?php echo $tiket->timestamp ?></td>
  		<td class="no"><?php echo $tiket->username . ' / ' . $tiket->nama ?></td>
  		<td class="no"><?php echo $tiket->pertanyaan ?></td>
  		<td class="no"><?php echo $tiket->description ?></td>

  		<td class="no"><?php 
  						echo ($tiket->id_knowledge_base != NULL) ?
  						form_button('show', 'Lihat', 
  						'class="button" 
  						 onclick="return knowledge('.$tiket->id_knowledge_base.')"') . ' ' .
  					    'Knowledge base #' . $tiket->id_knowledge_base : 
  					    ' - ';
  					    ?></td>
  	</tr>
    <?php endforeach ?>
    </tbody>

    </table>
    <?php 
    // if(ENVIRONMENT == 'development'):
    // echo '<strong>Dump Data, development only</strong>';
    // echo '<pre>'; 
    // var_dump($tiket_helpdesk); 
    // echo '</pre>';
    // endif;
    ?>
</div>
<div id="jawaban" style="display: none;"></div>