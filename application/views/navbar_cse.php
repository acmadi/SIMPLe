<?php
$nav_dashboard = $nav_antrian = $nav_knowledge = $nav_forum = $nav_ambil_dokumen = $nav_status_tiket = $nav_pengaduan = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_pengaduan = 'current';
        break;
}
if ($this->uri->segment(1) == 'forum') {
    $nav_forum = 'current';
}
?>



<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
<!--        <li class="current ">--><?php //echo anchor('pengaduan/dashboard', 'Dashboard');?><!--</li>-->
        <li><?php echo anchor('pengaduan/dashboard', 'Pengaduan', "class='$nav_pengaduan'");?></li>
        <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    </ul>
</div>
