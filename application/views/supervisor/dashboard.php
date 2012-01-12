<div class="content">
    <h1>Penyelia</h1>

    <fieldset>
        <legend>Report Help Desk</legend>
        <div class="message_box">
            <a href="<?php echo site_url('/supervisors/list_pertanyaan') ?>"><?php echo $helpdesk_total ?> Pertanyaan</a>
        </div>
        <dl>
            <dd><span class="label">Langsung terselesaikan oleh CS</span> <span class="number"><?php echo $total_selesai_oleh_cs ?></span></dd>
            <dd><span class="label">Eskalasi</span> <span class="number"><?php echo $helpdesk_total ?></span></dd>
        </dl>
    </fieldset>
</div>