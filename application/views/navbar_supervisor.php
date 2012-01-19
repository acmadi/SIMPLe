<?php
$nav_dashboard = $nav_list_pertanyaan = $nav_knowledge = $nav_forum = $nav_report = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'list_pertanyaan':
        $nav_list_pertanyaan = 'current';
        break;
    case 'knowledge':
        $nav_knowledge = 'current';
        break;
    case 'report':
        $nav_report = 'current';
        break;
}
$nav_referensi = '';
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'current';
}
if ($this->uri->segment(1) == 'knowledge') {
    $nav_knowledge = 'current';
}
if ($this->uri->segment(1) == 'forum') {
    $nav_forum = 'current';
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li><?php echo anchor('supervisors/dashboard', 'Dashboard', array('class' => $nav_dashboard)) ?></li>
        <li><?php echo anchor('supervisors/report/helpdesk', 'Report Helpdesk', array('class' => $nav_report)) ?></li>
        <li><?php echo anchor('supervisors/list_pertanyaan', 'List Pertanyaan', array('class' => $nav_list_pertanyaan)) ?></li>
        <li><?php echo anchor('knowledge', 'Knowledge Base', array('class' => $nav_knowledge)) ?></li>
        <li><?php echo anchor('referensi', 'Referensi Peraturan', array('class' => $nav_referensi)) ?></li>
        <li><?php echo anchor('forum', 'Forum', array('class' => $nav_forum)) ?></li>
    </ul>
</div>
