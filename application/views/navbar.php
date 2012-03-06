<?php
$nav_dashboard = $nav_aksescontrol = $nav_manunit = $nav_manuser =
$nav_helpdesk = $nav_history = $nav_system = $nav_knowledge =
$nav_frontdesk = $nav_forum = $nav_kementrian = $nav_satker = $nav_eselon = $nav_calendar = $nav_sms = $nav_petugas =
$nav_referensi = $nav_kelengkapan_doc = $nav_telepon = $nav_email = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = "active";
        break;
    case 'akses_kontrol':
        $nav_aksescontrol = "active";
        break;
    case 'man_user':
        $nav_manuser = "active";
        break;
    case 'man_unit':
        $nav_manunit = "active";
        break;
    case 'knowledge':
        $nav_knowledge = "active";
        break;
    case 'man_forum':
        $nav_forum = "active";
        break;
    case 'helpdesk':
        $nav_helpdesk = "active";
        break;
    case 'frontdesk':
        $nav_frontdesk = "active";
        break;
    case 'histori':
        $nav_history = "active";
        break;
    case 'system':
        $nav_system = "active";
        break;
	case 'kementrian':
        $nav_kementrian = "active";
        break;
    case 'satker':
        $nav_satker = "active";
        break;
	case 'eselon':
        $nav_eselon = "active";
        break;
    case 'calendar':
        $nav_calendar = "active";
        break;
    case 'sms':
        $nav_sms = "active";
        break;
    case 'referensi':
        $nav_referensi = "active";
        break;
}
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'active';
}
if ($this->uri->segment(1) == 'knowledge') {
    $nav_knowledge = 'active';
}
if ($this->uri->segment(1) == 'telepon') {
    $nav_telepon = 'active';
}
if ($this->uri->segment(1) == 'report_petugas') {
    $nav_petugas = 'active';
}
if ($this->uri->segment(1) == 'email') {
    $nav_email = 'active';
}
?>

<li class="nav-header"><i class="icon-home"></i>Menu Utama</li>
<li class="<?php echo $nav_dashboard ?>"><a href="<?php echo site_url('/admin/dashboard') ?>">Dashboard</a></li>

<li class="nav-header"><i class="icon-pencil"></i>Aplikasi</li>
<li class="<?php echo $nav_frontdesk ?>"><?php echo anchor('admin/frontdesk', 'Front Desk');?></li>
<li class="<?php echo $nav_helpdesk ?>"><?php echo anchor('admin/helpdesk', 'Help Desk');?></li>
<li class="<?php echo $nav_knowledge ?>"><?php echo anchor('admin/knowledge', 'Knowledge Base');?></li>
<li class="<?php echo $nav_referensi ?>"><?php echo anchor('admin/referensi', 'Referensi Peraturan');?></li>
<li class='<?php echo $nav_forum ?>'><?php echo anchor('admin/man_forum', 'Forum');?></li>
<li class="<?php echo $nav_telepon ?>"><?php echo anchor('admin/telepon', 'Telepon');?></li>
<li class="<?php echo $nav_kelengkapan_doc ?>"><?php echo anchor('admin/man_kelengkapan_doc', 'Kelengkapan Dokumen');?></li>

<li class="nav-header"><i class="icon-user"></i>Manajemen</li>
<li class="<?php echo $nav_manuser ?>"><?php echo anchor('admin/man_user', 'User');?></li>
<li class="<?php echo $nav_manunit ?>"><?php echo anchor('admin/man_unit', 'Unit');?></li>
<li class="<?php echo $nav_kementrian ?>"><?php echo anchor('admin/kementrian', 'Kementrian');?></li>
<li class="<?php echo $nav_eselon ?>"><?php echo anchor('admin/eselon', 'Eselon');?></li>
<li class="<?php echo $nav_satker ?>"><?php echo anchor('admin/satker', 'Satker');?></li>

<li class="nav-header"><i class="icon-cog"></i>Sistem</li>
<li class="<?php echo $nav_aksescontrol ?>"><?php echo anchor('admin/akses_kontrol', 'Akses Kontrol');?></li>
<li class="<?php echo $nav_system ?>"><?php echo anchor('admin/system', 'Backup');?></li>
<li class="<?php echo $nav_calendar ?>"><?php echo anchor('admin/calendar', 'Calendar');?></li>
<li class="<?php echo $nav_email ?>"><?php echo anchor('admin/email', 'Email');?></li>
<li class="<?php echo $nav_history ?>"><?php echo anchor('admin/histori', 'Histori');?></li>
<li class="<?php echo $nav_petugas ?>"><?php echo anchor('admin/report_petugas', 'Report');?></li>
<li class="<?php echo $nav_sms ?>"><?php echo anchor('admin/sms', 'SMS');?></li>
