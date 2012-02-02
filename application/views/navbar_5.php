<?php
// Navbar CS Pengaduan

$nav_dashboard = $nav_knowledge = $nav_forum = $nav_referensi = $nav_telpon = '';

if ($this->uri->segment(2) == 'dashboard') {
    $nav_dashboard = 'current';
}
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'current';
}
if ($this->uri->segment(1) == 'knowledge') {
    $nav_knowledge = 'current';
}
if ($this->uri->segment(1) == 'forum') {
    $nav_forum = 'current';
}
if ($this->uri->segment(2) == 'list_pertanyaan') {
    $nav_list_pertanyaan = 'current';
}
if ($this->uri->segment(1) == 'telpon') {
    $nav_telpon = 'current';
}
?>

<ul class="sf-menu">
    <li><?php echo anchor('pengaduan/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
    <li><?php echo anchor('knowledge', 'Knowledge Base', "class='$nav_knowledge'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'")?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telpon', 'Telpon', "class='$nav_telpon'");?></li>
</ul>