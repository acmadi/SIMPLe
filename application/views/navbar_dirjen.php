<div id="navbar" class="clearfloat">
    <ul class="sf-menu">
        <li class="current "><?php echo anchor('dirjen/dashboard', 'Dashboard');?></li>
        <li class="current "><?php echo anchor('dirjen/list_helpdesk', 'Helpdesk');?></li>
        <li class="current "><?php echo anchor('dirjen/list_frontdesk', 'Front Desk');?></li>
        <li class="current "><?php echo anchor('dirjen/knowledge_base', 'Knowledge Base');?></li>
        <li class="current "><?php echo anchor('dirjen/referensi_peraturan', 'Referensi Peraturan');?></li>
        <li class="current "><?php echo anchor('dirjen/man_forum', 'Forum');?></li>
    </ul>
    <div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?> &nbsp; <em><?php echo date('d-m-Y') ?></em></div>
</div>
