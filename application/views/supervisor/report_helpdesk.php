<div class="content">
    <h1>Pertanyaan yang Terjawab oleh CS Helpdesk</h1>

    <table>
    <tr>
    	<th>Ditanyakan</th>
    	<th>Terjawab</th>
    	<th>ID / Nama CS</th>
    	<th>Pertanyaan</th>
    	<th>Jawaban</th>
    </tr>
    <?php foreach($tiket_helpdesk as $tiket) : ?>
  	<tr>
  		<td><?php echo $tiket->tanggal ?></td>
  		<td><?php echo $tiket->timestamp ?></td>
  		<td><?php echo $tiket->username . ' / ' . $tiket->nama ?></td>
  		<td><?php echo $tiket->pertanyaan ?></td>
  		<td><?php echo 'jawaban' ?></td>
  	</tr>
    <?php endforeach ?>
    </table>
    <?php 
    echo '<strong>Dump Data, development only</strong>';
    echo '<pre>'; 
    var_dump($tiket_helpdesk); 
    echo '</pre>';
    ?>
</div>