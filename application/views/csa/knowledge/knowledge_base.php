<ul id="nav">
	<li><a href="#tab1">Deskripsi Kategori</a></li>
</ul>
<div class="clear"></div><br />

<div id="konten">
	<div id="msg">
	<?php
		if ($this->session->flashdata('msg')){
			echo $this->session->flashdata('msg');
		}
	?>
	</div>
	<div style="display: none;" id="tab1" class="tab_konten">
		<h2 class="font-kanan">No Ticket : 0001.A56</h2>
		<div class="clear"></div>

        <div class="table">
            <form action="<?php echo site_url('/csa/knowledge_base/search_knowledge') ?>" id="knowledge" name="" method="post">
                Keyword : <input type="text" size="48" name="fkat" />
                <input class="button" type="submit" value="Cari">
            </form><br /><br />
        
            <div class="border" style="min-height:300px; height:auto; float:left;">
                <div style="float:left; width:46%; padding:20px;">
                	<?php if(!empty($result)):?>
					<?php  foreach($result['dir'] as $idx=>$res): ?>
					<img src="<?php echo base_url(); ?>images/folder-closed.gif" style="height:16px;" alt="dir" /><?php echo $res?>
                    <ul style="list-style:none; margin-left:20px;">
						<?php 
							if(isset($part)):
								$jml = 3;
							else:
								$jml = count($result[$idx]);
							endif;
							for($n = 0; $n < $jml ; $n++):?>
							<li> - <?php echo $result[$idx][$n]['judul']?></li>
						<?php endfor;?>
						
                        <?php if(!isset($sel)):?><li style="text-align:right; margin-right:70px; "><a href="<?php echo site_url('/csa/knowledge_base/search_all/'.$idx)?>">Selengkapnya...</a></li><?php endif;?>
                    </ul>
					<?php endforeach;?>
                    <?php endif;?>
                </div>               	
            </div>
			
            <div class="pagination" style="margin:10px 10px -10px 0px;">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>
      	</div>
    </div>
</div>