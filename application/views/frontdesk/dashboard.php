<div class="content">
    <h1>Dashboard</h1>

    <table class="chart" style="display: none;">
        <thead>
        <tr>
            <th scope="col">
                <a href="<?php echo site_url('frontdesk/status_tiket/masuk')?>">Tiket hari ini <br/>(<?php echo $jml_tiket_skrg ?>)</a>
            </th>
            <th scope="col">
                <a href="<?php echo site_url('frontdesks/list_dokumen')?>">Proses <br/>(<?php echo $jml_tiket_proses ?>)</a>
            </th>
            <th scope="col">
                <a href="<?php echo site_url('frontdesk/status_tiket/selesai')?>">Dokumen Selesai <br/>(<?php echo $jml_tiket_selesai ?>)</a>
            </th>
            <th scope="col">
                <a href="<?php echo site_url('frontdesk/status_tiket/kembali')?>">Dokumen Ditolak <br/>(<?php echo $jml_tiket_kembali ?>)</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="row">
                <?php echo $jml_tiket_skrg; ?>
            </td>
            <td scope="row">
                <?php echo $jml_tiket_proses; ?>
            </td>
            <td scope="row">
                <?php echo $jml_tiket_selesai; ?>
            </td>
            <td scope="row">
                <?php echo $jml_tiket_kembali; ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>
