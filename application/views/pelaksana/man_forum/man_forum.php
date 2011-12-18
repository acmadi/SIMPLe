<div class="content">
    <h1>Forum</h1>

    <?php foreach ($forums->result() as $forum): ?>
    <div style="margin-bottom: 20px;">
        
        <h2><a href="<?php echo site_url('/pelaksana/man_forum/view/' . $forum->id_forum ) ?>"><?php echo $forum->judul_forum ?></a></h2>

        <em>Tanggal: <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?></em>

        <div style="margin: 10px 0;">
            <?php echo word_limiter($forum->isi_forum, 100) ?>
        </div>

        <div style="text-align: right;"><a href="<?php echo site_url('/pelaksana/man_forum/view/' . $forum->id_forum ) ?>">Selengkapnya</a></div>

    </div>
    <?php endforeach ?>
</div>