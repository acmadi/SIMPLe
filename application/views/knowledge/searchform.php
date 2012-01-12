<?php

echo form_open('knowledge/search');

echo form_input('keyword', '', 'placeholder="Ketikkan kata kunci di sini..."') . ' ';
echo form_submit('submit', 'Cari', 'class="btn"');
echo form_close();