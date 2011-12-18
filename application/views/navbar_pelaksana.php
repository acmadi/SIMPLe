<?php
$nav_dashboard = $nav_antrian = $nav_knowledge = $nav_forum = '';
switch ($this->uri->segment(2)) {
    case 'identitas_satker':
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

<div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?></div>
<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('pelaksana/dashboard', 'Dashboard');?></li>
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('pelaksana/list_helpDesk', 'Helpdesk');?></li>
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('pelaksana/list_frontDesk', 'Front Desk');?></li>
        <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('pelaksana/knowledge_base', 'Knowledge Base');?></li>
        <li class=""><a href="<?php echo base_url() . 'upload/PMK-93.pdf' ?>" target="pdf">Referensi Peraturan</a></li>
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('pelaksana/man_forum', 'Forum');?></li>
    </ul>
</div>
