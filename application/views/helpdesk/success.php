<!doctype html>
<html>
<head>
    <title>Sukses</title>
    <meta http-equiv="refresh" content="<?php echo $time ?>; url=<?php echo $url ?>">
    <link rel="shortcut icon" href="<?php echo base_url() . 'images/icon.jpg';?>"/>
    <style type="text/css">@import url("<?php echo base_url() . 'css/admin-style.css'; ?>");</style>
</head>
<body>
<div class="success" style="width: 500px; margin: 100px auto; text-align: center">
    <h2><?php echo $message ?></h2><br/>
    Halaman ini akan dipindah secara otomatis dalam <?php echo $time ?> detik. Jika tidak, <a href="<?php echo $url ?>" style="color: gold">klik disini</a><br/>
</div>
</body>
</html>
