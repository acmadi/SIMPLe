<?php
$nav_dashboard = $nav_antrian = $nav_knowledge = $nav_forum = $nav_ambil_dokumen = $nav_status_tiket = '';
switch ($this->uri->segment(2)) {
    case 'form_revisi_anggaran':
        $nav_dashboard = 'current';
        break;
    case 'list_antrian':
        $nav_antrian = 'current';
        break;
    case 'ambil_dokumen':
        $nav_ambil_dokumen = 'current';
        break;
    case 'status_tiket':
        $nav_status_tiket = 'current';
        break;
    case 'man_forum':
        $nav_forum = 'current';
        break;
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('frontdesk/form_revisi_anggaran', 'Form Revisi Anggaran');?></li>
        <li class="<?php echo $nav_ambil_dokumen ?>"><?php echo anchor('frontdesk/ambil_dokumen', 'Pengambilan Dokumen');?></li>
        <li class="<?php echo $nav_status_tiket ?>"><?php echo anchor('frontdesk/status_tiket', 'Status Tiket');?></li>
        <li class="<?php echo $nav_forum ?>"><?php echo anchor('frontdesk/man_forum', 'Forum');?></li>
    </ul>
    <div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>
</div>
