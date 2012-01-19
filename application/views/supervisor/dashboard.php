<div class="content">
    <h1>Penyelia</h1>

    <fieldset>
        <legend>Report Help Desk</legend>
        <div class="message_box">
            <a href="<?php echo site_url('/supervisors/list_pertanyaan') ?>"><?php echo $helpdesk_total ?> Pertanyaan</a>
        </div>
        <dl>
            <dd>
            <a href="<?php echo site_url('/supervisors/report/helpdesk') ?>">
            <span class="xxlabel">Langsung terselesaikan oleh CS Helpdesk</span> <span class="xxlabel red"><?php echo $total_selesai_oleh_cs ?></span>
            </a>
            </dd>

            <dd>
            <a href="<?php echo site_url('/supervisors/list_pertanyaan') ?>">
            <span class="xxlabel">Eskalasi</span> <span class="xxlabel red"><?php echo $helpdesk_total ?></span>
            </a>
            </dd>
        </dl>
    </fieldset>
</div>