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


<ul class="sf-menu">
    <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('csa/dashboard', 'Dashboard');?></li>
    <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('csa/knowledge_base', 'Knowledge Base');?></li>
    <li class=""><a href="<?php echo base_url() . 'upload/PMK-93.pdf' ?>" target="pdf">Referensi Peraturan</a></li>
    <li class="<?php echo $nav_forum ?>"><?php echo anchor('csa/man_forum', 'Forum');?></li>
</ul>
<div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>

