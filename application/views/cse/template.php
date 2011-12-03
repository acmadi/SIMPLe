<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title><?php echo isset($title) ? $title : ''; ?></title>
<link rel="shortcut icon" href="<?php echo base_url().'images/icon.jpg';?>" />
<style type="text/css">@import url("<?php echo base_url() . 'css/style.css'; ?>");</style>

<!--TABLE JQUERY-->
<style type="text/css">@import url("<?php echo base_url() . 'css/table.css'; ?>");</style>
<!--POP UP-->
<style type="text/css">@import url("<?php echo base_url() . 'css/pop-up.css'; ?>");</style>

<!--TABS--GANTI MODEL EXTJS ! :) -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tab1').fadeIn('slow'); //tab pertama ditampilkan
    $('ul#nav li a').click(function() { // jika link tab di klik
        $('ul#nav li a').removeClass('active'); //menghilangkan class active (yang tampil)
        $(this).addClass("active"); // menambahkan class active pada link yang diklik
        $('.tab_konten').hide(); // menutup semua konten tab
        var aktif = $(this).attr('href'); // mencari mana tab yang harus ditampilkan
        $(aktif).fadeIn('slow'); // tab yang dipilih, ditampilkan
        return false;
    });

});
</script>

<!--TABLE JQUERY-->
    <!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.2.6.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wjb.selectallrows.js"></script>
    <script type="text/javascript">

        var petugas = [];

        $(document).ready(function() {
            $("#tableOne thead tr th:first input:checkbox").click(function() {
                var checkedStatus = this.checked;
                $("#tableOne tbody tr td:first-child input:checkbox").each(function() {
                    this.checked = checkedStatus;
                });
            });
            
            $("#tableTwo").selectAllRows();

            $("#tableThree").selectAllRows({ column: 'last' });

            $("#tableFour").selectAllRows({
                column: '2',
                selectTip: 'Select All Students',
                unselectTip: 'Un-Select All Students'
                })
                .css("border-width", "10px");
            

            function update_petugas(){
                id_petugas = $('#id_petugas_satker').val();
                $('#jabatan').attr('value', petugas[id_petugas].jabatan);
                $('#no_hp').attr('value', petugas[id_petugas].no_hp);
            }
            // autocomplete
            $('#id_satker').keyup(function(){
                if(this.value.length >= 6){
                    kode = this.value;

                    $.get('<?php echo base_url() . index_page() ?>/cse/ajax/get_nama_satker/' + kode, 
                    function(data) {
                        if (data != 'notfound'){
                            $('#nama_satker').attr('value', data);
                            $('#nama_status').html('Satker ditemukan');

                        } else {
                            $('#nama_satker').attr('value', '');
                            $('#nama_status').html('Satker tidak ditemukan');
                        }
                    });

                    $.get('<?php echo base_url() . index_page() ?>/cse/ajax/get_petugas_satker/' + kode, 
                    function(data) {
                        if (data != 'notfound'){
                            pilihan = '';
                            for(i=0; i < data.petugas.length; i++){

                                id_petugas = data.petugas[i].id_petugas_satker;
                                petugas[id_petugas] = new Object();
                                petugas[id_petugas].jabatan = 
                                    data.petugas[i].jabatan_petugas;
                                petugas[id_petugas].no_hp = 
                                    data.petugas[i].no_hp;
                                
                                pilihan = pilihan + 
                                '<option value="' + data.petugas[i].id_petugas_satker + '">' + 
                                data.petugas[i].nama_petugas + 
                                '</option>';

                                update_petugas();
                            }

                            $('#id_petugas_satker').html(pilihan);
                        } else {
                            
                        }
                    });
                }
            });
            
            $('#id_petugas_satker').change(function(){
                update_petugas();
            })
            
        });
    </script>


</head>
<body>
<div id="wrapper">
	<div id="header"></div>
    <div id="navbar"><?php $this->load->view('navbar_cse'); ?></div>
    <div id="container">
    	<div id="content"><?php 
        if (isset($content_html)) :
            echo $content_html; 
        else :
            $this->load->view($content); 
        endif;

        ?></div>
    </div>
    <div id="footer"><?php $this->load->view('footer'); ?></div>
</div>
</body>
</html>






