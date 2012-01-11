
	<div class="clear"></div>
    <div id="" class="content">
	<h1>Helpdesk</h1>
        
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
                    <div style="float: left;">
                        <form id="cari_unit" action="<?php echo site_url('/admin/helpdesk/search') ?>" method="post">
							<table>
								<tr>
									<td>
									Cari Berdasarkan
									</td>
									<td>
										<?php echo form_dropdown('fcari', $pilihan, $cari);?>
									</td>
									<td>
									</td>
								</tr>
								<tr>
									<td>
									Keyword
									</td>
									<td>
										<input type="text" value="<?php echo $keyword;?>" placeholder="Keyword" name="fkeyword" id="teks-cari" />
										
									</td>
									<td>
										<input class="button blue-pill" type="submit" value="Cari Helpdesk" />
									</td>
								</tr>
							</table>
                            
                        </form>
                    </div>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th style="width: 20px">No</th>
                            <th style="width: 30px">Tanggal</th>
                            <th style="width: 50px">No. Tiket</th>
                            <th style="width: 100px">Nama Satker</th>
                            <th>Pertanyaan</th>
                            <th style="width: 20px">Status</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php $i = $nomor +1; foreach ($result as $tiket): ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $tiket->tanggal ?></td>
                            <td><?php echo $tiket->no_tiket_helpdesk ?></td>
                            <td><?php echo $tiket->nama_satker ?></td>
                            <td><?php echo $tiket->pertanyaan ?></td>
                            <td><?php echo $tiket->status ?></td>
                            
                        </tr>
                        <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
                <div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
            </div>
    </div>

<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>