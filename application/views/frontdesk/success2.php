<!doctype html>
<html>
<head>
    <title>Sukses</title>
    <meta http-equiv="refresh" content="10; url=<?php echo site_url('/frontdesk/form_revisi_anggaran')  ?>">
    <link rel="shortcut icon" href="<?php echo base_url() . 'images/icon.jpg';?>"/>
    <style type="text/css">@import url("<?php echo base_url() . 'css/admin-style.css'; ?>");</style>
    <script>
        //window.open('<?php echo $pdf_file?>', '_newtab');
        window.open('<?php echo $pdf_file2?>', '_newtab2');
    </script>
</head>
<body>
<div class="success" style="width: 500px; margin: 100px auto; text-align: center">
    <h2>Data telah dimasukkan</h2><br/>
    Halaman ini akan dipindah secara otomatis dalam 10 detik. Jika tidak, <a href="<?php echo site_url('/frontdesk/form_revisi_anggaran') ?>" style="color: gold">klik disini</a><br/>
</div>
</body>
</html>
