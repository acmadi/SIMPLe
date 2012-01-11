<div class="content">



    <h1>Forum</h1>

    <script>
    $(document).ready(function(){
        $('#postbutton').click(function(){
            $('#postbox').slideToggle();
        })
    });
    </script>
    
    
    <button id="postbutton" class="button gray-pill">Tulis Forum Baru</button>

    <br/><br/>
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
        $data['referrer']     = 'helpdesk/man_forum';
        $this->load->view('helpdesk/man_forum/form', $data) 
        ?>
    </div>
    <hr/>
    <?php foreach ($forums->result() as $forum): ?>
    <div style="margin-bottom: 20px;">
        
        <h2><a href="<?php echo site_url('/helpdesk/man_forum/view/' . $forum->id_forum ) ?>"><?php echo $forum->judul_forum ?></a></h2>

        <em class="meta">dikirim pada tanggal <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?>,
         oleh <?php echo $forum->nama ?></em>

        <div  class="isi_forum" style="margin: 10px 0;">
            <?php echo word_limiter($forum->isi_forum, 100) ?>
        </div>
        
        <div style="text-align: right;"><a href="<?php echo site_url('/helpdesk/man_forum/view/' . $forum->id_forum ) ?>">Selengkapnya</a></div>

    </div>
    <?php endforeach ?>
</div>