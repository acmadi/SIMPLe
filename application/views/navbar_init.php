<?php
$nav_dashboard =  $nav_frontdesk = $nav_helpdesk =
$nav_identitas_satker =
$nav_list_pertanyaan =
$nav_form =
$nav_status_tiket =
$nav_ambil_dokumen =
$nav_pengembalian_dokumen =
$nav_report =
$nav_jawaban_cs =

$nav_referensi = $nav_knowledge = $nav_forum = $nav_telepon = '';

// Common
if ($this->uri->segment(2) == 'dashboard') $nav_dashboard = 'current';
if ($this->uri->segment(2) == 'helpdesk') $nav_helpdesk = 'current';
if ($this->uri->segment(1) == 'frontdesks') $nav_frontdesk = 'current';
if ($this->uri->segment(1) == 'dashboards') $nav_dashboard = 'current';
if ($this->uri->segment(1) == 'helpdesks') $nav_helpdesk = 'current';

if ($this->uri->segment(2) == 'jawaban_cs') $nav_jawaban_cs = 'current';
if ($this->uri->segment(2) == 'knowledge_base') $nav_knowledge = 'current';
if ($this->uri->segment(2) == 'report') $nav_report = 'current';

if ($this->uri->segment(1) == 'helpdesks' AND $this->uri->segment(2) == 'all') $nav_list_pertanyaan = 'current'; // Penyelia

// Helpdesk
if ($this->uri->segment(2) == 'identity') $nav_identitas_satker = 'current';
if ($this->uri->segment(2) == 'list_pertanyaan') $nav_list_pertanyaan = 'current';

// Frontdesk
if ($this->uri->segment(2) == 'form_revisi_anggaran') $nav_form = 'current';
if ($this->uri->segment(2) == 'status_tiket') $nav_status_tiket = 'current';
if ($this->uri->segment(2) == 'ambil_dokumen') $nav_ambil_dokumen = 'current';
if ($this->uri->segment(2) == 'pengembalian_dokumen') $nav_pengembalian_dokumen = 'current';


// All
if ($this->uri->segment(1) == 'referensi') $nav_referensi = 'current';
if ($this->uri->segment(1) == 'knowledge') $nav_knowledge = 'current';
if ($this->uri->segment(1) == 'forum') $nav_forum = 'current';
if ($this->uri->segment(1) == 'telepon') $nav_telepon = 'current';
?>