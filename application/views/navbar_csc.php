<?php
$nav_dashboard = $nav_antrian = $nav_knowledge = $nav_forum = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'list_antrian':
        $nav_antrian = 'current';
        break;
    case 'knowledge_base':
        $nav_knowledge = 'current';
        break;
    case 'man_forum':
        $nav_forum = 'current';
        break;
}
?>

<div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>
<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
<!--        <li class="--><?php //echo $nav_dashboard ?><!--">--><?php //echo anchor('csc/dashboard', 'Dashboard');?><!--</li>-->
        <li class="<?php echo $nav_antrian ?>"><?php echo anchor('csc/list_antrian', 'List Antrian');?></li>
        <li class="<?php echo $nav_forum ?>"><?php echo anchor('csc/man_forum', 'Forum');?></li>
    </ul>
</div>
