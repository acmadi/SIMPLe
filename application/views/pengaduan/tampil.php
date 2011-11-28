<?php foreach($pengaduans as $pengaduan) : ?>
<div style="border: 1px solid gray; padding: 10px; margin: 10px;">
<?php echo 
	'kepada <strong>' . $pengaduan->nama . '</strong>: ' . 
	'<p>' .	$pengaduan->isi . '</p>'; 
?>
</div>
<?php endforeach; ?>