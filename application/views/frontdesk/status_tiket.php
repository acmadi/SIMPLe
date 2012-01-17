<div class="content">

    <h1>Status Tiket</h1>

    <?php echo search('/frontdesk/status_tiket/index') ?>

    <table class="table">
        <thead>
        <tr>
            <th class="short">No Tiket</th>
            <th class="short">Tanggal</th>
            <th class="short">Kode Eselon</th>
            <th class="short">Nama Eselon</th>
<!--            <th class="short">Kode Satker</th>-->
<!--            <th>Nama Satker</th>-->
            <th class="short">Status Tiket</th>
            <th class="short">Status Dokumen</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($result as $value): ?>
        <tr>
            <td class="short"><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td class="short"><?php echo table_tanggal($value->tanggal) ?></td>
            <td class="short"><?php echo $value->id_unit ?></td>
            <td class="short"><?php echo $value->nama_unit ?></td>
<!--            <td class="short">--><?php //echo $value->id_satker ?><!--</td>-->
<!--            <td>--><?php //echo $value->nama_satker ?><!--</td>-->
            <td class="short"><?php echo $value->status ?></td>
            <td class="short">
                <?php
                switch ($value->is_active) {
                    case '1':
                        echo 'Diterima ' . $value->nama_lavel;
                        break;
                    case '2':
                        echo 'Diteruskan ke ' . $value->nama_lavel;
                        break;
                    case '3':
                        echo 'Dikembalikan ' . $value->nama_lavel;
                        break;
                    case '4':
                        echo 'Diterima ' . $value->nama_lavel;
                        break;
                    case '5':
                        echo 'Diteruskan ke ' . $value->nama_lavel;
                        break;
                    case '6':
                        echo 'Disetujui ' . $value->nama_lavel;
                        break;
                    default :
                        echo '-';
                        break;
                }
                ?>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="pagination"><?php echo ($pageLink) ? 'Halaman ' . $pageLink : '';?></div>

</div>