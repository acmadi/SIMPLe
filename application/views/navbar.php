<div id="logout"><?php echo anchor("login/process_logout", 'Logout') ?></div>
<div id="navbar" class="clearfloat">
    <div class="second_logo"><a href="http://blog.ocjohn.co.cc/" name="logo click"><img
            src="<?php echo base_url(); ?>images/logo.png" "width="45" height="45" style="float:left; margin:5px 5px 5px
        10px;"/></a></div>
    <ul class="sf-menu">
        <li class="current "><?php echo anchor('admin/dashboard', 'Dashboard');?></li>
        <li class="current "><?php echo anchor('admin/akses_kontrol', 'Akses Kontrol');?></li>
        <li class="current "><?php echo anchor('admin/man_user', 'Manajemen User');?></li>
        <li class="current "><?php echo anchor('admin/man_unit', 'Manajemen Unit');?></li>
        <li class="current "><?php echo anchor('admin/knowledge', 'Knowledge');?></li>
        <li class="current "><?php echo anchor('admin/man_forum', 'Manajemen Forum');?></li>
        <li class="current "><?php echo anchor('admin/helpDesk', 'HelpDesk');?></li>
        <li class="current "><?php echo anchor('admin/frontDesk', 'FrontDesk Sistem');?></li>
        <li class="current "><?php echo anchor('admin/histori', 'Histori');?></li>
    </ul>
</div>
