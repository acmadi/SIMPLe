<div class="content">
    <h1>Cek Tiket</h1>

    <?php
    // TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }
    if ($this->session->flashdata('notice')) {
        echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
    }
    if ($this->session->flashdata('info')) {
        echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
    }
    ?>

    <fieldset>
        <legend>Pengecekan Tiket</legend>
        <form method="post" action="<?php echo site_url('/tiket/cek_tiket') ?>">
            <p>Nomer Tiket <input type="text" name="no_tiket" value="<?php echo $no_tiket;?>"/></p>

            <p>Kode Eselon <input type="text" name="id_unit" value="<?php echo $id_unit;?>"/></p>
            <input type="submit" value="Cek" class="button blue-pill"/>
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
            <span>Kode Kementerian - Kode Eselon </span>
			<span>:</span>
            <span><strong><?php echo $tiket->id_kementrian.' - '.$tiket->id_unit ?></strong></span>
        </p>

        <p>
            <span>Keputusan</span>
			<span>:</span>
            <span><strong><?php echo $tiket->keputusan ?></strong></span>
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