<div class="content">

    <h1>Forum</h1>

    <div class="clearfix">
        <h2>Kategori Forum</h2>
        <?php foreach ($kategori->result() as $value): ?>
        <div class="grid_4">
            <a href="<?php echo site_url('forum/category/' . $value->id_kat_forum) ?>"
               style="background: #cecece;
                      border: 1px solid #b9b9b9;
                      padding: 10px;
                      margin-bottom: 10px;
                      font-size: 14px;
                      display: block;">
                <?php echo $value->kat_forum ?>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>