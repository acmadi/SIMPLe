<ul id="nav">
    <li><a href="#tab1">Manajemen Unit / Tambah</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">


        <div class="table">
            <div id="head">
                <?php
				// TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
				if ($this->session->flashdata('success')) {
					echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
				}
				if ($this->session->flashdata('error')) {
					echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
				}
				if ($this->session->flashdata('notice')) {
					echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
				}
				if ($this->session->flashdata('info')) {
					echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
				}
				?>

                <form method="post" action="<?php echo site_url('admin/man_unit_ubah/update')?>">
					<?php echo form_hidden('fid',$item['unit_1']->id_unit_satker);?>
                    <table id="tableOne" class="yui">
                        <tr>
                            <td>Kode Unit</td>
                            <td>:</td>
                            <td><input type="text" value="<?php echo $item['unit_1']->kode_unit?>" size="48" name="fkode"/></td>
                        </tr>
                        <tr>
                            <td>Nama Unit</td>
                            <td>:</td>
                            <td><input type="text" size="48" name="fnama" value="<?php echo $item['unit_1']->nama_unit?>"/></td>
                        </tr>
						<tr>
                            <td>Anggaran</td>
                            <td>:</td>
                            <td>
								<?php echo form_dropdown('fanggaran',$opt_a,$item['unit_1']->anggaran)?>
							</td>
                        </tr>
                        
                    </table>
                    <br/>
					<div>        
						<h5>Pilih Satker</h5><br />
						<div id="list_satker">
							<?php foreach($list_kementrian as $lk):?>
								<div><a href='javascript:void(0);' childid = 'selkem_<?php echo $lk->id_kementrian?>' class='cat_close category'>&nbsp;&nbsp;&nbsp;&nbsp;</a><?php echo $lk->nama_kementrian?></div>
								<div id="selkem_<?php echo $lk->id_kementrian?>" class="selkem">
								<?php 
								if(isset($list_unit[$lk->id_kementrian])):
									foreach($list_unit[$lk->id_kementrian] as $idx=>$lu):?>
										<div id="unit<?php echo $lk->id_kementrian.$idx?>" satker="<?php echo $lk->id_kementrian.$idx?>" class="innertxt">
											<input type="checkbox" id="select<?php echo $lk->id_kementrian.$idx?>" value="<?php echo $lk->id_kementrian.$idx?>" class="selectit" />&nbsp;&nbsp;<?php echo $lk->id_kementrian,'.',$idx,'-',$lu;?>
										</div>
									<?php 
									endforeach;
								endif;
								?>
								</div>
							<?php endforeach;?>
							<div class="float_break"></div> 
						</div>
						<div style="width:100px; text-align:center; margin-left:20px; padding-top: 100px; width:75px; float:left;">
							<a href="javascript:void(0);" id="move_right">Pilih &raquo;</a><br /><br />
							<a href="javascript:void(0);" id="move_left">&laquo; Batal</a>
							<div class="float_break"></div>   
						</div>
						<div id="selected_unit">
							<?php foreach($item['unit_2'] as $un2):?>
									<div id="unit<?php echo $un2->id_kementrian.$un2->id_unit?>" satker="<?php echo $un2->id_kementrian.$un2->id_unit?>" class="innertxt2">
										<input type="checkbox" checked="checked" name="funit[]" id="select<?php echo $un2->id_kementrian.$un2->id_unit?>" value="<?php echo $un2->id_kementrian.$un2->id_unit?>" class="selectit"  />&nbsp;&nbsp;<?php echo $un2->id_kementrian,'.',$un2->id_unit,'-',$un2->nama_unit;?>
									</div>
							<?php endforeach;?>
						</div>
				  </div>
				
                    <div style="clear:both;padding-top:10px;text-align:right;">
                        <input type="submit" class="button blue-pill" value="simpan" />
                        <a href="<?php echo site_url('/admin/man_unit') ?>" class="button gray-pill">Batal</a>
                    </div>
                </form>


            </div>
        </div>

    </div>
</div>

<script language="javascript">
	$(document).ready(function () {
		// Uncheck each checkbox on body load
		$('#list_satker .selectit').each(function() {this.checked = false;});
		//$('#selected_unit .selectit').each(function() {this.checked = false;});
		
    	$('#list_satker .selectit').click(function() {
			var userid = $(this).val();
			$('#unit' + userid).toggleClass('innertxt_bg');
		});
		
		$('#selected_unit .selectit').click(function() {
			var userid = $(this).val();
			$('#user' + userid).toggleClass('innertxt_bg');
		});
		
		$("#move_right").click(function() {
			var users = $('#selected_unit .innertxt2').size();
			var selected_unit = $('#list_satker .innertxt_bg').size();
			
			if (users + selected_unit > 5) {
				alert('You can only chose maximum 5 users.');
				return;
			}
			
			$('#list_satker .innertxt_bg').each(function() {
				var user_id = $(this).attr('satker');
				$('#select' + user_id).each(function() {this.checked = false;});
				
				var user_clone = $(this).clone(true);
				$(user_clone).removeClass('innertxt');
				$(user_clone).removeClass('innertxt_bg');
				$(user_clone).addClass('innertxt2');
				$(user_clone).find("input").attr('name','funit[]');
				$(user_clone).find("input").attr('checked','checked');
				
				$('#selected_unit').find('#unit' + user_id).remove();
				$('#selected_unit').append(user_clone);
				//$(this).remove();
			});
		});
		
		$("#move_left").click(function() {
			$('#selected_unit .innertxt2').each(function() {
				//var user_id = $(this).attr('satker');
				//$('#select' + user_id).each(function() {this.checked = false;});
				
				//var user_clone = $(this).clone(true);
				//$(user_clone).removeClass('innertxt2');
				//$(user_clone).removeClass('innertxt_bg');
				//$(user_clone).find("input").removeAttr('name');
				//$(user_clone).find("input").removeAttr('checked');
				//$(user_clone).addClass('innertxt');
				
				//$('#list_satker').append(user_clone);
				$(this).remove();
			});
		});
		
		$('#view').click(function() {
			var users = '';
			$('#selected_unit .innertxt2').each(function() {
				var user_id = $(this).attr('satker');
				if (users == '') 
					users += user_id;
				else
					users += ',' + user_id;
			});
			alert(users);
		});
		
		$("div.selkem").each(function() {$(this).css("display", "none");});
		
		$("#list_satker .category").click(function() {
			var childid = "#" + $(this).attr("childid");
			if ($(childid).css("display") == "none") {$(childid).css("display", "block");}
			else {$(childid).css("display", "none");}
			if ($(this).hasClass("cat_close")) {$(this).removeClass("cat_close").addClass("cat_open");}
			else{$(this).removeClass("cat_open").addClass("cat_close");}
		});
	});
</script>