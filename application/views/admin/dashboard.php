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

    <fieldset style="padding: 40px; float: left; width: 500px;">
        <legend>Statistik</legend>
        <div id="graph" style="width: 500px; height: 200px;"></div>
    </fieldset>

    <fieldset style="float: left; width: 500px; margin-left: 20px; height: 200px;">
        <legend>Knowledge Base</legend>
        <div style="height: 200px; overflow: scroll;">
            <dl>
                <?php
                $result = $this->db->from('tb_knowledge_base')->limit(5)->get()->result();
                foreach ($result as $val) {
                    echo '<dd>' . anchor('admin/knowledge', $val->judul) . '</dd>';
                }
                ?>
            </dl>
        </div>
    </fieldset>
    <div class="clear"></div>
</div>
