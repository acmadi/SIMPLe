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

        <div>
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