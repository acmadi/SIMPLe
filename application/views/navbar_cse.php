<?php
$nav_dashboard = $nav_antrian = $nav_knowledge = $nav_forum = $nav_ambil_dokumen = $nav_status_tiket = $nav_pengaduan = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_pengaduan = 'current';
        break;
    case 'man_forum':
        $nav_forum = 'current';
        break;
}
?>



<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
<!--        <li class="current ">--><?php //echo anchor('pengaduan/dashboard', 'Dashboard');?><!--</li>-->
        <li class="<?php echo $nav_pengaduan ?>"><?php echo anchor('pengaduan/dashboard', 'Pengaduan');?></li>
        <li class="<?php echo $nav_forum ?>"><?php echo anchor('pengaduan/man_forum', 'Forum');?></li>
    </ul>
</div>
