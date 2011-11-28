<div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?></div>
<div id="navbar" class="clearfloat">
    <div class="second_logo"><a href="http://blog.ocjohn.co.cc/" name="logo click"><img
            src="<?php echo base_url(); ?>images/logo.png" "width="45" height="45" style="float:left; margin:5px 5px 5px
        10px;"/></a></div>
    <ul class="sf-menu">
        <li class="current "><?php echo anchor('csa/dashboard', 'Dashboard');?></li>
        <li class="current "><?php echo anchor('csa/list_antrian', 'List Antrian');?></li>
        <li class="current "><?php echo anchor('csa/knowledge_base', 'Knowledge Base');?></li>
        <li class="current "><?php echo anchor('csa/referensi_peraturan', 'Referensi Peraturan');?></li>
        <li class="current "><?php echo anchor('csa/man_forum', 'Manajemen Forum');?></li>
    </ul>
</div>
