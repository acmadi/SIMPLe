<?php
// Navbar Helpdesk

$nav_dashboard = $nav_identitas_satker = $nav_antrian =
$nav_knowledge = $nav_forum = $nav_referensi =
$nav_list_pertanyaan = $nav_telpon = '';

switch ($this->uri->segment(2)) {
    case 'dashboard':
        $nav_dashboard = 'current';
        break;
    case 'identitas_satker':
    case 'identity':
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
if ($this->uri->segment(1) == 'knowledge') {
    $nav_knowledge = 'current';
}
if ($this->uri->segment(1) == 'forum') {
    $nav_forum = 'current';
}
if ($this->uri->segment(2) == 'list_pertanyaan') {
    $nav_list_pertanyaan = 'current';
}
if ($this->uri->segment(1) == 'telpon') {
    $nav_telpon = 'current';
}
?>


<ul class="sf-menu">
    <li><?php echo anchor('helpdesks/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
    <li><?php echo anchor('helpdesks/identity', 'Isi Identitas Satker', "class='$nav_identitas_satker'");?></li>
    <li><?php echo anchor('helpdesks/list_pertanyaan', 'List Pertanyaan', "class='$nav_list_pertanyaan'");?></li>
    <li><?php echo anchor('knowledge', 'Knowledge Base', "class='$nav_knowledge'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'")?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telpon', 'Telpon', "class='$nav_telpon'");?></li>
</ul>

<script type="text/javascript">
    // JS Untuk ngecek pertanyaan sudah dijawab atau belum
    function check() {
        $.get('<?php echo site_url('helpdesks/check') ?>', function (response) {
            if (response > 0) {
                notify('Jawaban baru', 'Ada pertanyaan yang telah dijawab');
            }
        });
    }

    setInterval('check()', 30000);
</script>