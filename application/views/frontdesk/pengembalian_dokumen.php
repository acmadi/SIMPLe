<script>
    $(function(){
        $('.cetak').click(function(){
            var penyelia = $(this).parent().parent().children('.penyelia').children('select');
            console.log(penyelia.val());
            var new_link = $(this).attr('href') + '/' + penyelia.val();
            console.log(new_link);
            //$(this).attr('href', new_link);
            window.open(new_link, '_blank');
            return false;
        })

        $('.chzn-single').chosen();
    })
</script>

<div class="content">

    <h1>Daftar Pengembalian Dokumen</h1>

    <?php generate_notifkasi() ?>

    <?php if ($result->num_rows() > 0): ?>


    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="">No Tiket</th>
            <th class="">Tanggal</th>
            <th class="">Kementerian</th>
            <th class="">Eselon</th>
            <th class="">Status</th>
            <th class="">Nama Penyelia</th>
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
            <?php foreach ($result->result() as $value): ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><strong><?php echo $value->id_kementrian ?></strong>  - <?php echo $value->nama_kementrian ?></td>
            <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>
            <td>
                <?php if ($value->sudah_diambil == 1): ?>
                    Sudah diambil
                <?php else: ?>
                    Belum diambil
                <?php endif; ?>
            </td>
            <td class="penyelia">
                <select name="penyelia" class="chzn-single" style="width: 200px;">

                <?php foreach ($penyelia->result() as $value2): ?>
                    <option value="<?php echo $value2->id_user ?>"><?php echo $value2->nama ?></option>
                <?php endforeach; ?>
                </select>
            </td>
            <td class="action">
				<?php
					$style_button = 'green';
					$tmp = $this->db->query('SELECT * FROM tb_pengembalian_doc WHERE no_tiket_frontdesk = ? AND sudah_diambil = 1',array($value->no_tiket_frontdesk))->num_rows();
					if($tmp > 0) $style_button = '';
				?>
                <a href="<?php echo site_url('/frontdesk/pengembalian_dokumen/cetak/' . $value->id_pengembalian_doc) ?>" class="cetak button <?php echo $style_button;?>">Kembalikan Dokumen</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php else: ?>

    <div class="notification yellow">
    Tidak ada dokumen
    </div>

    <?php endif ?>
</div>