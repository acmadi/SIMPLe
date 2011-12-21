<div class="content">
    <h1>Forum</h1>

    <?php foreach ($forums->result() as $forum): ?>
    <div>

        <h2><?php echo $forum->judul_forum ?></h2>

        <em>Tanggal: <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?></em>

        <div>
            <?php echo $forum->isi_forum ?>
        </div>

    </div>
    <?php endforeach ?>

</div>