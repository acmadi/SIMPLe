<div class="content">
    <h1>Dashboard</h1>

    <table class="chart" style="display: none;">
        <!--<caption>Hello</caption>-->
        <thead>
        <tr>
            <th scope="col"><a href="<?php echo site_url('frontdesk/status_tiket/masuk')?>">Tiket hari ini</a></th>
            <th scope="col"><a href="<?php echo site_url('frontdesk/status_tiket/selesai')?>">Dokumen yang bisa diambil</a></th>
            <th scope="col"><a href="<?php echo site_url('frontdesk/status_tiket/kembali')?>">Dokumen yang dikembalikan</a></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="row">
                <?php echo $jml_tiket_skrg; ?>
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
