    <ul id="nav">
        <li><a href="#tab1" class="active">Manajemen User / Surat Kerja</a></li>
    </ul>
    <div class="clear"></div>
    <div id="konten">
    	<div style="display: none;" id="tab1" class="tab_konten">
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
            <div class="table"> 
                <div id="head">
                    <label class="label1" for="identitas">Identitas User</label>
                    <form action="#" method="post" id="surat_kerja">
                    <table>
                    <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><?php echo $item->username?></td>
                    </tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $item->nama?></td>
                    </tr>
                    <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $item->email?></td>
                    </tr>
                    <tr>
                    <td>No Tlp</td>
                    <td>:</td>
                    <td><?php echo $item->no_tlp?></td>
                    </tr>
                    <tr>
                    <td>Unit</td>
                    <td>:</td>
                    <td><?php echo $item->nama_unit?>
                    </td>
                    </tr>
                    <tr>
                    <td>Departemen</td>
                    <td>:</td>
                    <td><?php echo $item->nama_lavel?>
                    </td>
                    </tr>
                    </table>
                    </form>
                </div>
                <div id="tail">
                    <label class="label2" for="masakerja">Masa Kerja</label>
                    <form action="<?php echo site_url('admin/akses_kontrol_surat_kerja/save')?>" method="post" id="surat_kerja" style="min-height:100px;">
                        <?php echo form_hidden('id',$item->id_user);?>
						<?php echo form_hidden('level',$level);?>
						 <input  name="ftglmulai"  id="datepicker1" value="" type="text"> -
						 <input  name="ftglselesai"  id="datepicker2" value="" type="text">     
						 <input id="simpan" type="submit" class="button blue-pill" value="simpan"/>
                    </form>
        			
                </div>
				<div id="middle">
					<div>History Masa Kerja</div>
                    <table id="tableOne" class="yui">
						<thead>
						<tr>
							<th class="short">No</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
						</tr>
						</thead>
						<tbody>
						<?php $i = 1 ?>
						<?php foreach ($history_maker as $item): ?>
						<tr>
							<td class="short"><?php echo $i++ ?></td>
							<td><?php echo $item->tanggal_mulai ?></td>
							<td><?php echo $item->tanggal_selesai ?></td>
							
						</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				</div><br />
        	</div>
            
    </div>
	
</div>
<link type="text/css" href="<?php echo base_url()?>css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript"> 
			$(document).ready(function(){
				$("#datepicker1").datepicker({ dateFormat: 'dd-mm-yy' });
				$("#datepicker2").datepicker({ dateFormat: 'dd-mm-yy' });
				$("div.ui-datepicker").css('font-size','12px');	
			}); 
</script>