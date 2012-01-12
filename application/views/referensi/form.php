<?php

echo form_open('referensi/search');

echo form_input('keyword', '', 'placeholder="Ketikkan kata kunci pencarian di sini lalu tekan enter..."') . ' ' ;
echo form_submit('submit', 'Cari', 'class="button blue-pill"');

echo form_close();