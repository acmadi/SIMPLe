<?php
$sms[0]['telp'] = '085228402005';
$sms[0]['message'] = 'INFO 000017 000001';

$sms[1]['telp'] = '0877392642';
$sms[1]['message'] = 'INFO 000192 000011';


$sms[2]['telp'] = '0812857400';
$sms[2]['message'] = 'INFO 008217 000201';


$sms[3]['telp'] = '085692840212';
$sms[3]['message'] = 'INFO 020317 002921';
?>

<div class="content">
    <h1>Kotak Masuk SMS</h1>

    <a href="<?php echo site_url('/admin/sms/outbox') ?>">Kotak Keluar</a>

    <div>
        <table width="100%">
            <thead>
            <tr>
                <th class="short">&nbsp;</th>
                <th class="short">No</th>
                <th>Telepon</th>
                <th>Pesan</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            <?php foreach ($sms as $value): ?>
            <tr>
                <td class="short"><input type="checkbox"/></td>
                <td class="short"><?php echo $i++ ?></td>
                <td><?php echo $value['telp'] ?></td>
                <td><?php echo $value['message'] ?></td>
            </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <input type="submit" class="button gray-pill" value="Hapus" onclick="if (confirm('Anda yakin mau menghapus?')) window.location.href = '<?php echo $_SERVER['PHP_SELF'] ?>'" />
    </div>
</div>