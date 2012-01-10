<div class="content">



    <h1>Forum</h1>

    <h2>Buat Forum Baru</h2>
    <?php 

    $q_kat = $this->mforum->get_categories();
    foreach($q_kat->result_array() as $row){
        $kat_forum[$row['id_kat_forum']] = $row['kat_forum'];
    }

    $data['kat_forum']    = $kat_forum;
    $data['id_parent']    = NULL;
    $data['id_kat_forum'] = NULL;
    $data['judul_forum']  = NULL;
    $data['referrer']     = 'frontdesk/man_forum';
    $this->load->view('frontdesk/man_forum/form', $data) 
    ?>
    <hr/>
    <?php foreach ($forums->result() as $forum): ?>
    <div style="margin-bottom: 20px;">
        
        <h2><a href="<?php echo site_url('/frontdesk/man_forum/view/' . $forum->id_forum ) ?>"><?php echo $forum->judul_forum ?></a></h2>

        <em>Tanggal: <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?></em>

        <div style="margin: 10px 0;">
            <?php echo word_limiter($forum->isi_forum, 100) ?>
        </div>

        <div style="text-align: right;"><a href="<?php echo site_url('/frontdesk/man_forum/view/' . $forum->id_forum ) ?>">Selengkapnya</a></div>

    </div>
    <?php endforeach ?>
</div>