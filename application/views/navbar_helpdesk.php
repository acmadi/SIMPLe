<?php
$nav_dashboard = $nav_identitas_satker = $nav_antrian = $nav_knowledge = $nav_forum = $nav_referensi = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
            break;
    case 'identitas_satker':
        $nav_identitas_satker = 'current';
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
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'current';
}
?>


<ul class="sf-menu">
    <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('helpdesk/dashboard', 'Dashboard');?></li>
    <li class="<?php echo $nav_identitas_satker ?>"><?php echo anchor('helpdesk/identitas_satker', 'Isi Identitas Satker');?></li>
    <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('knowledge', 'Knowledge Base');?></li>
    <li class="<?php echo $nav_referensi ?>"><?php echo anchor('referensi', 'Referensi Peraturan') ?></li>
    <li class="<?php echo $nav_forum ?>"><?php echo anchor('helpdesk/man_forum', 'Forum');?></li>
</ul>

