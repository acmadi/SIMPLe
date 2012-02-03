<?php
// Navbar Tanpa Hak Akses
require_once(APPPATH . 'views/navbar_init.php');
?>

<ul>
    <li><?php echo anchor('knowledge', 'Knowledge Base', "class='$nav_knowledge'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'")?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telepon', 'Telepon', "class='$nav_telepon'");?></li>
</ul>