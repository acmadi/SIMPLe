<?php

echo form_open('knowledge/search');

	if (isset($prev_keyword)) : 
		echo form_hidden('prev_keyword', $prev_keyword) . ' ';
	endif;

	echo form_input('keyword', '', 'placeholder="Ketikkan kata kunci di sini..."') . ' ';

	if (isset($prev_keyword)) : 
		echo form_submit('submit', 'Cari lagi', 'class="btn"');
		echo '<br/>' . anchor('knowledge', 'Ulang Pencarian');
	else :
		echo form_submit('submit', 'Cari', 'class="btn"');
	endif;
echo form_close();