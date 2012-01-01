<div id="konten">

<h3>Form Pengaduan</h3>
<br/>
<br/>
<?php



?>

<?php echo form_open('pengaduan/dashboard/kirim_pengaduan'); ?>
	
	Id_petugas_satker: 
	<input type="text" name="id_petugas_satker" value="<?php echo $id_petugas_satker ?>"/> *
	<br/>
	<h4>Dari:</h4>
	<?php echo $petugas->nama_petugas ?>
	<h4>Kepada:</h4> 
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

</div>