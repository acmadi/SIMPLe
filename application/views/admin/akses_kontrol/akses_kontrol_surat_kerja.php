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
						<table style=" margin-left: 150px; margin-top: 10px; float:left; ">
                            <thead>
                                <tr>
                                    <td colspan="5" style="text-align:center;">Tanggal Awal</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select style="font-size:10px;"  name="ftgl">
                                        <option selected="selected" value="">Tgl</option>
											<?php for($i=1; $i<32; $i++):?>
													<option value="<?php echo $i;?>"><?php echo (strlen($i)<2)?'0'.$i:$i?></option>
											<?php endfor;?>
                                        </select>
                                    </td>
                                    <td> - </td>
                                    <td>
                                        <select style="font-size:10px; "  name="fbln">
                                        <option selected="selected" value="">Bulan</option>
										<?php for($t=1; $t<=count($bln); $t++):?>
													<option value="<?php echo $t;?>"><?php echo $bln[$t]?></option>
										<?php endfor;?>	
                                        </select>
                                    </td>
                                    <td> - </td>
                                    <td>
                                        <select style="font-size:10px; " name="fthn">
                                        <option selected="selected" value="">Tahun</option>
										<?php for($u=$thn; $u<$thn+10; $u++):?>
												<option value="<?php echo $u;?>"><?php echo $u?></option>
										<?php endfor;?>	
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>      
                        <table style=" margin-left: 150px; margin-top: 10px; float:left; ">
                            <thead>
                                <tr>
                                    <td colspan="5" style="text-align:center;">Tanggal Akhir</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select style="font-size:10px; " name="ftgl2">
                                        <option selected="selected" value="" >Tgl</option>
											<?php for($i2=1; $i2<32; $i2++):?>
													<option value="<?php echo $i2;?>"><?php echo (strlen($i2)<2)?'0'.$i2:$i2?></option>
											<?php endfor;?>
                                        </select>
                                    </td>
                                    <td> - </td>
                                    <td>
                                        <select style="font-size:10px; " name="fbln2">
                                        <option selected="selected" value="" >Bulan</option>
                                        <?php for($t2=1; $t2<=count($bln); $t2++):?>
													<option value="<?php echo $t2;?>"><?php echo $bln[$t2]?></option>
										<?php endfor;?>
                                        </select>
                                    </td>
                                    <td> - </td>
                                    <td>
                                        <select style="font-size:10px; " name="fthn2">
                                        <option selected="selected" value="">Tahun</option>
                                        <?php for($u2=$thn; $u2<$thn+10; $u2++):?>
												<option value="<?php echo $u2;?>"><?php echo $u2?></option>
										<?php endfor;?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
						<input id="simpan" type="submit" value="simpan"/>
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