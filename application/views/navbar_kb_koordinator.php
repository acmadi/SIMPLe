<?php
$nav_dashboard = $nav_helpdesk = $nav_frontdesk = $nav_knowledge = $nav_forum = '';


switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'knowledge_base':
        $nav_knowledge = 'current';
        break;
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('kb_koordinator/dashboard', 'Dashboard');?></li>
        <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('kb_koordinator/knowledge_base', 'Knowledge Base');?></li>
    </ul>
    <div id="logout"><?php echo $this->session->userdata('nama') ?> &nbsp; | &nbsp; <?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>
</div>
