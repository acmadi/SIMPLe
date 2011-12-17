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
		</div>
        <form action="<?php echo site_url('admin/akses_kontrol_ubah/ubah_user')?>" method="post">
		<?php echo form_hidden('id',$item->id_user);?>
		<?php echo form_hidden('level',$level);?>
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
							<option value="">--pilih unit--</option>
                	 <?php foreach($list_unit as $b):?>
							<?php if($item->id_unit_satker == $b->id_unit_satker):?>
								<option value="<?php echo $b->id_unit_satker?>" selected><?php echo $b->nama_unit?></option>
							<?php else:?>
								<option value="<?php echo $b->id_unit_satker?>"><?php echo $b->nama_unit?></option>
							<?php endif;?>
					<?php endforeach;?>
                </select></td>
            </tr>
            <tr>
            	<td>Level</td>
                <td>:</td>
                <td>
                	<select name="elevel">
						<option value="">--pilih unit--</option>
                    	<?php foreach($list_level as $a):?>
							<?php if($item->id_lavel == $a->id_lavel):?>
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
            <input type="submit" class="button blue-pill" value="reset" />
            <input type="submit" class="button blue-pill" value="simpan" />
        </div>
        </form>
	</div>
    
</div>

        </div>
    </div>