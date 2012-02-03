<?php
// Navbar Direktur
require_once(APPPATH . 'views/navbar_init.php');
?>

<ul>
    <li><?php echo anchor('dashboards', 'Dashboard', "class='$nav_dashboard'");?></li>
    <li><?php echo anchor('frontdesks', 'Front Desk', "class='$nav_frontdesk'");?></li>
    <li><?php echo anchor('helpdesks/all', 'Helpdesk', "class='$nav_helpdesk'");?></li>
    <li><?php echo anchor('knowledge', 'Knowledge Base', "class='$nav_knowledge'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'") ?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telepon', 'Telepon', "class='$nav_telepon'");?></li>
</ul>
