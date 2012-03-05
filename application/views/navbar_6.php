<?php
// Navbar Frontdesk
require_once(APPPATH . 'views/navbar_init.php');
?>

<ul>
    <li><?php echo anchor('helpdesks/identity', 'Helpdesk', "class='$nav_identitas_satker'");?></li>
    <li><?php echo anchor('frontdesk/status_tiket', 'Status Tiket', "class='$nav_status_tiket'");?></li>
    <li><?php echo anchor('knowledge', 'Knowledge Base', "class='$nav_knowledge'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'") ?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telepon', 'Telepon', "class='$nav_telepon'");?></li>
</ul>