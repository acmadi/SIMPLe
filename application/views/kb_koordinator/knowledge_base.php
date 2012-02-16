<script>
    $(function(){
        var oTable = $('.table').dataTable();

        $('select#ranah-filter').change( function () {
            oTable.fnFilter( $(this).val(), 5);
            console.log($(this).val());
        });
    })
</script>

<div class="content">
    <h1>Daftar Knowledge Base</h1>

    <?php generate_notifkasi() ?>

    <p style="text-align: right">
        <a href="<?php echo site_url('/kb_koordinator/add') ?>" class="button green">Tambah</a>
    </p>

    <fieldset>
        <legend>Filter</legend>
        Ranah <select id="ranah-filter">
            <option value="">Semua</option>
            <option value="privat">Privat</option>
            <option value="publik">Publik</option>
        </select>
    </fieldset>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="medium">Topik</th>
            <th class="medium">Pertanyaan</th>
            <th class="medium">Jawaban</th>
            <th>Tipe</th>
            <th>Ranah</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($knowledge_base->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->judul ?></td>
            <td><?php echo $value->desripsi ?></td>
            <td><?php echo $value->jawaban ?></td>
            <td>
                <?php
                if ($value->tipe == 0) {
                    echo 'Permanent';
                } else {
                    echo 'Workarond';
                }
                ?>
            </td>
            <td>
                <?php
                if ($value->is_public) {
                    echo 'Publik';
                } else {
                    echo 'Privat';
                }
                ?>
            </td>
            <td class="action">
                <a href="<?php echo site_url('/kb_koordinator/edit/' . $value->id_knowledge_base) ?>" class="button blue">Ubah</a>
				<?php if($value->jml_related == 0):?>
					<a href="<?php echo site_url('/kb_koordinator/delete/' . $value->id_knowledge_base) ?>" class="button red" onclick="return confirm('Yakin akan menghapus ini?')">Hapus</a>
				<?php endif; ?>
			</td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>