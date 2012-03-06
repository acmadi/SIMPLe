<div class="content">
    <h1>Cek Tiket</h1>

    <?php generate_notifkasi() ?>

    <fieldset>
        <legend>Pengecekan Tiket</legend>
        <form method="post" action="<?php echo site_url('/tiket/cek_tiket') ?>">
            <p>
                Nomor Tiket <input type="text" name="no_tiket" value="<?php echo $no_tiket;?>" autocomplete="off" />
                <input type="submit" value="Cek Tiket" class="button green"/>
                <a href="<?php echo site_url('tiket') ?>" class="button">Reset</a>
            </p>
        </form>
    </fieldset>

    <?php if (isset($tiket)): ?>
    <fieldset>
        <legend>Status Tiket</legend>
        <table style="width: 100%;">
            <tr>
                <td>Nomor Tiket</td>
                <td><strong>#<?php echo sprintf('%05d', $tiket->no_tiket_frontdesk) ?></strong></td>
            </tr>

            <tr>
                <td>Nomor Surat Usulan</td>
                <td><strong><?php echo $tiket->nomor_surat_usulan ?></strong></td>
            </tr>

            <tr>
                <td>Kementerian</td>
                <td><strong><?php echo $tiket->id_kementrian ?></strong> - <?php echo $tiket->nama_kementrian ?></td>
            </tr>

            <tr>
                <td>Eselon</td>
                <td><strong><?php echo $tiket->id_unit ?></strong> - <?php echo $tiket->nama_unit ?></td>
            </tr>

            <tr>
                <td>Keputusan</td>
                <td><strong>
                    <?php
                    if ($tiket->keputusan == '') {
                        echo 'Diproses';
                    } else {
                        echo ucfirst($tiket->keputusan);
                    }
                    ?>
                </strong></td>
            </tr>

            <tr>
                <td>Tanggal Selesai</td>
                <td><strong><?php echo ((!empty($tiket->tanggal_selesai))? strftime('%d %B %Y', strtotime($tiket->tanggal_selesai)):'');  ?></strong></td>
            </tr>

            <tr>
                <td>Status </td>
                <td><strong><?php echo ucfirst($tiket->status) ?></strong></td>
            </tr>
        </table>
    </fieldset>

    <?php elseif (isset($tiket) && $this->input->post()): ?>

    Tiket tidak ditemukan

    <?php endif ?>


</div>