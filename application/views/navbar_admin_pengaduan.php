<?php
$nav_dashboard = $nav_antrian = $nav_knowledge = $nav_forum = $nav_ambil_dokumen = $nav_status_tiket = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_pengaduan = 'current';
        break;
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_pengaduan ?>"><?php echo anchor('admin_pengaduan/dashboard', 'List Pengaduan');?></li>
    </ul>
    <div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em>23 Nov 2011</em></div>
</div>
