<style type="text/css">
    .bla2 {
        border: 1px solid #cecece;
        width: 48%;
        padding: 10px;
        margin: 10px 0 10px 0;
        border-radius: 5px;
    }

    .bla2:nth-child(odd) {
        float: left;
    }

    .bla2:nth-child(even) {
        float: right;
    }

    .category-title {
        background: #7AB2EC;
        text-shadow: 1px 1px 0 #000;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .category-title a {
        color: #fff !important;
        font-weight: bold;
        padding: 10px;
        display: inline-block;
        text-decoration: none;
    }
</style>

<script type="">
    $(function() {
        $('#search-form').submit(function(){
            if ($('#search-form input').val() == '') {
                return false;
            }
        })
    })
</script>

<div class="content">
    <div id="msg">
        <?php
                if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
    }
        ?>
    </div>
    <div style="display: none;" id="tab1" class="tab_konten">

        <h1>Knowledge Base</h1>

        <form action="<?php echo site_url('/helpdesk/knowledge_base/search_knowledge') ?>" id="search-form" method="post" style="text-align: right;">
            <input type="text" name="fkat" placeholder="Pencarian" style="width: 400px !important;" autocomplete="false"/>
            <input id="search" class="button blue-pill" type="submit" value="Cari">
        </form>

        <div style="margin: 20px 0;">

            <?php if (!empty($result)): ?>

            <?php foreach ($result['dir'] as $idx => $res): ?>

                <div class="bla2">

                    <div class="category-title">
                        <!--                                <img src="-->
                            <?php //echo base_url(); ?><!--images/folder-closed.gif" style="height:16px;" alt="dir" />-->
                        <a href="<?php echo site_url('/helpdesk/knowledge_base/search_all/' . $idx . '/' . $idsearch) ?>"><?php echo $res ?></a>
                    </div>

                    <ul style="list-style: disc outside; margin-left:20px;">
                        <?php
                        if (isset($part)) {
                        $jml = count($result[$idx]) > 3 ? 3 : count($result[$idx]);
                    } else {
                        $jml = count($result[$idx]);
                    }
                        ?>

                        <?php for ($n = 0; $n < $jml; $n++): ?>

                        <li style="padding: 4px 0;">
                            <a href="#">
                                <?php echo $result[$idx][$n]['judul']?>
                            </a>
                        </li>

                        <?php endfor ?>

                    </ul>

                    <?php if (!isset($sel)): ?>
                    <div style="text-align:right; border-top: 1px dotted #cecece; padding: 20px 0 10px; margin: 0px 0;">
                        <a href="<?php echo site_url('/helpdesk/knowledge_base/search_all/' . $idx . '/' . $idsearch) ?>"
                           class="button gray-pill" style="text-transform: capitalize;">Selengkapnya</a>
                    </div>
                    <?php endif;?>

                </div>
                <?php endforeach; ?>

            <?php endif;?>
            <div class="clear"></div>
        </div>

<!--        <div class="pagination" style="margin:10px 10px -10px 0px;">Halaman <a href="#"><<</a> <a href="#">1</a> <a-->
<!--                href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a-->
<!--                href="#">>></a>-->
        </div>
    </div>
</div>