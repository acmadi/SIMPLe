<div class="content">

    <h1>Daftar Pengembalian Dokumen</h1>

    <?php
    // TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
    if ($this->session->flashdata('success')) {
        notification($this->session->flashdata('success'), 'BERHASIL', 'green');
    }
    if ($this->session->flashdata('error')) {
        notification($this->session->flashdata('error'), 'ERROR', 'red');
    }
    if ($this->session->flashdata('notice')) {
        notification($this->session->flashdata('notice'), 'WARNING', 'yellow');
    }
    if ($this->session->flashdata('info')) {
        notification($this->session->flashdata('info'), 'INFORMASI', 'blue');
    }
    ?>
    <?php if ($result->num_rows() > 0): ?>


    <table class="table">
        <thead>
        <tr>
            <th class="short">No Tiket</th>
            <th class="short">Tanggal</th>
            <th class="medium">Kementrian</th>
            <th class="medium">Eselon</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="7">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
            <?php foreach ($result->result() as $value): ?>
        <tr>
            <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><strong><?php echo $value->id_kementrian ?></strong>  - <?php echo $value->nama_kementrian ?></td>
            <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>
            <td class="action">
                <a href="<?php echo site_url('/frontdesk/pengembalian_dokumen/cetak/' . $value->id_pengembalian_doc) ?>" class="button blue-pill">Kembalikan Dokumen</a>
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