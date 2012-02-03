<?php
// Navbar CS Pengaduan
require_once(APPPATH . 'views/navbar_init.php');
?>

<ul class="sf-menu">
    <li><?php echo anchor('pengaduan/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
    <li><?php echo anchor('knowledge', 'Knowledge Base', "class='$nav_knowledge'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'")?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telepon', 'Telepon', "class='$nav_telepon'");?></li>
</ul>