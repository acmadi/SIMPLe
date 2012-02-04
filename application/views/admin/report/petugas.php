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



<ul id="navxxx" style="display:none">
    <li><a href="#tab1">Report petugas CS hari ini</a></li>
</ul>
<div class="clear"></div>
<div class="content" id="kontenxxx">
    <h1>Report petugas CS hari ini</h1>
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
    <div style="" id="tab1" class="tab_konten">
        <div class="table"> 
            <div id="head">
                
                
            </div>
            <div id="tail">               
       			<table id="tableOne" class="yui" style="margin:20px 0px 10px 0px; padding-right:30px; text-align:left;">   
                    <thead>
                        <tr>            		    
                            <th class="short">No</th>
                            <th>Nama</th>
                            <th>Hak Akses K/L</th>
                            <th>Status Online</th>
                        </tr>
                    </thead>
                    <tbody>

					<?php $i = 1;foreach($result as $d): ?>
                        <tr>
                            <td class="short"><?php echo $i++?></td>
                            <td><?php echo $d->nama?></td>
                            <td><?php echo $d->nama_lavel?></td>
                            <td><?php echo ($d->jml)?'aktif':'tidak aktif';?>
							
							</td>
                            
                        </tr>
					<?php endforeach; ?>                     
                    </tbody>
                </table>
            </div>
            <div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
        </div>
    </div>
    
    
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript">
    $(function() {
        $('#teks-cari').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('/admin/report_petugas/cari') ?>",
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