<div class="content">

    <h1>Forum</h1>

    <?php echo 'Halaman: ' . $pagination ?>
    <script>
    $(document).ready(function(){
        $('#postbutton').click(function(){
            $('#postbox').slideToggle();
        })
    });
    </script>
    <!--
    <div class="forumpost reply">
        <h2>
        <button id="postbutton" class="button gray-pill">Tulis Forum Baru</button>
        </h2>

        <div id="postbox" style="display:none">
            <?php 

            $q_kat = $this->mforum->get_categories();
            foreach($q_kat->result_array() as $row){
                $kat_forum[$row['id_kat_forum']] = $row['kat_forum'];
            }

            $data['kat_forum']    = $kat_forum;
            $data['id_parent']    = NULL;
            $data['id_kat_forum'] = NULL;
            $data['judul_forum']  = NULL;
            $data['referrer']     = 'forum';
            $this->load->view('forum/form', $data) 
            ?>
        </div>
    </div>
    -->
    <hr/>
    <?php foreach ($forums->result() as $forum): ?>
    <div class="forumpost">
        <?php $has_attachment = ($forum->file != '' && $forum->file != NULL) ? 'has_attachment' : '' ?>
        <h2 class="<?php echo $has_attachment ?>"><a href="<?php echo site_url('/forum/view/' . $forum->id_forum ) ?>"><?php echo $forum->judul_forum ?></a></h2>
        <div class="shadow">&nbsp;</div>

        <div  class="isi">
            <?php echo word_limiter($forum->isi_forum, 100) ?>
        </div>
        
        <em class="meta">
         dikirim pada <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?>
         oleh <?php echo 'Admin' // $forum->nama ?>
         <a href="<?php echo site_url('/forum/view/' . $forum->id_forum ) ?>">Baca selengkapnya</a>
        </em>

    </div>
    <?php endforeach ?>
    <?php echo 'Halaman: ' . $pagination ?>
</div>