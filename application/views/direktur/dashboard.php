<style>
    .message_box {
        text-align: center;
    }
</style>

<div class="content">
    <h1>Kasubdit Anggaran Dashboard</h1>

    <fieldset class="grid_6">
        <legend>Report Front Desk</legend>
        <div class="message_box">
            <a class="button green" href="<?php echo site_url('/direktur/frontdesk') ?>"><?php echo $frontdesk_total ?> Tiket</a>
        </div>
        <table class="table">
            <tr>
                <td>&nbsp;</td>
                <td class="head">Diterima</td>
                <td class="head">Diteruskan</td>
                <!--td class="head">Open</td-->
                <td class="head">Ditetapkan</td>
                <td class="head">Ditolak</td>
            </tr>
            <tr>
                <td class="head">CS</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_cs ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_cs?></span></td>
                <!--td><span class="message_box glow_green"><?php echo $total_tiket_open_cs ?></span></td-->
                <td><span class="message_box glow_green">0</span></td>
                <td><span class="message_box glow_green">0</span></td>
            </tr>
            <tr>
                <td class="head">Kasi & Pelaksana</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_pelaksana ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_pelaksana ?></span></td>
                <!--td><span class="message_box glow_green"><?php echo $total_tiket_open_pelaksana ?></span></td-->
                <td><span class="message_box glow_green">0</span></td>
                <td><span class="message_box glow_green">0</span></td>
            </tr>
			<tr>
                <td class="head">Kasubdit Anggaran</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_kasubdit ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_kasubdit ?></span></td>
                <!--td><span class="message_box glow_green"><?php echo $total_tiket_open_kasubdit ?></span></td-->
                <td><span class="message_box glow_green">0</span></td>
                <td><span class="message_box glow_green">0</span></td>
            </tr>
			<tr>
                <td class="head">Kasubdit Dadutek</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_dadutek ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_dadutek ?></span></td>
                <!--td><span class="message_box glow_green"><?php echo $total_tiket_open_dadutek ?></span></td-->
                <td><span class="message_box glow_green">0</span></td>
                <td><span class="message_box glow_green">0</span></td>
            </tr>
			<tr>
                <td class="head">Direktur</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_direktur ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_direktur ?></span></td>
                <!--td><span class="message_box glow_green"><?php echo $total_tiket_open_direktur ?></span></td-->
                <td><span class="message_box glow_green"><?php echo $total_tiket_dtetap_direktur ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_dtolak_direktur ?></span></td>
            </tr>
        </table>
    </fieldset>

    <fieldset class="grid_5">
        <legend>Report Help Desk</legend>
        <div class="message_box">
            <a class="button green" href="<?php echo site_url('/kasubdit/helpdesk') ?>"><?php echo $helpdesk_total ?> Pertanyaan</a>
        </div>
        <table class="table">
            <caption>Jumlah pertanyaan yang langsung diselesaikan oleh: </caption>
            <tr>
                <td class="head"><span class="label">CS</span></td>
                <td><span class="message_box glow_green number">12</span></td>
            </tr>
            <tr>
                <td class="head"><span class="label">Supervisor</span></td>
                <td><span class="message_box glow_green number">6</span></td>
            </tr>
            <tr>
                <td class="head"><span class="label">Kasi & Pelaksana</span></td>
                <td><span class="message_box glow_green number">0</span></td>
            </tr>
        </table>
    </fieldset>

</div>