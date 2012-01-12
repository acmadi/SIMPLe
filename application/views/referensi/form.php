<?php

echo form_open('referensi/search');

echo '<h2>Cari Referensi Peraturan</h2>';
echo form_input('keyword', '', 'placeholder="Ketikkan kata kunci di sini lalu tekan enter..."') . ' ' ;

echo form_submit('submit', 'Cari', 'class="button blue-pill"');

echo form_close();