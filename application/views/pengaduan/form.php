<h1>Form Pengaduan</h1>

<?php

if($this->session->flashdata('pesan') != FALSE) :
	echo '<p>' . $this->session->flashdata('pesan') . '</p>';
endif;

?>

<p>* Dev note: Sementara field id_petugas_satker ditampilkan sebagai input biasa, dari yang seharusnya hidden. 
</p>

<?php echo form_open('pengaduan/kirim'); ?>
	
	Id_petugas_satker: 
	<input type="text" name="id_petugas_satker" value="<?php echo $id_petugas_satker ?>"/> *
	<br/>

	Kepada: 
	<select name="id_user">
	<?php foreach($users as $user) : ?>
		<option value="<?php echo $user->id_user; ?>">
			<?php echo $user->nama_lavel . ' | ' . $user->nama; ?>
		</option>
	<?php endforeach; ?>
	</select>
	<br/>

	Deskripsi pengaduan: <br/>
	<textarea name="pengaduan" cols="60" rows="7"></textarea>
	<br/>

	<input type="submit" value="Kirim"/>

<?php echo form_close(); ?>