<style>
    .message_box {
        text-align: center;
    }
</style>

<div class="content">
    <h1>Dashboard <?php echo $this->session->userdata('nama_lavel')?></h1>

    <fieldset class="grid_12">
        <legend>Report Front Desk</legend>
        <div class="message_box">
            <?php
            if (isset($merah)) {
                $merah = 'red';
            } else {
                $merah = 'green';
            }
            ?>
            <a class="button <?php echo $merah ?>" href="<?php echo site_url('/frontdesks') ?>"><?php echo $frontdesk_total ?> Tiket</a>
        </div>
        <table class="table">
            <tr>
                <td>&nbsp;</td>
                <td class="head">Diterima</td>
                <td class="head">Diteruskan</td>
                <td class="head">Open</td>
				<?php if($level_aktif > 5){?>
                <td class="head">Ditetapkan</td>
                <td class="head">Ditolak</td>
				<?php } ?>
            </tr>
            <tr>
                <td class="head">CS</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_cs ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_cs?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_open_cs ?></span></td>
				<?php if($level_aktif > 5){?>
                <td><span class="message_box glow_green">0</span></td>
                <td><span class="message_box glow_green">0</span></td>
				<?php } ?>
            </tr>
            <tr>
                <td class="head">Kasi & Pelaksana</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_pelaksana ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_pelaksana ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_open_pelaksana ?></span></td>
                <?php if($level_aktif > 5){?>
                <td><span class="message_box glow_green">0</span></td>
                <td><span class="message_box glow_green">0</span></td>
				<?php } ?>
            </tr>
			<?php if( $level_aktif > 3): ?>
			<tr>
                <td class="head">Kasubdit Anggaran</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_kasubdit ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_kasubdit ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_open_kasubdit ?></span></td>
                <?php if($level_aktif > 5){?>
                <td><span class="message_box glow_green">0</span></td>
                <td><span class="message_box glow_green">0</span></td>
				<?php } ?>
            </tr>
			<?php endif; //kasubdit?>
			
			<?php if( $level_aktif > 4): ?>
			<tr>
                <td class="head">Kasubdit Dadutek</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_dadutek ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_dadutek ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_open_dadutek ?></span></td>
                <?php if($level_aktif > 5){?>
                <td><span class="message_box glow_green">0</span></td>
                <td><span class="message_box glow_green">0</span></td>
				<?php } ?>
            </tr>
			<?php endif; //dutek?>
			
			<?php if( $level_aktif > 5): ?>
			<tr>
                <td class="head">Direktur</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_direktur ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_direktur ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_open_direktur ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_dtetap_direktur ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_dtolak_direktur ?></span></td>
            </tr>
			<?php endif; //direktur?>
        </table>

        <div>
            <span style="background: red; padding: 0 8px;"></span>&nbsp;
            Warna merah menunjukkan proses penyelesaian telah melebihi 5 hari kerja
        </div>
    </fieldset>

    <!--
    <fieldset class="grid_5">
        <legend>Report Help Desk</legend>
        <div class="message_box">
            <a class="button green" href="<?php echo site_url('/helpdesks/all') ?>"><?php echo $helpdesk_total ?> Pertanyaan</a>
        </div>
        <table class="table">
            <caption>Jumlah pertanyaan yang langsung diselesaikan oleh:</caption>
            <tr>
                <td class="head"><span class="label">CS</span></td>
                <td><span class="message_box glow_green number"><?php echo $helpdesk_total_cs ?></span></td>
            </tr>
            <tr>
                <td class="head"><span class="label">Supervisor</span></td>
                <td><span class="message_box glow_green number"><?php echo $helpdesk_total_supervisor ?></span></td>
            </tr>
            <tr>
                <td class="head"><span class="label">Kasi & Pelaksana</span></td>
                <td><span class="message_box glow_green number"><?php echo $helpdesk_total_pelaksana ?></span></td>
            </tr>
        </table>
    </fieldset>
    -->

</div>