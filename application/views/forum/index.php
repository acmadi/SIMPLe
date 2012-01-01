<div class="content container_12">
    <h1>Forum</h1>

    <?php foreach ($forums->result() as $forum): ?>
    <div style="margin-bottom: 20px;" class="">
        
        <h2 style="margin-bottom: 0;"><a href="<?php echo site_url('/forum/view/' . $forum->id_forum ) ?>"><?php echo $forum->judul_forum ?></a></h2>

        <div style="color: #999; text-align: right;"><?php echo date('d-m-Y H:i', strtotime($forum->tanggal)) ?></div>

        <div style="margin: 10px 0; color: #666; line-height: 1.8em;">
            <?php echo word_limiter($forum->isi_forum, 100) ?>
        </div>

        <div style="text-align: right;"><a href="<?php echo site_url('/forum/view/' . $forum->id_forum ) ?>">Selengkapnya</a></div>

    </div>
    <hr/>
    <?php endforeach ?>

    <?php echo $this->pagination->create_links() ?>
</div>