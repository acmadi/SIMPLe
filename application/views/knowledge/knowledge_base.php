<script type="">
    $(function () {
        $('#search-form').submit(function () {
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

    <div class="container_12">

        <h1>Knowledge Base</h1>

        <div class="grid_12">
            <form action="<?php echo site_url('/helpdesk/knowledge_base/search_knowledge') ?>" id="search-form" method="post" style="text-align: right;">
                <input type="text" name="fkat" placeholder="Pencarian" autocomplete="off"/>
                <input id="search" class="button blue-pill" type="submit" value="Cari">
            </form>
        </div>

        <div class="grid_3">
            <ul>
                <li><a href="<?php echo site_url('frontdesk/knowledge_base/') ?>">Semua</a></li>
                <?php foreach ($categories->result() as $value): ?>
                    <?php if ($this->uri->segment('3') == $value->id_kat_knowledge_base || $this->uri->segment('3') == ''): ?>
                        <li><?php echo anchor('/frontdesk/knowledge_base/' . $value->id_kat_knowledge_base, $value->kat_knowledge_base) ?></li>
                    <?php else: ?>
                        <li><?php echo anchor('/frontdesk/knowledge_base/' . $value->id_kat_knowledge_base, $value->kat_knowledge_base) ?></li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="grid_9">

            <?php if (!empty($result)): ?>

            <?php foreach ($result['dir'] as $idx => $res): ?>

                <div class="">

                    <h1 class="category-title">
                        <a href="<?php echo site_url('/helpdesk/knowledge_base/search_all/' . $idx . '/' . $idsearch) ?>"><?php echo $res ?></a>
                    </h1>

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
                    <!--                    <div style="text-align:right; border-top: 1px dotted #cecece; padding: 20px 0 10px; margin: 0px 0;">-->
                    <!--                        <a href="--><?php //echo site_url('/helpdesk/knowledge_base/search_all/' . $idx . '/' . $idsearch) ?><!--"-->
                    <!--                           class="button gray-pill" style="text-transform: capitalize;">Selengkapnya</a>-->
                    <!--                    </div>-->
                    <?php endif;?>

                </div>
                <?php endforeach; ?>

            <?php endif;?>
            <div class="clear"></div>
        </div>

        <?php echo $this->pagination->create_links() ?>
    </div>
</div>
</div>