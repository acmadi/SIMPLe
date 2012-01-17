<?php
$nav_dashboard = $nav_aksescontrol = $nav_manunit = $nav_manuser =
$nav_helpdesk = $nav_history = $nav_system = $nav_knowledge =
$nav_frontdesk = $nav_forum = $nav_kementrian = $nav_satker = $nav_eselon = $nav_calendar = $nav_sms = 
$nav_referensi = '';
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

?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li><?php echo anchor('admin/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
        <li><?php echo anchor('admin/akses_kontrol', 'Akses Kontrol', "class='$nav_aksescontrol'");?></li>
        <li><?php echo anchor('admin/man_user', 'Manajemen User', "class='$nav_manuser'");?></li>
        <li><?php echo anchor('admin/man_unit', 'Manajemen Unit', "class='$nav_manunit'");?></li>
        <li><?php echo anchor('admin/knowledge', 'Knowledge', "class='$nav_knowledge'");?></li>
        <li><?php echo anchor('admin/referensi', 'Referensi', "class='$nav_referensi'");?></li>
        <li><?php echo anchor('admin/man_forum', 'Forum', "class='$nav_forum'");?></li>
        <li><?php echo anchor('admin/helpdesk', 'Help Desk', "class='$nav_helpdesk'");?></li>
        <li><?php echo anchor('admin/frontdesk', 'FrontDesk Sistem', "class='$nav_frontdesk'");?></li>
        <li><?php echo anchor('admin/histori', 'Histori', "class='$nav_history'");?></li>
        <li><?php echo anchor('admin/system', 'Sistem', "class='$nav_system'");?></li>
		<li><?php echo anchor('admin/kementrian', 'Kementrian', "class='$nav_kementrian'");?></li>
        <li><?php echo anchor('admin/satker', 'Satker', "class='$nav_satker'");?></li>
		<li><?php echo anchor('admin/eselon', 'Eselon', "class='$nav_eselon'");?></li>
        <li><?php echo anchor('admin/calendar', 'Calendar', "class='$nav_calendar'");?></li>
        <li><?php echo anchor('admin/sms', 'SMS', "class='$nav_sms'");?></li>
    </ul>
    <div id="logout"><?php echo $this->session->userdata('nama') ?> &nbsp; | &nbsp; <?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php //echo date('d-m-Y') ?></em></div>
</div>
