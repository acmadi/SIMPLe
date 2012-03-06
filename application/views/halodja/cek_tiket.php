<div class="content">
    <h1>Cek Tiket</h1>

    <?php generate_notifkasi() ?>

    <fieldset>
        <legend>Pengecekan Tiket</legend>
        <form method="post" action="<?php echo site_url('/halodja/status_tiket') ?>">
            <p>
                Silahkan informasi yang berkaitan dengan tiket <br/>
                <input type="text" name="pencarian" value="<?php echo $no_tiket;?>" autocomplete="off" />
                <input type="submit" value="Cek Tiket" class="button green"/>
                <a href="<?php echo site_url('halodja/status_tiket') ?>" class="button">Reset</a>
            </p>
        </form>
    </fieldset>

    <p>&nbsp;</p>

    <?php if (isset($tikets)): ?>

        <table class="table">
            <thead>
            <tr>
                <th>Nomor Tiket</th>
                <th>Nomor Surat Usulan</th>
                <th>Kementerian</th>
                <th>Eselon</th>
                <th>Keputusan</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="9">&nbsp;</td>
            </tr>
            </tfoot>
            <tbody>

            <?php foreach ($tikets->result() as $tiket): ?>

            <tr>
                <td><strong>#<?php echo sprintf('%05d', $tiket->no_tiket_frontdesk) ?></strong></td>
                <td><?php echo $tiket->nomor_surat_usulan ?></td>
                <td><strong><?php echo $tiket->id_kementrian ?></strong> - <?php echo $tiket->nama_kementrian ?></td>
                <td><strong><?php echo $tiket->id_unit ?></strong> - <?php echo $tiket->nama_unit ?></td>
                <td>
                    <strong>
                        <?php
                        if ($tiket->keputusan == '') {
                            echo 'Diproses';
                        } else {
                            echo ucfirst($tiket->keputusan);
                        }
                        ?>
                    </strong>
                </td>
                <td><?php echo ((!empty($tiket->tanggal))? strftime('%d %B %Y', strtotime($tiket->tanggal)):'');  ?></td>
                <td><?php echo ((!empty($tiket->tanggal_selesai))? strftime('%d %B %Y', strtotime($tiket->tanggal_selesai)):'');  ?></td>
                <td><?php echo ucfirst($tiket->status) ?></td>
                <td class="action">
                    <a href="<?php echo site_url('halodja/lihat_dokumen/' . $tiket->no_tiket_frontdesk) ?>"
                        class="button green"
                        target="_blank">
                        Tanda Terima Pengajuan
                    </a>
                </td>
            </tr>

            <?php endforeach; ?>

            </tbody>
        </table>


    <?php elseif (isset($tiket) && $this->input->post()): ?>

    Tiket tidak ditemukan

    <?php endif ?>


</div>