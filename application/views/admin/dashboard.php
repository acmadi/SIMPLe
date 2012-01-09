<script src="<?php echo base_url('js/tufte-graph/raphael.js') ?>"></script>
<script src="<?php echo base_url('js/tufte-graph/jquery.enumerable.js') ?>"></script>
<script src="<?php echo base_url('js/tufte-graph/jquery.tufte-graph.js') ?>"></script>

<script type="text/javascript">
    $(function () {
        $('#graph').tufteBar({
            data:[
                [<?php echo $this->db->count_all('tb_tiket_helpdesk') ?>,
                    {label:'Open'}
                ],
                [<?php echo $this->db->count_all('tb_tiket_frontdesk') ?>,
                    {label:'Pending'}
                ],
                [0,
                    {label:'Resolved'}
                ],
                [2,
                    {label:'Close'}
                ]
            ],
            axisLabel:function (index) {
                return this[1].label
            },
            color:function (index) {
                return ['#E57536', '#82293B'][index % 2]
            }
        })
    })
</script>

<div class="content">
    <h1>Dashboard</h1>

    <fieldset style=" float: left; width: 500px; ">
        <legend>Statistik</legend>
        <img src="<?=base_url()?>images/dashboard_bar_admin.png"/>
    </fieldset>

    <fieldset style="float: left; width: 500px; margin-left: 20px; height: 255px;">
        <legend>User yang sedang online</legend>
        <div style="height: 240px;">
            <dl>
                <?php
                
				$result = $this->db->query("SELECT user_data FROM ci_sessions WHERE user_data != ''")->result();
                foreach ($result as $val) {
					$udata = unserialize($val->user_data);
                    echo "<dd ><img src='".base_url()."images/user.png' > " . $udata['user'] . "</dd>";
                }
				
                ?>
            </dl>
        </div>
    </fieldset>
	
	<div class="clear"></div>

    <fieldset style="float: left; width: 500px; height: 255px;">
        <legend>Forum</legend>
        <div style="height: 240px;">
            <dl>
                <?php
                $result = $this->db->from('tb_forum')->limit(5)->get()->result();
                foreach ($result as $val) {
                    echo '<dd>' . anchor('admin/man_forum_ubah/index/'.$val->id_forum, $val->judul_forum) . '</dd>';
                }
                ?>
            </dl>
        </div>
    </fieldset>
	
	<fieldset style="float: left; width: 500px;margin-left: 20px; height: 255px;">
        <legend>Knowledge Base</legend>
        <div style="height: 240px; ">
            <dl>
                <?php
                $result = $this->db->from('tb_knowledge_base')->limit(5)->get()->result();
                foreach ($result as $val) {
                    echo '<dd>' . anchor('admin/knowledge_ubah/index/'.$val->id_knowledge_base, $val->judul) . '</dd>';
                }
                ?>
            </dl>
        </div>
    </fieldset>
	
	
	
    <div class="clear"></div>
</div>
