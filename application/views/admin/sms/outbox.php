<?php
$sms[0]['telp'] = '085228402005';
$sms[0]['status'] = 'Delivered';
$sms[0]['message'] = 'Nomor Tiket #00001 dalam status Open';

$sms[1]['telp'] = '0877392642';
$sms[1]['status'] = 'Delivered';
$sms[1]['message'] = 'Nomor Tiket #00002 dalam status Open';


$sms[2]['telp'] = '0812857400';
$sms[2]['status'] = 'Delivered';
$sms[2]['message'] = 'Nomor Tiket #00008 dalam status Open';


$sms[3]['telp'] = '085692840212';
$sms[3]['status'] = 'Delivered';
$sms[3]['message'] = 'Nomor Tiket #00014 dalam status Open';


?>

<div class="content">
    <h1>Kotak Keluar SMS</h1>

    <a href="<?php echo site_url('/admin/sms/inbox') ?>">Kotak Masuk</a>

    <div>
        <table width="100%">
            <thead>
            <tr>
                <th class="short">&nbsp;</th>
                <th class="short">No</th>
                <th>Telpon</th>
                <th>Status</th>
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
                <td><?php echo $value['status'] ?></td>
                <td><?php echo $value['message'] ?></td>
            </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <input type="submit" class="button gray-pill" value="Hapus" onclick="if (confirm('Anda yakin mau menghapus?')) window.location.href = '<?php echo $_SERVER['PHP_SELF'] ?>'" />
    </div>
</div>