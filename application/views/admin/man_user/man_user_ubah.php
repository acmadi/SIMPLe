    <ul id="nav">
        <li><a href="#tab1" class="active">Manajemen User / Ubah </a></li>
    </ul>
    <div class="clear"></div>
    <div id="konten">
    	<div style="display: none;" id="tab1" class="tab_konten">
			
            
<div class="table">
    <div id="tail"> 
		<div id="msg">
		<?php
			if ($this->session->flashdata('msg')){
				echo $this->session->flashdata('msg');
			}
		?>
		</div>
        <form action="<?php echo site_url('admin/man_user_ubah/ubah')?>" method="post">
		<?php echo form_hidden('id',$item->id_user);?>
		<table id="tableOne" class="yui">
            <tr>
                <td width="100px">Username</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $item->username?>" size="48" name="eusername" /></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $item->nama?>" size="48" name="enama" /></td>
            </tr>
            <tr>
            	<td>Email</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $item->email?>" size="48" name="eemail" /></td>
            </tr>
            <tr>
            	<td>N. Telp</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $item->no_tlp?>" size="48" name="etelp"/></td>
            </tr>
            <tr>
            	<td>Unit</td>
                <td>:</td>
                <td><select name="edepartemen">
                	 <?php foreach($list_unit as $b):?>
							<?php if($item->kode_unit == $b->kode_unit):?>
								<option value="<?php echo $b->kode_unit?>" selected><?php echo $b->nama_unit?></option>
							<?php else:?>
								<option value="<?php echo $b->kode_unit?>"><?php echo $b->nama_unit?></option>
							<?php endif;?>
					<?php endforeach;?>
                </select></td>
            </tr>
            <tr>
            	<td>Level</td>
                <td>:</td>
                <td>
                	<select name="elevel">
                    	<?php foreach($list_level as $a):?>
							<?php if($item->id_lavel == $b->id_lavel):?>
								<option value="<?php echo $a->id_lavel?>" selected><?php echo $a->nama_lavel?></option>
							<?php else:?>
								<option value="<?php echo $a->id_lavel?>"><?php echo $a->nama_lavel?></option>
							<?php endif;?>
						<?php endforeach;?>
                    </select>
                </td>
            </tr>
        </table>
		<br />
        <div class="submit_right">
            <input type="submit" class="button" value="reset" />
            <a href="man_user"><input type="submit" class="button" value="simpan" /></a>
        </div>
        </form>
	</div>
    
</div>

        </div>
    </div>