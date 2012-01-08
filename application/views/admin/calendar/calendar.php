<!--<style type="text/css">-->
<!--    .calendar td {-->
<!--        padding: 0;-->
<!--        margin: 0;-->
<!--        width: 1px;-->
<!--        height: 1px;-->
<!--        font-size: 12px;-->
<!--    }-->
<!---->
<!--    .calendar {-->
<!--        float: left;-->
<!--        padding: 10px;-->
<!--        margin: 10px;-->
<!--        width: 250px;-->
<!--        border: 1px solid #cecece;-->
<!--    }-->
<!---->
<!--    .calendar td {-->
<!--        padding: 4px;-->
<!--    }-->
<!---->
<!--    .calendar a {-->
<!--        font-weight: bold !important;-->
<!--        background: #1c94c4;-->
<!--        color: white;-->
<!--        padding: 4px;-->
<!--    }-->
<!--</style>-->

<script type="text/javascript">
    $(function () {
        $('.calendar').click(function () {
            confirm('Yakin mau menghapus tanggal ini?');
        })
    })
</script>

<div class="content">

    <h1>Kalender Libur</h1>

    <a href="<?php echo site_url('/admin/calendar/add') ?>" class="button blue-pill">Tambah Kalender Baru</a>

    <hr/>

    <?php
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }
    if ($this->session->flashdata('notice')) {
        echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
    }
    if ($this->session->flashdata('info')) {
        echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
    }
    ?>

    <table width="100%">
        <thead>
        <tr>
            <td class="short">No.</td>
            <td class="short">Tahun</td>
            <td class="short">Bulan</td>
            <td class="short">Hari</td>
            <td class="short">Keterangan</td>
            <td class="action">Aksi</td>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($holiday->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->year ?></td>
            <td><?php echo $value->month ?></td>
            <td><?php echo $value->day ?></td>
            <td><?php echo $value->keterangan ?></td>
            <td>
                <a href="<?php echo site_url("/admin/calendar/delete/{$value->year}/{$value->month}/{$value->day}") ?>" class="button gray-pill">Hapus</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <!--    <em>Klik Tanggal yang berwarna untuk menghapus</em>-->

    <?php

//    for ($i = 1; $i <= 12; $i++) {
//        if ($i % 3 == 1)
//            echo '<div style="clear: both;"></div>';
//
//        foreach ($holiday->result() as $value) {
//            $data[$value->day] = '#';
//        }
//
//        echo $this->calendar->generate(date('Y'), $i, $data);

//}
    ?>
</div>