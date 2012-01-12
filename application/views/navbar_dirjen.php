<?php
$nav_dashboard = $nav_helpdesk = $nav_frontdesk = $nav_knowledge_base = $nav_forum = '';

switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'helpdesk':
        $nav_helpdesk = 'current';
        break;
    case 'frontdesk':
        $nav_frontdesk = 'current';
        break;
    case 'knowledge_base':
        $nav_knowledge_base = 'current';
        break;
    case 'man_forum':
        $nav_forum = 'current';
        break;
}
$nav_referensi = '';
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'current';
}
?>


<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('dirjen/dashboard', 'Dashboard');?></li>
        <li class="<?php echo $nav_helpdesk ?>"><?php echo anchor('pelaksana/helpdesk', 'Helpdesk');?></li>
        <li class="<?php echo $nav_frontdesk ?>"><?php echo anchor('pelaksana/frontdesk', 'Front Desk');?></li>
        <li class="<?php echo $nav_knowledge_base ?>"><?php echo anchor('frontdesk/knowledge_base/lists', 'Knowledge Base');?></li>
        <li class="<?php echo $nav_referensi ?>"><?php echo anchor('referensi', 'Referensi Peraturan') ?></li>
        <li class="<?php echo $nav_forum ?>"><?php echo anchor('frontdesk/man_forum', 'Forum');?></li>
    </ul>
    <div id="logout"><?php echo $this->session->userdata('nama') ?> &nbsp; | &nbsp; <?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>
</div>
