<?php generate_notifkasi() ?>

<form id="cari_unit"
      class="form-search form-inline well"
      action="<?php echo site_url('/admin/frontdesk') ?>"
      method="post">
    <div>
        <label class="control-label">Cari berdasarkan</label>
        <?php echo form_dropdown('fcari', $pilihan, $cari, "class='input-medium'");?>

        <label class="control-label">Keyword</label>

        <input type="text" value="<?php echo $keyword;?>" placeholder="Keyword" name="fkeyword"
               id="teks-cari"/>

        <button type="submit" class="btn input-query" value="Cari"/><i class="icon-search"></i></button>
    </div>
</form>


<table class="table">
    <thead>
    <tr>
        <th rowspan="2">Tiket</th>
        <th colspan="2" style="text-align: center; border-bottom: 1px solid #999;">Tanggal</th>
        <th rowspan="2">Nama K/L</th>
        <th rowspan="2">Nama Eselon</th>
        <th rowspan="2">Nama Satker</th>
        <th rowspan="2">Status</th>
        <th rowspan="2">&nbsp;</th>
    </tr>
    <tr>
        <th>Pengajuan</th>
        <th>Selesai</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">&nbsp;</td>
    </tr>
    </tfoot>
    <tbody>


    <?php $i = $nomor + 1; foreach ($result as $tiket): ?>
    <tr>
        <td>#<?php echo sprintf('%05d', $tiket->no_tiket_frontdesk) ?></td>
        <td><?php echo $tiket->tanggal ?></td>
        <td><?php echo $tiket->tanggal_selesai ?></td>
        <td><strong><?php echo $tiket->id_kementrian ?></strong> - <?php echo $tiket->nama_kementrian ?></td>
        <td><strong><?php echo $tiket->id_unit ?></strong> - <?php echo $tiket->nama_unit ?></td>
        <td><?php echo $tiket->nama_satker ?></td>
        <td><?php echo $tiket->status ?></td>
        <td>
            <a href="<?php echo base_url('output/pengajuan_' . $tiket->no_tiket_frontdesk . '.pdf') ?>"
               class="btn btn-info btn-mini"
               target="_blank">
                Lihat</a>

            <a href="<?php echo site_url('admin/frontdesk/delete/' . $tiket->no_tiket_frontdesk) ?>"
               class="btn btn-danger btn-mini"
               onclick="return confirm('Anda yakin akan menghapus tiket ini?')">
                Hapus</a>
        </td>

    </tr>
        <?php endforeach ?>

    </tbody>
</table>

<div class="pagination" style="text-align: center;"><?php echo ($pageLink) ? '' . $pageLink : '';?></div>
