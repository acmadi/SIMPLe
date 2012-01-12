<div class="content">
	<h1>Referensi Peraturan</h1>
	<div class="notice">
		Bila pencarian tidak menemukan referensi yang anda cari, silakan cari secara manual 
		referensi yang dibutuhkan di 
		<a href="http://www.kemenkumham.go.id/produk-hukum">Website Resmi Kementrian Hukum dan HAM RI</a>
	</div>
	<?php
	$this->load->view('referensi/form');
	?>
	<?php 
		if ($keyword != NULL && isset($keyword)) : 
			echo 
			'<br/><h2>' . 'Hasil pencarian dengan kata kunci ' . 
			'<strong>' . $keyword . '</strong>' . 
			'</h2>';

			echo '<div id="search_result">';

			if ($result_array != NULL) :
				echo '<ol>';
				foreach($result_array as $item) :
					$item_string = $item->outertext;
					$item_string = str_replace(
						'<a href="', '<a href="http://www.kemenkumham.go.id', 
							 $item_string);
					echo '<li>' . $item_string . '</li>';
				endforeach;
				echo '</ol>';
			else :
				echo '<div class="error">Tidak ada referensi yang ditemukan untuk kata kunci tersebut</div>';
			endif;

			echo '</div>';
		endif;
	?>
</div>