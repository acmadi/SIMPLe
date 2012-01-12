<style>
    .message_box {
        text-align: center;
    }
</style>

<div class="content">
    <h1>Kasi & Pelaksana Dashboard</h1>

    <fieldset class="grid_5">
        <legend>Report Front Desk</legend>
        <div class="message_box">
            <a class="button green" href="<?php echo site_url('/pelaksana/frontdesk') ?>"><?php echo $frontdesk_total ?> Tiket</a>
        </div>
        <table class="table">
            <tr>
                <td>&nbsp;</td>
                <td>Diterima</td>
                <td>Diteruskan</td>
                <td>Open</td>
            </tr>
            <tr>
                <td>CS</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_cs ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_cs?></span></td>
                <td><span class="message_box glow_green"><?php echo 19 ?></span></td>
            </tr>
            <tr>
                <td>Kasi & Pelaksana</td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diterima_pelaksana ?></span></td>
                <td><span class="message_box glow_green"><?php echo $total_tiket_diteruskan_pelaksana ?></span></td>
                <td><span class="message_box glow_green"><?php echo 9 ?></span></td>
            </tr>
        </table>
    </fieldset>

    <fieldset class="grid_5">
        <legend>Report Help Desk</legend>
        <div class="message_box">
            <a class="button green" href="<?php echo site_url('/pelaksana/helpdesk') ?>"><?php echo $helpdesk_total ?> Pertanyaan</a>
        </div>
        <table class="table">
            <caption>Jumlah pertanyaan yang langsung diselesaikan oleh</caption>
            <tr>
                <td><span class="label">CS</span></td>
                <td><span class="number">12</span></td>
            </tr>
            <tr>
                <td><span class="label">Supervisor</span></td>
                <td><span class="number">6</span></td>
            </tr>
            <tr>
                <td><span class="label">Kasi & Pelaksana</span></td>
                <td><span class="number">0</span></td>
            </tr>
        </table>
    </fieldset>

</div>