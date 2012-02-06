<?php
// Navbar Frontdesk
require_once(APPPATH . 'views/navbar_init.php');
?>

<ul>
    <li><?php echo anchor('frontdesk/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
    <li><?php echo anchor('frontdesk/form_revisi_anggaran', 'Form Revisi Anggaran', "class='$nav_form'");?></li>
    <li><?php echo anchor('frontdesks/list_dokumen', 'List Dokumen', "class='$nav_list_dokumen'");?></li>
    <li><?php echo anchor('frontdesk/status_tiket', 'Status Tiket', "class='$nav_status_tiket'");?></li>
    <li><?php echo anchor('frontdesk/ambil_dokumen', 'Pengambilan Dokumen', "class='$nav_ambil_dokumen'");?></li>
    <li><?php echo anchor('frontdesk/pengembalian_dokumen', 'Pengembalian Dokumen', "class='$nav_pengembalian_dokumen'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'") ?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telepon', 'Telepon', "class='$nav_telepon'");?></li>
</ul>