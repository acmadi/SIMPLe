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
    <h1>Penyelia</h1>

    <fieldset>
        <legend>Report Help Desk</legend>
        <div class="message_box">
            <a href="<?php echo site_url('/supervisor/list_pertanyaan') ?>"><?php echo $helpdesk_total ?> Pertanyaan</a>
        </div>
        <dl>
            <dd><span class="label">Langsung terselesaikan oleh CS</span> <span class="number"><?php echo $total_selesai_oleh_cs ?></span></dd>
            <dd><span class="label">Eskalasi</span> <span class="number"><?php echo $helpdesk_total ?></span></dd>
        </dl>
    </fieldset>
</div>