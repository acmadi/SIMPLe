<?php
// Navbar KnowledgeBase Coordinator

$nav_dashboard = $nav_helpdesk = $nav_frontdesk = $nav_knowledge = $nav_forum = $nav_jawaban_cs = '';


switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'knowledge_base':
        $nav_knowledge = 'current';
        break;
}
if ($this->uri->segment(1) == 'knowledge') {
    $nav_knowledge = 'current';
}
if ($this->uri->segment(2) == 'jawaban_cs') {
    $nav_jawaban_cs = 'current';
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li><?php echo anchor('kb_koordinator/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
        <li><?php echo anchor('kb_koordinator/jawaban_cs', 'Jawaban CS', "class='$nav_jawaban_cs'");?></li>
        <li><?php echo anchor('kb_koordinator/knowledge_base', 'Manajemen Knowledge Base', "class='$nav_knowledge'");?></li>
    </ul>
</div>
