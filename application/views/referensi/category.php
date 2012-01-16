<div class="content">
	<h1>Referensi Peraturan</h1>
	<div class="col-2">
		<?php $this->load->view('referensi/form'); ?>
	</div>
	<hr/>
	<div class="notification yellow">
		Bila daftar referensi tidak termuat di halaman ini, silakan tekan F5 di keyboard atau 
		<?php echo anchor('referensi', 'KLIK DI SINI')?>. <br/>

		Anda juga dapat mengakses secara manual referensi peraturan dengan mengklik
		link berikut 
		<?php echo anchor('http://www.kemenkumham.go.id/produk-hukum', 
		'www.kemenkumham.go.id/produk-hukum') ?>. <br/>

		Bila referensi masih tidak bisa dibuka, kemungkinan terjadi masalah sambungan 
		ke web server <strong>Kementerian Hukum dan HAM</strong>.
	</div>
	<div class="col-1">
		<h1>Kategori Referensi</h1>
		<ul>
		<?php foreach($categories as $cat) : ?>
			<li><?php echo $cat->outertext ?></li>
		<?php endforeach; ?>
		</ul>
	</div>

	<div class="col-2">
	<?php if (isset($items)) : ?>
		<h1>Referensi</h1>
		<ol>
		<?php foreach($items as $item) : ?>
			<li>
				<?php echo $item->innertext; ?>
			</li>
		<?php endforeach; ?>
		</ol>
	<?php else : ?>
		<div class="notification">
			Silakan pilih kategori referensi di samping, atau gunakan kolom pencarian di atas.
		</div>
	<?php endif; ?>
	</div>

	<div style="clear:both">
	<br/>
	<br/></div>
</div>