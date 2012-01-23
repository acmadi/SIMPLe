
    <!--
    <ul id="nav">
        <li><a href="#tab1" class="active">Isi Identitas SatKer</a></li>
    </ul>-->
    <div class="clear"></div>
    <div id="konten">
        <h3>Identitas Satker</h3>
        <br/><br/>
        <div style="display: none; font-size:10px" id="tab1" class="tab_konten">
        	Tanggal : 23 November 2011<br /><br />
            <span style="float:right; position:absolute; padding-left: 500px; margin-top: -37px">
            	<b>No Ticket : <?php echo $no_tiket?></b>
            </span>
        	<div class="table">
                <?php echo form_open('pengaduan/dashboard/form') ?>
                    <table cellspacing="5">
						<tr>
                        	<td width="150">Kode Satker</td>
                            <td><input id="id_satker" name="id_satker" type="text" size="30" value=""></td>
                        </tr>
                        <tr>
                        	<td width="150">Nama Satker</td>
                            <td><input id="nama_satker" type="text" size="30" value="" disabled="disabled"/>
                                <span id="nama_status"></span>
                            </td>
                        </tr>
                        <!--<div style="border: 1px solid black; height: 220px; position: absolute; width: 45%; margin: 70px 15px">-->
                        <tr>
                        	<td colspan="2"><b style="font-size: 120%">Identitas Petugas Satker</b></td>
                        </tr>

                        <tr>
                        	<td width="150">Nama Petugas</td>
                            <td>
                            <select id="id_petugas_satker" name="id_petugas_satker">
                            <?php foreach($petugas as $petugas): ?>
                            <option value="<?php echo $petugas->id_petugas_satker ?>"> <?php
                            echo $petugas->nama_petugas ?> </option>
                            <?php endforeach; ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                        	<td width="150">Jabatan Petugas</td>
                            <td><input id="jabatan" type="text" size="30" readonly="readonly" ></td>
                        </tr>
                        <tr>
                        	<td width="150">No. Hp</td>
                            <td><input id="no_hp" type="text" size="30" readonly="readonly" ></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <div class="warning">
                            Programmer's note: Dua input di bawah ini gak ada di database.
                            </div>
                            </td>
                        </tr>
                        <tr>
                        	<td width="150">No. Kantor</td>
                            <td><input type="text" size="30" readonly="readonly" ></td>
                        </tr>
                        <tr>
                        	<td width="150">E-mail</td>
                            <td><input type="text" size="30" readonly="readonly" ></td>
                        </tr>
                        </div>
                     	<tr>
                        	<td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                        <td colspan="2" align="right">
                        	<!--
                            <form action="helpdesk" method="post" id="helpdesk">
                            <input type="submit" value="Help Desk" style="width:105px; height:26px; font-size:10px;">
                            </form>
                            -->
                            <input type="submit" value="Saluran Pengaduan" style="width:105px; height:26px; font-size:10px;">
                            <input type="button" value="close" style="width:105px; height:26px; font-size:10px;">
                    	</td>
                        </tr>
                    </table>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>