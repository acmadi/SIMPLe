<?php

echo form_open('frontdesk/man_forum/kirim');

echo form_hidden('id_parent', $id_parent);
echo form_hidden('id_kat_forum', $id_kat_forum);
echo form_hidden('referrer',  $referrer);

echo '<strong>Judul: </strong>' . '<br/>' . form_input('judul_forum', 'Balas: ' . $judul_forum) . '<br/>';
echo '<strong>Isi: </strong>' . '<br/>' . form_textarea('isi_forum') . '<br/>';

echo form_submit('submit', 'Kirim');

echo form_close();