<div class="content">
    <h1>Front Desk</h1>
<?php if ($result->num_rows() > 0): ?>
        <table class="table">
            <thead>
            <tr>
                <th class="no">No</th>
                <th class="short">Tanggal Pengajuan</th>
                <th class="no">Proses (Hari)</th>
                <th>Kementrian</th>
                <th>Eselon</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($result->result() as $value): ?>

            <tr <?php echo (hari_kerja($value->tanggal > 5) ? 'class="red-row"' : '') ?>>
                <td><?php echo $i++ ?></td>
                <td>
                    <?php echo table_tanggal($value->tanggal) ?>
                </td>
                <td>
                    <?php echo hari_kerja($value->tanggal) ?>
                </td>
                <td><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></td>
                <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>
                <td class="action">
					<?php
						$disabled =  $onclick = '';
						$style_button = 'gray-pill';
						if($value->is_active == 2){
							$disabled = 'disabled';
							$style_button = 'blue-pill';
						}

						$level_selected = $this->session->userdata('lavel');
						switch($level_selected){
							case '3':
								$jml_sel = 2;
								break;

							case '6':
								$jml_sel = 3;
								break;

							case '7':
								$jml_sel = 2;
								break;

							default:
								$jml_sel = 1;
								break;
						}
					?>

					<a class="button <?php echo $style_button;?>" href="<?php echo site_url('/frontdesks/diterima/' . $value->no_tiket_frontdesk) ?>">Diterima</a>

					<?php if($level_selected != '7'): ?>
					<input type="button" class="button <?php echo $style_button;?>" onclick="window.location.href='<?php echo site_url('/frontdesks/diteruskan/' . $value->no_tiket_frontdesk); ?>'"
					<?php echo $disabled;?> value="Diteruskan"/>
                    <?php endif; ?>


					<?php if($level_selected == '3'): ?>
						<input type="button" class="button <?php echo $style_button;?>" onclick="window.location.href='<?php echo site_url('/frontdesks/reject/' . $value->no_tiket_frontdesk); ?>'"
						<?php echo $disabled;?> value="Dikembalikan"/>
                    <?php endif; ?>

					<?php if(($level_selected == '7') or ($level_selected == '6')): ?>
					<input type="button" class="button <?php echo $style_button;?>" onclick="window.location.href='<?php echo site_url('/frontdesks/accept/' . $value->no_tiket_frontdesk); ?>'"
					<?php echo $disabled;?> value="Ditetapkan"/>
					<input type="button" class="button <?php echo $style_button;?>" onclick="window.location.href='<?php echo site_url('/frontdesks/reject/' . $value->no_tiket_frontdesk); ?>'"
					<?php echo $disabled;?> value="Ditolak"/>
                    <?php endif; ?>

                </td>
            </tr>
                <?php endforeach ?>
            </tbody>
        </table>


    <br/>
    </div>
    <?php else: ?>
    <div class="notification yellow">
    Tidak ada dokumen
    </div>
    <?php endif ?>
</div>
