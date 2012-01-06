<?php
$nav_dashboard = $nav_identitas_satker = $nav_antrian = $nav_knowledge = $nav_forum = '';
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
?>


<ul class="sf-menu">
    <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('helpdesk/dashboard', 'Dashboard');?></li>
    <li class="<?php echo $nav_identitas_satker ?>"><?php echo anchor('helpdesk/identitas_satker', 'Isi Identitas Satker');?></li>
    <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('helpdesk/knowledge_base/lists', 'Knowledge Base');?></li>
    <li class=""><a href="<?php echo base_url() . 'upload/PMK-93.pdf' ?>" target="pdf">Referensi Peraturan</a></li>
    <li class="<?php echo $nav_forum ?>"><?php echo anchor('helpdesk/man_forum', 'Forum');?></li>
</ul>
<div id="logout"><?php echo $this->session->userdata('nama') ?> &nbsp; | &nbsp; <?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>

