<?php
// Navbar Helpdesk
require_once(APPPATH . 'views/navbar_init.php');
?>

<ul>
    <li><?php echo anchor('helpdesks/dashboard', 'Dashboard', "class='$nav_dashboard'");?></li>
    <li><?php echo anchor('helpdesks/identity', 'Isi Identitas Satker', "class='$nav_identitas_satker'");?></li>
    <li><?php echo anchor('helpdesks/list_pertanyaan', 'List Pertanyaan', "class='$nav_list_pertanyaan'");?></li>
    <li><?php echo anchor('knowledge', 'Knowledge Base', "class='$nav_knowledge'");?></li>
    <li><?php echo anchor('referensi', 'Referensi Peraturan', "class='$nav_referensi'")?></li>
    <li><?php echo anchor('forum', 'Forum', "class='$nav_forum'");?></li>
    <li><?php echo anchor('telepon', 'Telepon', "class='$nav_telepon'");?></li>
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