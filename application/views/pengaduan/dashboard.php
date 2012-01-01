<div id="konten">

	<?php		
	if($this->session->flashdata('pesan') != FALSE) :
		echo '<p>' . $this->session->flashdata('pesan') . '</p>';
	endif;            
	?>
	<div>
	Nomor antrian terakhir:
	</div>
	<div style="font-size: 150px">
		<?php echo $no_antrian ?>
	</div>
	<div>
		<?php echo anchor('pengaduan/dashboard/plusone', 'Nomor Antrian Selanjutnya') ?> |
		<?php echo anchor('pengaduan/dashboard/identitas', 'Isi Pengaduan') ?>
	</div>
</div>