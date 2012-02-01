<div class="content">
    <h1>Knowledge Base</h1>
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