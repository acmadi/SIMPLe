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
    <h1>List Dokumen Revisi Anggaran</h1>

    <?php
    echo ($this->session->flashdata('success') ? '<div class="notification green">' . $this->session->flashdata('success') . '</div>' : '');
    ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="no">No Tiket</th>
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
                <td><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></td>
                <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>
                <td class="penyelia">
                    <select name="penyelia" class="chzn-single" style="width: 300px;">
                    <?php foreach ($penyelia->result() as $value2): ?>
                        <option value="<?php echo $value2->id_user ?>"><?php echo $value2->nama ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
                <td class="action">
                    <a href="<?php echo site_url('frontdesks/cetak_dokumen/' . $value->no_tiket_frontdesk ) ?>" class="cetak button green">Cetak</a>
                    <a href="<?php echo site_url('frontdesks/eskalasi/' . $value->no_tiket_frontdesk) ?>" class="button blue">Eskalasi</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>