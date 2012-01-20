<div class="content">

    <h1>Daftar Pengembalian Dokumen</h1>
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

    <?php echo search('/frontdesk/pengembalian_dokumen/index') ?>
  <div class="pagination"><?php echo ($pageLink) ? 'Halaman ' . $pageLink : '';?></div>
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

    <div class="pagination"><?php echo ($pageLink) ? 'Halaman ' . $pageLink : '';?></div>

    <?php else: ?>

    Tidak ada dokumen

    <?php endif ?>
</div>