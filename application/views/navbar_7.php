<?php
// Navbar Supervisor/Penyelia
require_once(APPPATH . 'views/navbar_init.php');
?>

<ul>
    <li><?php echo anchor('supervisors/dashboard', 'Dashboard', array('class' => $nav_dashboard)) ?></li>
    <li><?php echo anchor('supervisors/report/helpdesk', 'Report Helpdesk', array('class' => $nav_report)) ?></li>
    <li><?php echo anchor('helpdesks/all', 'List Pertanyaan', array('class' => $nav_list_pertanyaan)) ?></li>
    <li><?php echo anchor('knowledge', 'Knowledge Base', array('class' => $nav_knowledge)) ?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', array('class' => $nav_referensi)) ?></li>
    <li><?php echo anchor('forum', 'Forum', array('class' => $nav_forum)) ?></li>
    <li><?php echo anchor('telpon', 'Telpon', "class='$nav_telpon'");?></li>
</ul>