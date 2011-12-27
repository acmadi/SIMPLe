	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.4.2.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.ui.core.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.ui.widget.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.ui.position.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.ui.autocomplete.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() . 'css/ui-lightness/jquery-ui-1.8.16.custom.css';?>"/>
<style type="text/css">
    .ui-autocomplete {
        max-height: 300px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding to account for vertical scrollbar */
        padding-right: 20px;
    }
</style>
<ul id="nav">
    <li><a href="#tab1" class="active">Manajemen Unit</a></li>
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
                    <div style="float: left;">
                        <a class="button blue-pill" href="<?php echo site_url('/admin/man_unit_tambah') ?>">Tambah</a>
                    </div>

                    <div style="float: right;">
                        <form id="cari_unit" action="<?php echo site_url('/admin/man_unit_cari') ?>" method="post">
                            Kode Unit: <input type="text" value="" placeholder="Pencarian kode unit" name="fcari" id="teks-cari" />
                                <input class="button blue-pill" type="submit" value="Cari Unit" />
                        </form>
                    </div>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th>Kode Unit</th>
                            <th>Nama Unit</th>
                            <th class="action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php foreach ($result as $unit): ?>
                        <tr>
                            <td><?php echo $unit->kode_unit ?></td>
                            <td><?php echo $unit->nama_unit ?></td>
                            <td class="action">
                                <a href="<?php echo site_url('/admin/man_unit_ubah/index/' . $unit->id_unit_satker) ?>">
                                    <img src="<?php echo base_url('images/edit.png') ?>" />
                                </a>
                                <a href="<?php echo site_url('/admin/man_unit/delete/' . $unit->id_unit_satker) ?>">
                                    <img src="<?php echo base_url('images/delete.png') ?>" />
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
                <div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
            </div>
        </div>
<script type="text/javascript">
    $(function() {
        $('#teks-cari').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('/admin/man_unit/cari') ?>",
                    data: {
                        term: request.term
                    },

                    dataType: 'json',

                    success: function(data) {
                        response(data);
                    }
                })
            },
            delay: 500,
            minLength: 1
        });
    });
</script>