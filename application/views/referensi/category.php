<div class="content">
	<h1>Referensi Peraturan</h1>
	<?php $this->load->view('referensi/form'); ?>
	<hr/>
	<div id="ref_cat">
		<h6>Kategori Referensi</h6>
		<ul>
		<?php foreach($categories as $cat) : ?>
			<li><?php echo $cat->outertext ?></li>
		<?php endforeach; ?>
		</ul>
	</div>

	<div id="ref_item">
	<?php if (isset($items)) : ?>
		<ol>
		<?php foreach($items as $item) : ?>
			<li>
				<?php echo $item->innertext; ?>
			</li>
		<?php endforeach; ?>
		</ol>
	<?php endif; ?>
	</div>

	<div style="clear:both">
	<br/>
	<br/></div>
</div>