<style type="text/css">
    .overflow {
        overflow: auto;
        height: 250px;
    }
</style>

<div class="page-header">
    <h2>Dashboard</h2>
</div>

<div class="row-fluid">
    <div class="span6">
        <h3>Statistik</h3>
        <img src="<?php echo base_url()?>images/dashboard_bar_admin.png"/>
    </div>

    <div class="span6">
        <h3>User yang sedang online</h3>

        <div class="overflow">
            <dl>
                <?php

                $result = $this->db->query("SELECT user
											FROM tb_online_users WHERE MINUTE(TIMEDIFF(NOW(),aktifitas_terakhir)) <= 30 ")->result();
                foreach ($result as $val) {
                    //$udata = unserialize($val->user_data);
                    echo "<dd ><img src='" . base_url() . "images/user.png' > " . $val->user . "</dd>";
                }


                ?>
            </dl>
        </div>

    </div>
</div>

<hr/>

<div class="row-fluid">
    <div class="span6">
        <h4>Forum</h4>
        <div style="height: 240px;">
            <dl>
                <?php
                $result = $this->db->from('tb_forum')->limit(5)->get()->result();
                foreach ($result as $val) {
                    echo '<dd>' . anchor('admin/man_forum_ubah/index/' . $val->id_forum, $val->judul_forum) . '</dd>';
                }
                ?>
            </dl>
        </div>
    </div>

    <div class="span6">
        <h4>Knowledge Base</h4>
        <div style="height: 240px; ">
            <dl>
                <?php
                $result = $this->db->from('tb_knowledge_base')->limit(5)->get()->result();
                foreach ($result as $val) {
                    echo '<dd>' . anchor('admin/knowledge_ubah/index/' . $val->id_knowledge_base, $val->judul) . '</dd>';
                }
                ?>
            </dl>
        </div>
    </div>
</div>