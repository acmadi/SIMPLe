<?php
$nav_dashboard = $nav_aksescontrol = $nav_manunit = $nav_manuser =
$nav_helpdesk = $nav_history = $nav_system = $nav_knowledge =
$nav_frontdesk = $nav_forum = $nav_kementrian = $nav_satker = $nav_eselon = $nav_calendar = $nav_sms = $nav_petugas =
$nav_referensi = $nav_telepon = $nav_email = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = "current";
        break;
    case 'akses_kontrol':
        $nav_aksescontrol = "current";
        break;
    case 'man_user':
        $nav_manuser = "current";
        break;
    case 'man_unit':
        $nav_manunit = "current";
        break;
    case 'knowledge':
        $nav_knowledge = "current";
        break;
    case 'man_forum':
        $nav_forum = "current";
        break;
    case 'helpdesk':
        $nav_helpdesk = "current";
        break;
    case 'frontdesk':
        $nav_frontdesk = "current";
        break;
    case 'histori':
        $nav_history = "current";
        break;
    case 'system':
        $nav_system = "current";
        break;
	case 'kementrian':
        $nav_kementrian = "current";
        break;
    case 'satker':
        $nav_satker = "current";
        break;
	case 'eselon':
        $nav_eselon = "current";
        break;
    case 'calendar':
        $nav_calendar = "current";
        break;
    case 'sms':
        $nav_sms = "current";
        break;
    case 'referensi':
        $nav_referensi = "current";
        break;
}
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'current';
}
if ($this->uri->segment(1) == 'knowledge') {
    $nav_knowledge = 'current';
}
if ($this->uri->segment(1) == 'telepon') {
    $nav_telepon = 'current';
}
if ($this->uri->segment(1) == 'report_petugas') {
    $nav_petugas = 'current';
}
if ($this->uri->segment(1) == 'email') {
    $nav_email = 'current';
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li><?php echo anchor('admin/man_user', 'Manajemen User', "class='$nav_manuser'");?></li>
        <li><?php echo anchor('admin/referensi', 'Referensi Peraturan', "class='$nav_referensi'");?></li>
        <li><?php echo anchor('admin/man_forum', 'Forum', "class='$nav_forum'");?></li>
        <li><?php echo anchor('admin/telepon', 'Telepon', "class='$nav_telepon'");?></li>
    </ul>
    <div id="logout"><?php echo $this->session->userdata('nama') ?> &nbsp; | &nbsp; <?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php //echo date('d-m-Y') ?></em></div>
</div>
