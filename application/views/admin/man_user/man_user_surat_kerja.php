<script type="text/javascript">
    $(function () {
        $('#flevel').chosen().change(function () {
//            var level = $(this).attr('title');
//            console.log($(this).html());
//            console.log(level);
<!--            $.get('--><?php //echo site_url('/admin/man_user_tambah/pilih_departemen') ?><!--' + '/' + level,-->
//                    function (response) {;
//                        response = '<option></option>' + response;
//                        $('#fdepartemen').html(response);
//                        $('#fdepartemen').trigger('liszt:updated');
//                        console.log(response);
//                    })
        });

        $('#fdepartemen').chosen();
    })
</script> 
 <ul id="nav">
        <li><a href="#tab1" class="active">Manajemen User / Surat Kerja</a></li>
    </ul>
    <div class="clear"></div>
    <div id="konten">
    	<div style="display: none;" id="tab1" class="tab_konten">
            <?php generate_notifkasi() ?>
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
                    <form action="<?php echo site_url('admin/man_user_surat_kerja/save')?>" method="post" id="surat_kerja" style="min-height:100px;">
                        <?php echo form_hidden('id',$item->id_user);?>
						 <table id="tableOne" class="yui">
                 
                        <tr>
                            <td>Tanggal mulai</td>
                            <td>:</td>
                            <td><input  name="ftglmulai"  id="datepicker1" value="" type="text"></td>
                        </tr>
                        <tr>
                            <td>Tanggal selesai</td>
                            <td>:</td>
                            <td><input  name="ftglselesai"  id="datepicker2" value="" type="text"></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>:</td>
                            <td>
                                <select name="flevel" id="flevel" class="chzn-single" data-placeholder="Pilih Level" style="width: 500px;">
                                    <option></option>
                                    <?php foreach ($list_level as $a): ?>
                                    <option value="<?php echo $a->id_lavel?>" title="<?php echo $a->id_lavel ?>"><?php echo $a->nama_lavel?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Hak Akses K/L</td>
                            <td>:</td>
                            <td>
                                <select name="fdepartemen" id="fdepartemen" class="chzn-single" data-placeholder="Pilih Departemen" style="width: 500px;">
                                    <option></option>
                                    <?php foreach ($list_unit as $b): ?>
                                    <option value="<?php echo $b->id_unit_satker?>"><?php echo $b->nama_unit?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                    </table>
					<br/>
					<div>
						 <input id="simpan" type="submit" class="button blue-pill" value="simpan"/>
					</div>
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
							<th>Level</th>
							<th>Unit</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $i = 1 ?>
						<?php foreach ($history_maker as $item): ?>
						<tr>
							<td class="short"><?php echo $i++ ?></td>
							<td><?php echo $item->tanggal_mulai ?></td>
							<td><?php echo $item->tanggal_selesai ?></td>
							<td><?php echo $item->nama_lavel ?></td>
							<td><?php echo $item->nama_unit ?></td>
							<td><a title="hapus" href="<?php echo site_url('admin/man_user_surat_kerja/delete/'.$item->id_masa_kerja)?>"  onclick="return yesOrNo()" /><img src="<?php echo base_url(); ?>images/icon_delete.png"/></a></td>
							
						</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				</div><br />
        	</div>
            
    </div>
	
</div>
<link type="text/css" href="<?php echo base_url()?>css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript"> 
			$(document).ready(function(){
				$("#datepicker1").datepicker({ dateFormat: 'dd-mm-yy' });
				$("#datepicker2").datepicker({ dateFormat: 'dd-mm-yy' });
				$("div.ui-datepicker").css('font-size','12px');	
			}); 
</script>