<?php
// Navbar KnowledgeBase Coordinator
require_once(APPPATH . 'views/navbar_init.php');
?>

<ul>
    <li><?php echo anchor('kb_koordinator/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
    <li><?php echo anchor('kb_koordinator/jawaban_cs', 'Jawaban CS', "class='$nav_jawaban_cs'");?></li>
    <li><?php echo anchor('kb_koordinator/knowledge_base', 'Manajemen Knowledge Base', "class='$nav_knowledge'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'") ?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telepon', 'Telepon', "class='$nav_telepon'");?></li>
</ul>
