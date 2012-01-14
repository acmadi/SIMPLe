<?php
$nav_dashboard = $nav_helpdesk = $nav_frontdesk = $nav_knowledge = $nav_forum = '';


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
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li><?php echo anchor('kb_koordinator/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
<!--        <li class="--><?php //echo $nav_knowledge ?><!--">--><?php //echo anchor('kb_koordinator/knowledge_base/lists', 'Lihat Knowledge Base');?><!--</li>-->
        <li><?php echo anchor('kb_koordinator/knowledge_base', 'Manajemen Knowledge Base', "class='$nav_knowledge'");?></li>
    </ul>
</div>
