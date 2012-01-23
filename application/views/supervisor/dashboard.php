<div class="content">
    <h1>Penyelia</h1>

    <fieldset>
        <legend>Report Help Desk</legend>
        <dl>
            <dd>
            <a href="<?php echo site_url('/helpdesks/all') ?>">
            <span class="xxlabel red"><?php echo $helpdesk_total ?></span> 
            <span class="xxlabel">Tiket yang di-eskalasi ke Supervisor</span>
            </a>
            </dd>

            <dd>
            <a href="<?php echo site_url('/supervisors/report/helpdesk') ?>">
            <span class="xxlabel red"><?php echo $total_selesai_oleh_cs ?></span>
            <span class="xxlabel">Tiket yang dijawab sendiri oleh CS Helpdesk</span>
            </a>
            </dd>
        </dl>
    </fieldset>
</div>