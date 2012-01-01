<?php
$nav_dashboard = $nav_list_pertanyaan = $nav_knowledge = $nav_forum = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'list_pertanyaan':
        $nav_list_pertanyaan = 'current';
        break;
    case 'knowledge_base':
        $nav_knowledge = 'current';
        break;
    case 'man_forum':
        $nav_forum = 'current';
        break;
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('supervisor/dashboard', 'Dashboard');?></li>
        <li class="<?php echo $nav_list_pertanyaan ?>"><?php echo anchor('supervisor/list_pertanyaan', 'List Pertanyaan');?></li>
        <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('supervisor/knowledge_base', 'Knowledge Base');?></li>
        <li class=""><a href="<?php echo base_url() . 'upload/PMK-93.pdf' ?>" target="pdf">Referensi Peraturan</a></li>
        <li class="<?php echo $nav_forum ?>"><?php echo anchor('supervisor/man_forum', 'Forum');?></li>
    </ul>
    <div id="logout"><?php echo $this->session->userdata('nama') ?> &nbsp; | &nbsp; <?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>
</div>
