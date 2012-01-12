<?php
$nav_dashboard = $nav_list_pertanyaan = $nav_knowledge = $nav_forum = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'list_pertanyaan':
        $nav_list_pertanyaan = 'current';
        break;
    case 'knowledge_base':
        $nav_knowledge = 'current';
        break;
    case 'man_forum':
        $nav_forum = 'current';
        break;
}
$nav_referensi = '';
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'current';
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li><?php echo anchor('supervisors/dashboard', 'Dashboard', array('class' => $nav_dashboard)) ?></li>
        <li><?php echo anchor('supervisors/list_pertanyaan', 'List Pertanyaan', array('class' => $nav_list_pertanyaan)) ?></li>
        <li><?php echo anchor('supervisor/knowledge_base/lists', 'Knowledge Base', array('class' => $nav_knowledge)) ?></li>
        <li><?php echo anchor('referensi', 'Referensi Peraturan', array('class' => $nav_referensi)) ?></li>
        <li><?php echo anchor('supervisor/man_forum', 'Forum', array('class' => $nav_forum)) ?></li>
    </ul>
</div>
