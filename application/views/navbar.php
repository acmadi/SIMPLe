<?php
$nav_dashboard = $nav_aksescontrol = $nav_manunit = $nav_manuser =
    $nav_helpdesk = $nav_history = $nav_system = $nav_knowledge = $nav_frontdesk = $nav_forum = '';
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
        $nav_manunit= "current";
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
    case 'frontDesk':
        $nav_frontdesk = "current";
        break;
    case 'histori':
        $nav_history = "current";
        break;
    case 'system':
        $nav_system = "current";
        break;
}

?>

<div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>
<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('admin/dashboard', 'Dashboard');?></li>
        <li class="<?php echo $nav_aksescontrol ?>"><?php echo anchor('admin/akses_kontrol', 'Akses Kontrol');?></li>
        <li class="<?php echo $nav_manuser ?>"><?php echo anchor('admin/man_user', 'Manajemen User');?></li>
        <li class="<?php echo $nav_manunit ?>"><?php echo anchor('admin/man_unit', 'Manajemen Unit');?></li>
        <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('admin/knowledge', 'Knowledge');?></li>
        <li class="<?php echo $nav_forum ?>"><?php echo anchor('admin/man_forum', 'Forum');?></li>
        <li class="<?php echo $nav_helpdesk ?>"><?php echo anchor('admin/helpdesk', 'Help Desk');?></li>
        <li class="<?php echo $nav_frontdesk ?>"><?php echo anchor('admin/frontDesk', 'FrontDesk Sistem');?></li>
        <li class="<?php echo $nav_history ?>"><?php echo anchor('admin/histori', 'Histori');?></li>
        <li class="<?php echo $nav_system ?>"><?php echo anchor('admin/system', 'Sistem');?></li>
    </ul>
</div>
