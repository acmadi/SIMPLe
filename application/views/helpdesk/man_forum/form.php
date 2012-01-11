<script src="<?php echo base_url() ?>js/nicedit/nicEdit.js.php?base=<?php echo base_url() ?>" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<?php

echo form_open_multipart('helpdesk/man_forum/kirim');

if ($id_parent != NULL)
echo form_hidden('id_parent', $id_parent);

echo form_hidden('id_kat_forum', $id_kat_forum);
echo form_hidden('referrer',  $referrer);

echo '<strong>Lampiran File: </strong>' . '<br/>' . form_upload('file') . '<br/>';

if ($kat_forum != NULL)
echo '<strong>Kategori: </strong>' . '<br/>' . form_dropdown('id_kat_forum', $kat_forum) . '<br/>';

echo '<strong>Judul: </strong>' . '<br/>' . form_input('judul_forum', $judul_forum) . '<br/>';
echo '<strong>Isi: </strong>' . '<br/>' . form_textarea('isi_forum', '', 
	 'style="width: 600px; height: 200px"') . '<br/>';

echo form_submit('submit', 'Kirim');

echo form_close();

