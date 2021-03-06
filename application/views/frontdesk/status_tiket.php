<div class="content">

    <h1>Status Tiket</h1>    
    <table class="table">
        <thead>
        <tr>
            <th class="no">No Tiket</th>
            <th class="no">Tanggal</th>
            <th class="short">Kementerian</th>
            <th class="short">Eselon</th>
<!--            <th class="short">Kode Satker</th>-->
<!--            <th>Nama Satker</th>-->
            <th class="no">Status Tiket</th>
            <th class="short">Status Dokumen</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($result->result() as $value): ?>
        <tr>
            <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></td>
            <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>
<!--            <td class="short">--><?php //echo $value->id_satker ?><!--</td>-->
<!--            <td>--><?php //echo $value->nama_satker ?><!--</td>-->
            <td><?php echo $value->status ?></td>
            <td>
                <?php
                switch ($value->is_active) {
                    case '1':
                        if (preg_match('/Helpdesk/i', $value->nama_lavel)) {
                            $value->nama_lavel = 'CS';
                        }
						if($value->keputusan == 'disahkan'){
							echo 'Disetujui oleh ' . '<strong>'.$value->nama_lavel.'</strong>';
						}else{
							echo 'Diterima oleh ' . '<strong>'.$value->nama_lavel.'</strong>';
						}
                        break;
                    case '2':
                        echo 'Diteruskan ke ' . '<strong>'.$value->nama_lavel.'</strong>';
                        break;
                    case '3':
                        echo 'Dikembalikan oleh ' . '<strong>'.$value->nama_lavel.'</strong>';
                        break;
                    case '4':
                        echo 'Diterima oleh ' . '<strong>'.$value->nama_lavel.'</strong>';
                        break;
                    case '5':
                        echo 'Diteruskan ke ' . '<strong>'.$value->nama_lavel.'</strong>';
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
</div>