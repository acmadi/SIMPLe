<?php
$nav_dashboard = $nav_helpdesk = $nav_frontdesk = $nav_knowledge = $nav_forum = '';

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
        $nav_knowledge = 'current';
        break;
    case 'man_forum':
        $nav_forum = 'current';
        break;

}
$nav_referensi = '';
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'current';
}
if ($this->uri->segment(1) == 'knowledge') {
    $nav_knowledge = 'current';
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('kasubdit/dashboard', 'Dashboard');?></li>
        <li class="<?php echo $nav_helpdesk ?>"><?php echo anchor('kasubdit/helpdesk', 'Helpdesk');?></li>
        <li class="<?php echo $nav_frontdesk ?>"><?php echo anchor('kasubdit/frontdesk', 'Front Desk');?></li>
        <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('knowledge', 'Knowledge Base');?></li>
        <li class="<?php echo $nav_referensi ?>"><?php echo anchor('referensi', 'Referensi Peraturan') ?></li>
        <li class="<?php echo $nav_forum ?>"><?php echo anchor('kasubdit/man_forum', 'Forum');?></li>
    </ul>
</div>
