<meta http-equiv="refresh" content="10; url=<?php echo site_url('/frontdesk/ambil_dokumen')  ?>">

<div class="content">

    <h1>Daftar Pengambilan Dokumen</h1>
    <?php
    // TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
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
    <?php if ($result->num_rows() > 0): ?>

    <?php echo search('/frontdesk/ambil_dokumen/index') ?>

    <table class="table">
        <thead>
        <tr>
            <th class="short">No Tiket</th>
            <th class="short">Tanggal</th>
            <th class="short">Kode Eselon</th>
            <th class="short">Nama Eselon</th>
<!--            <th class="short">Kode Satker</th>-->
<!--            <th>Nama Satker</th>-->
            <th class="short">Status</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($result->result() as $value): ?>
        <tr>
            <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><?php echo $value->id_unit ?></td>
            <td><?php echo $value->nama_unit ?></td>
<!--            <td>--><?php //echo $value->id_satker ?><!--</td>-->
<!--            <td>--><?php //echo $value->nama_satker ?><!--</td>-->
            <td><?php echo $value->status ?></td>
            <td class="action">
                <a href="<?php echo site_url('/frontdesk/ambil_dokumen/cetak/' . $value->no_tiket_frontdesk) ?>" class="button blue-pill">Ambil Dokumen</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="pagination"><?php echo ($pageLink) ? 'Halaman ' . $pageLink : '';?></div>

    <?php else: ?>

    Tidak ada dokumen

    <?php endif ?>
</div>