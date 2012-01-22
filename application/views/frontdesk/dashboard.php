<div class="content">
    <h1>Dashboard</h1>

    <table class="chart" style="display: none;">
        <!--<caption>Hello</caption>-->
        <thead>
        <tr>
            <th scope="col">Tiket hari ini</th>
            <th scope="col">Dokumen yang bisa diambil</th>
            <th scope="col">Dokumen yang dikembalikan</th>
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
