<?php
$nav_dashboard = $nav_revisi_anggaran = $nav_status_tiket = $nav_ambil_dokumen = $nav_knowledge = $nav_forum = '';
switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = ' current ';
        break;
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="<?php echo $nav_dashboard ?>"><?php echo anchor('cs/dashboard', 'Dasbor');?></li>
        <li class="<?php echo $nav_revisi_anggaran ?>"><?php echo anchor('frontdesk/form_revisi_anggaran', 'Form Revisi Anggaran');?></li>
        <li class="<?php echo $nav_ambil_dokumen ?>"><?php echo anchor('frontdesk/ambil_dokumen', 'Pengambilan Dokumen');?></li>
        <li class="<?php echo $nav_status_tiket ?>"><?php echo anchor('frontdesk/status_tiket', 'Status Tiket');?></li>
        <li class="<?php echo $nav_knowledge ?>"><?php echo anchor('frontdesk/knowledge_base', 'Knowledge Base');?></li>
        <li class=""><a href="<?php echo base_url() . 'upload/PMK-93.pdf' ?>" target="pdf">Referensi Peraturan</a></li>
        <li class="<?php echo $nav_forum ?>"><?php echo anchor('forum/index', 'Forum');?></li>
    </ul>
    <div id="logout"><?php echo $this->session->userdata('nama') ?> &nbsp; | &nbsp; <?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>
</div>
