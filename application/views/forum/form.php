<script src="<?php echo base_url() ?>js/nicedit/nicEdit.js.php?base=<?php echo base_url() ?>" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<?php
echo form_open_multipart('forum/kirim');

if (isset($id_parent) && $id_parent != NULL)
echo form_hidden('id_parent', $id_parent);

if (isset($id_kat_forum) && $id_kat_forum != NULL)
echo form_hidden('id_kat_forum', $id_kat_forum);
echo form_hidden('referrer',  $referrer);


if (isset($kat_forum) && $kat_forum != NULL)
echo '<strong>Kategori: </strong>' . '<br/>' . form_dropdown('id_kat_forum', $kat_forum) . '<br/>';

echo '<strong>Judul: </strong>' . '<br/>' . form_input('judul_forum', $judul_forum) . '<br/>';
echo '<strong>Isi: </strong>' . '<br/>' . form_textarea('isi_forum', '', 
	 'style="width: 600px; height: 200px"') . '<br/>';

echo '<strong>Lampiran File: </strong>' . '<br/>' . form_upload('file') . '<br/>';

echo '<br/>' . form_submit('submit', 'Kirim', 'class="button blue-pill"');

echo form_close();

