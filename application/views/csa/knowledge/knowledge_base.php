    <ul id="nav">
        <li><a href="#tab1" class="active">Deskripsi Peraturan</a></li>
    </ul>
    <div class="clear"></div>
	
    <div id="konten">
			<div id="msg">
	<?php
	if ($this->session->flashdata('msg')){
		echo $this->session->flashdata('msg');
	}
	?>
	</div>
        	<div class="garis">
        	<p class="judul">Cari</p>
            <form action="<?php echo site_url('/csa/knowledge_base/search_knowledge') ?>" id="knowledge" name="" method="post">    
            <p>
                <label for="">Kategori</label>
                <select name="fkat" id="">
                    <option value="">-pilih kategori-</option>
                     <?php foreach($categories->result() as $lk): 
								if($idsearch == $lk->id_kat_knowledge_base){ ?><option value="<?php echo $lk->id_kat_knowledge_base?>" selected><?php echo $lk->kat_knowledge_base?></option>
					 <?			} else {?> <option value="<?php echo $lk->id_kat_knowledge_base?>"><?php echo $lk->kat_knowledge_base?></option>
						
					<?php } endforeach;?>
                </select>
                <input type="submit" value="Cari">
            </p>
            </form>
            </div><br /><br />
        	
			<div class="garis">
        	<p class="judul">Kategori</p>
			<?php if(!empty($result)):?>
			<br/>
            <ul style="font-size:12px;">
                <img src="<?php echo base_url(); ?>images/folder-closed.gif" style="height:16px;" alt="dir" /><?php echo $result['name']?>
                    <ul style="padding-left:40px;">
                        <?php foreach($result['result']->result() as $res):?>
							<li><?php echo $res->judul?></li>
						<?php endforeach;?>				
                    </ul>
            </ul>
			<?php if($sel == 1){?><a href="<?php echo site_url('/csa/knowledge_base/search_all/'.$idsearch.'/'.$res->id_kat_knowledge_base)?>">Selengkapnya >></a><?php } ?>
            </div>
			<?php endif;?>
			<br /><br />
        </div>
    </div>
<script type="text/javascript">
	setTimeout('$("div#msg").html("")', 3000);
</script>