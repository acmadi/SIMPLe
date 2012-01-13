<?php

echo form_open('referensi/search');

echo form_input('keyword', '', 
	'placeholder="Ketikkan kata kunci pencarian di sini lalu tekan enter..."
	 width="400"') . ' ' ;
echo form_submit('submit', 'Cari', 'class="button blue"');

echo form_close();