<?php
$nav_dashboard = $nav_form = $nav_knowledge = $nav_forum = $nav_ambil_dokumen = $nav_status_tiket = $nav_pengembalian_dokumen = $nav_referensi = '';
switch ($this->uri->segment(2)) {

    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'form_revisi_anggaran':
        $nav_form = 'current';
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
    case 'pengembalian_dokumen':
        $nav_pengembalian_dokumen = 'current';
}
if ($this->uri->segment(1) == 'referensi') {
    $nav_referensi = 'current';
}
if ($this->uri->segment(1) == 'knowledge') {
    $nav_knowledge = 'current';
}
?>

<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li><?php echo anchor('frontdesk/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
        <li><?php echo anchor('frontdesk/form_revisi_anggaran', 'Form Revisi Anggaran', "class='$nav_form'");?></li>
        <li><?php echo anchor('frontdesk/status_tiket', 'Status Tiket', "class='$nav_status_tiket'");?></li>
        <li><?php echo anchor('frontdesk/ambil_dokumen', 'Pengambilan Dokumen', "class='$nav_ambil_dokumen'");?></li>
        <li><?php echo anchor('frontdesk/pengembalian_dokumen', 'Pengembalian Dokumen', "class='$nav_pengembalian_dokumen'");?></li>
        <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'") ?></li>
        <li><?php echo anchor('frontdesk/man_forum', 'Forum', "class='$nav_forum'");?></li>
    </ul>
</div>
