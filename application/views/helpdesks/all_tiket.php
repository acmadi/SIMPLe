<script>
    var oTable;
    $(document).ready(function () {

        oTable = $('.table').dataTable();
        oTable.fnSort([
            [0, 'asc'],
            [1, 'asc']
        ]);
        oTable.fnAdjustColumnSizing();
        //oTable.fnFilter( 'open', 7 );

        $('#kategori_list').chosen().change(function () {
            var nama_kategori = $(this).val();
            oTable.fnFilter(nama_kategori, 3);
        })
    });
</script>

<div class="content">

    <h1>Tiket Helpdesk yang Dieskalasi</h1>

    <!-- <div class="notification yellow">
        Tiket Helpdesk yang dieskalasi ke level 
        <strong><?php echo $nama_level ?></strong>
    </div> -->

    <?php
        echo (isset($flashmessage)) ? $flashmessage : '';
    ?>

    <br/>

    <?php if ($tikets->num_rows() > 0): ?>

    <fieldset>
        <legend>Filter berdasarkan kategori</legend>
        <select name="kategori_list" id="kategori_list" class="chzn-select" data-placeholder="Pilih Kategori"
                style="width: 200px;float:right;">
            <option></option>
            <option value="">Semua</option>
            <?php foreach ($list_kategori->result() as $v): ?>
            <option value="<?php echo $v->kat_knowledge_base;?>"><?php echo $v->kat_knowledge_base;?></option>
            <?php endforeach;?>
        </select>
    </fieldset>

    <table class="table">
        <thead>
        <tr>
            <th class="no">#</th>
            <th class="no">Tiket</th>
            <th class="medium">Identitas Penanya</th>
            <th class="short">Kategori</th>
            <th class="no">Prioritas</th>
            <th class="medium">Pertanyaan</th>
            <th class="medium">Deskripsi</th>
            <th class="no">Tanggal</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
            <?php $i = 1 ?>
            <?php // dump($tikets->result() ) ?>
            <?php foreach ($tikets->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->no_tiket_helpdesk ?></td>

            <!-- Identitas Penanya -->
            <td>
                <?php
                if($value->tipe == 'kl') :
                    echo $value->id_satker . ' - ' . $value->nama_satker ;
                else :
                    echo $value->nama_petugas . ' (' . $value->instansi . ')';
                endif;
                ?>
            </td>

            <td>
                <?php echo $value->kat_knowledge_base ?>
            </td>

            <!-- Prioritas -->
            <td>
                <?php if ($value->prioritas == 'high'): ?>
                <span style="color: red; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

                <?php if ($value->prioritas == 'medium'): ?>
                <span style="color: orange; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

                <?php if ($value->prioritas == 'low'): ?>
                <span style="color: green; text-transform: uppercase;"><?php echo $value->prioritas ?></span>
                <?php endif ?>

            </td>

            <td><?php echo $value->pertanyaan ?></td>
            <td><?php echo $value->description ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td class="action">

				<?php
				if($value->tanggal_selesai == ''): ?>
                <a class="button green" href="<?php echo site_url('/helpdesks/view/' . $value->id) ?>">Jawab/Eskalasi</a>
				<?php else: ?>
				<strong>
					Terjawab
				</strong>
				<?php endif; ?>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <?php else: ?>

    <div class="notification red">
    Tidak ada pertanyaan yang dieskalasi untuk anda jawab.
    </div>

    <?php endif ?>
</div>

