<?php
$nav_dashboard = $nav_list_pertanyaan = $nav_knowledge =
$nav_forum = $nav_report = $nav_telpon = '';

switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
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
if ($this->uri->segment(1) == 'helpdesks') {
    $nav_list_pertanyaan = 'current';
}
if ($this->uri->segment(1) == 'telpon') {
    $nav_telpon = 'current';
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li><?php echo anchor('supervisors/dashboard', 'Dashboard', array('class' => $nav_dashboard)) ?></li>
        <li><?php echo anchor('supervisors/report/helpdesk', 'Report Helpdesk', array('class' => $nav_report)) ?></li>
        <li><?php echo anchor('helpdesks/all', 'List Pertanyaan', array('class' => $nav_list_pertanyaan)) ?></li>
        <li><?php echo anchor('knowledge', 'Knowledge Base', array('class' => $nav_knowledge)) ?></li>
        <li><?php echo anchor('referensi', 'Referensi Peraturan', array('class' => $nav_referensi)) ?></li>
        <li><?php echo anchor('forum', 'Forum', array('class' => $nav_forum)) ?></li>
        <li><?php echo anchor('telpon', 'Telpon', "class='$nav_telpon'");?></li>
    </ul>
</div>
