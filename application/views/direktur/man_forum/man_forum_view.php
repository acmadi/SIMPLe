<div class="content">

    <h1>Forum</h1>
    <?php $forum = $forums->row() ?>
    <div class="agan_ts">

        <h2 class="entry-title"><?php echo $forum->judul_forum ?></h2>

        <em class="meta">dikirim pada tanggal <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?>,
         oleh <?php echo $forum->nama ?></em>

        <div class="isi_forum">
            <?php echo $forum->isi_forum ?>
        </div>

        <?php if($forum->file != '') : ?>
        <div class="attachment">
            File terlampir: 
            <?php echo anchor(base_url() . 'upload/forum/' . $forum->file, $forum->file)?>
        </div>
        <?php endif; ?>
    </div>
    
    <hr/>
    
    <script>
    $(document).ready(function(){
        $('#postbutton').click(function(){
            $('#postbox').slideToggle();
        })
    });
    </script>
    <button id="postbutton" class="button gray-pill">Tulis Balasan</button>

    <br/>
    <div id="postbox" style="display:none">
        
        <?php 
        $data['kat_forum']    = NULL;
        $data['id_parent']    = $forum->id_forum;
        $data['id_kat_forum'] = $forum->id_kat_forum;
        $data['judul_forum']  = 'Balas: ' . $forum->judul_forum;
        $data['referrer']     = 'direktur/man_forum/view/' . $forum->id_forum;
        $this->load->view('direktur/man_forum/form', $data) 
        ?>
    </div>

    <hr/>
    
    <h2><?php echo 'Ada ' . count($childs) . ' balasan' ?></h2>
    <?php foreach ($childs as $child): ?>
        <blockquote style="padding-left: 5px; margin: 20px 0;">

        <h3 class="entry-title"><?php echo $child->judul_forum ?></h3>

        <em class="meta">dikirim pada tanggal <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?>,
         oleh <?php echo $child->nama ?></em>

        <div class="isi_forum">
            <?php echo $child->isi_forum ?>
        </div>
        
        <?php if($child->file != '') : ?>
        <div class="attachment">
            File terlampir: 
            <?php echo anchor(base_url() . 'upload/forum/' . $child->file, $child->file)?>
        </div>
        <?php endif; ?>
        </blockquote>
    <?php endforeach ?>
</div>