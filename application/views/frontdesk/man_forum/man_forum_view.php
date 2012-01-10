<div class="content">

    <h1>Forum</h1>
    <?php $forums = $forums->result() ?>
    <?php foreach ($forums as $forum): ?>
    <div>

        <h2><?php echo $forum->judul_forum ?></h2>

        <em>Tanggal: <?php echo date('d-m-Y', strtotime($forum->tanggal)) ?></em>

        <div>
            <?php echo $forum->isi_forum ?>
        </div>

    </div>
    <?php endforeach ?>
    
    <hr/>

    <h2>Balas</h2>
    <?php 
    $data['id_parent']    = $forums[0]->id_forum;
    $data['id_kat_forum'] = $forums[0]->id_kat_forum;
    $data['judul_forum']  = $forums[0]->judul_forum;
    $data['referrer']     = 'frontdesk/man_forum/view/' . $forums[0]->id_forum;
    $this->load->view('frontdesk/man_forum/form', $data) 
    ?>
    
    <hr/>
    
    <h2><?php echo 'Ada ' . count($childs) . ' balasan' ?></h2>
    <?php foreach ($childs as $child): ?>
        <blockquote style="padding-left: 5px; margin: 20px 0;">

        <h3><?php echo $child->judul_forum ?></h3>

        <em>Tanggal: <?php echo date('d-m-Y', strtotime($child->tanggal)) ?></em>

        <div>
            <?php echo $child->isi_forum ?>
        </div>

        </blockquote>
    <?php endforeach ?>
</div>