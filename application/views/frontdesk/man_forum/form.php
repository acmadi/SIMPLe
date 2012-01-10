<?php

echo form_open('frontdesk/man_forum/kirim');

if ($id_parent != NULL)
echo form_hidden('id_parent', $id_parent);


echo form_hidden('id_kat_forum', $id_kat_forum);
echo form_hidden('referrer',  $referrer);

if ($kat_forum != NULL)
echo '<strong>Kategori: </strong>' . '<br/>' . form_dropdown('id_kat_forum', $kat_forum) . '<br/>';

echo '<strong>Judul: </strong>' . '<br/>' . form_input('judul_forum', $judul_forum) . '<br/>';
echo '<strong>Isi: </strong>' . '<br/>' . form_textarea('isi_forum') . '<br/>';

echo form_submit('submit', 'Kirim');

echo form_close();