<div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d F Y') ?></em></div>
<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="current "><?php echo anchor('csa/dashboard', 'Dashboard');?></li>
        <li class="current "><?php echo anchor('csa/list_antrian', 'List Antrian');?></li>
        <li class="current "><?php echo anchor('csa/knowledge_base', 'Knowledge Base');?></li>
        <li class="current "><a href="<?php echo base_url() . 'upload/PMK-93.pdf' ?>" target="pdf">Referensi Peraturan</a></li>
        <li class="current "><?php echo anchor('csa/man_forum', 'Forum');?></li>
    </ul>
</div>
