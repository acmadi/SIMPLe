<div class="content">
	<h1>Referensi Peraturan</h1>
	<div class="col-2">
		<?php $this->load->view('referensi/form'); ?>
	</div>
	<hr/>

	<div class="col-1">
		<h1>Kategori Referensi</h1>
		<ul>
		<?php foreach($categories as $cat) : ?>
			<li><?php echo anchor($cat->href, $cat->nama_kat) ?></li>
		<?php endforeach; ?>
		</ul>
	</div>

	<div class="col-2">
	<?php if (isset($items)) : ?>
		<h1>Referensi</h1>
		<ol>
		<?php foreach($items as $item) : ?>
			<li>
				<?php echo anchor($item->href, $item->nama_ref) ?>
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