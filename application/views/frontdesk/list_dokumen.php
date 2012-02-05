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
    })
</script>

<div class="content">
    <h1>List Dokumen Revisi Anggaran</h1>

    <table class="table">
        <thead>
        <tr>
            <th>No</th>
            <th>No Tiket</th>
            <th>Kementerian</th>
            <th>Eselon</th>
            <th>Penyelia</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($list_dokumen->result() as $value): ?>

            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
                <td><?php echo $value->nama_kementrian ?></td>
                <td><?php echo $value->nama_unit ?></td>
                <td class="penyelia">
                    <select name="penyelia" class="">
                    <?php foreach ($penyelia->result() as $value2): ?>
                        <option value="<?php echo $value2->id_user ?>"><?php echo $value2->nama ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
                <td class="action">
                    <a href="<?php echo site_url('frontdesks/cetak_dokumen/' . $value->no_tiket_frontdesk ) ?>" class="cetak button green">Cetak</a>
                    <a href="<?php echo site_url('frontdesks/eskalasi') ?>" class="button blue">Eskalasi</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>