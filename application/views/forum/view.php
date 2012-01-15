<div class="content">

    <h1>Forum</h1>
    <?php $forum = $forums->row() ?>
    <div class="forumpost ts">
        
        <h2><a href="<?php echo site_url('/forum/view/' . $forum->id_forum ) ?>"><?php echo $forum->judul_forum ?></a></h2>

        <div  class="isi">
            <?php echo word_limiter($forum->isi_forum, 100) ?>
        </div>
        
        <?php if($forum->file != '') : ?>
        <div class="attachment">
            File terlampir: 
            <?php echo anchor(base_url() . 'upload/forum/' . $forum->file, $forum->file)?>
        </div>
        <?php endif; ?>

        <div style="text-align: right;"></div>
        <em class="meta">
         dikirim pada <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?>
         oleh <?php echo $forum->nama ?>
         <a href="<?php echo site_url('/forum/view/' . $forum->id_forum ) ?>">Baca selengkapnya</a>
        </em>

    </div>
        

    
    <h2 class="forumreply"><?php echo 'Ada ' . count($childs) . ' balasan' ?></h2>
    
    <script>
    $(document).ready(function(){
        $('#postbutton').click(function(){
            $('#postbox').slideToggle();
        })
    });
    </script>
    <div class="forumpost reply">
        <h2>
            <button id="postbutton" class="button gray-pill">Tulis Balasan</button>
        </h2>

        <div id="postbox" style="display:none">
            
            <?php 
            $data['kat_forum']    = NULL;
            $data['id_parent']    = $forum->id_forum;
            $data['id_kat_forum'] = $forum->id_kat_forum;
            $data['judul_forum']  = 'Balas: ' . $forum->judul_forum;
            $data['referrer']     = 'forum/view/' . $forum->id_forum;
            $this->load->view('forum/form', $data) 
            ?>
        </div>
    </div>

    
    <?php foreach($childs as $child): ?>
    <div class="forumpost">
        <h2><a href="<?php echo site_url('/forum/view/' . $child->id_forum ) ?>">
        <?php echo $child->judul_forum ?></a>
        </h2>

        <div  class="isi">
            <?php echo word_limiter($child->isi_forum, 100) ?>
        </div>
        
        <?php if($child->file != '') : ?>
        <div class="attachment">
            Unduh berkas terlampir:
            <?php echo img('images/file_small.png')?> 
            <?php echo anchor(base_url() . 'upload/forum/' . $child->file, $child->file)?>
        </div>
        <?php endif; ?>

        <em class="meta">
         dikirim pada <?php echo date('d-m-Y', strtotime($child->tanggal)) ?>
         oleh <?php echo $child->nama ?>
         <a href="<?php echo site_url('/forum/view/' . $child->id_forum ) ?>">Baca selengkapnya</a>
        </em>
    </div>
    <?php endforeach; ?>
</div>