<style type="text/css">
    .message_box {
        margin: auto;
        width: 300px;
        text-align: center;
        padding: 10px;
        font-size: 24px;
        color: #1c94c4;
        border: 2px solid #1fd2ff;
        border-left: none;
        border-right: none;
        background: #ccf5ff;
        text-shadow: 1px 1px 0 white;
        box-shadow: 0 0 10px 2px #ccf5ff;
    }

    dl {
        padding: 4px;
        margin: 10px;
    }

    dt {
        padding: 10px 0;
        /*font-size: 14px;*/
        font-weight: bold;
    }

    dd {
        padding: 10px 0;
        /*font-size: 14px;*/
    }

    dd .number {
        display: inline-block;
        padding: 10px;
        background: #ccf5ff;
        min-width: 14px;
        text-align: center;
        color: #1c94c4;
        border: 2px solid #1fd2ff;
        border-radius: 25px;
        text-shadow: 1px 1px 0 white;
        box-shadow: 0 0 10px 2px #ccf5ff;
    }

    dd .label {
        display: inline-block;
        width: 200px;
    }

    .glow_green {
        background: #daffb8;
        border-color: #56b300;
        box-shadow: 0 0 10px 2px #daffb8;
        color: #56b300;
        text-shadow: 1px 1px 0 rgba(0,0,0,0.5);
    }
</style>

<div class="content">
    <h1>Kasi & Pelaksana Dashboard</h1>

    <fieldset style="width: 500px; float:left; margin-right: 50px;">
        <legend>Report Help Desk</legend>
        <div class="message_box">
            <a href="<?php echo site_url('/pelaksana/helpdesk') ?>"><?php echo $helpdesk_total ?> Pertanyaan</a>
        </div>
        <dl>
            <dt>Jumlah pertanyaan yang langsung diselesaikan oleh:</dt>
            <dd><span class="label">CS</span> <span class="number">12</span></dd>
            <dd><span class="label">Supervisor</span> <span class="number">6</span></dd>
            <dd><span class="label">Kasi & Pelaksana</span> <span class="number">0</span></dd>
        </dl>
    </fieldset>

    <fieldset style="width: 500px; float:left;">
        <legend>Report Front Desk</legend>
        <div class="message_box">
            <a href="<?php echo site_url('/pelaksana/frontdesk') ?>"><?php echo $frontdesk_total ?> Tiket</a>
        </div>
        <table border="0" style="margin-top: 2em;">
            <tr>
                <td>&nbsp;</td>
                <td>Diterima</td>
                <td>Diteruskan</td>
            </tr>
            <tr>
                <td>CS</td>
                <td><span class="message_box glow_green">30</span></td>
                <td><span class="message_box glow_green">23</span></td>
            </tr>
            <tr>
                <td>Kasi & Pelaksana</td>
                <td><span class="message_box glow_green">12</span></td>
                <td><span class="message_box glow_green">09</span></td>
            </tr>
        </table>
    </fieldset>

</div>