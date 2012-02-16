<div class="content">
    <h1>Cek Tiket</h1>

    <?php generate_notifkasi() ?>

    <fieldset>
        <legend>Pengecekan Tiket</legend>
        <form method="post" action="<?php echo site_url('/tiket/cek_tiket') ?>">
            <p>
                Nomer Tiket <input type="text" name="no_tiket" value="<?php echo $no_tiket;?>" autocomplete="off" />
                <input type="submit" value="Cek Tiket" class="button green"/>
                <a href="<?php echo site_url('tiket') ?>" class="button">Reset</a>
            </p>
        </form>
    </fieldset>

    <?php if (isset($tiket)): ?>
    <fieldset>
        <legend>Status Tiket</legend>
        <p>
            <span>Nomer Tiket</span>
            <span>:</span>
            <span><strong>#<?php echo sprintf('%05d', $tiket->no_tiket_frontdesk) ?></strong></span>
        </p>

        <p>
            <span>Kementerian</span>
			<span>:</span>
            <span><strong><?php echo $tiket->id_kementrian ?></strong> - <?php echo $tiket->nama_kementrian ?></span>
        </p>

        <p>
            <span>Eselon</span>
            <span>:</span>
            <span><strong><?php echo $tiket->id_unit ?></strong> - <?php echo $tiket->nama_unit ?></span>
        </p>

        <p>
            <span>Keputusan</span>
			<span>:</span>
            <span><strong>
                <?php
                if ($tiket->keputusan == '') {
                    echo 'Diproses';
                } else {
                    echo $tiket->keputusan;
                }
                ?>
            </strong></span>
        </p>

        <p>
            <span>Tanggal Selesai</span>
			<span>:</span>
            <span><strong><?php echo ((!empty($tiket->tanggal_selesai))?date('d M Y', strtotime($tiket->tanggal_selesai)):'');  ?></strong></span>
        </p>

        <p>
            <span>Status </span>
			<span>:</span>
            <span><strong><?php echo $tiket->status ?></strong></span>
        </p>
    </fieldset>

    <?php elseif (isset($tiket) && $this->input->post()): ?>

    Tiket tidak ditemukan

    <?php endif ?>


</div>