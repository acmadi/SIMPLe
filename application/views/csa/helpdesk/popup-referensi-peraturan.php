<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<style type="text/css">
	body{
		margin:0 auto;
	}
	#wrapper{
		width:750px;
		padding:20px;
	}
	p{
		margin:-11px 0 0 10px;
		position:absolute;
		padding:0 5px;
		background:#fff;
	}
	.line{
		border: 1px solid #999; padding: 13px 30px 13px 13px; margin:0 auto;width:93%;
	}
	.line p{
		width:650px;
		height:150px;
		line-height:1.7em;
	}
	#check{
		margin:20px 15px;
		clear:both;
	}
	.tombol input{
		padding:0 8px 3px 8px;
		font-size:12px;
		height:24px;
		width:80px;
		margin:20px 5px;
	}
	.button{background-image: linear-gradient(left , rgb(109,181,232) 16%, rgb(194,217,242) 58%, rgb(112,172,235) 97%);
	background-image: -o-linear-gradient(left , rgb(109,181,232) 16%, rgb(194,217,242) 58%, rgb(112,172,235) 97%);
	background-image: -moz-linear-gradient(left , rgb(109,181,232) 16%, rgb(194,217,242) 58%, rgb(112,172,235) 97%);
	background-image: -webkit-linear-gradient(left , rgb(109,181,232) 16%, rgb(194,217,242) 58%, rgb(112,172,235) 97%);
	background-image: -ms-linear-gradient(left , rgb(109,181,232) 16%, rgb(194,217,242) 58%, rgb(112,172,235) 97%);
	
	background-image: -webkit-gradient(
		linear,
		left top,
		right top,
		color-stop(0.16, rgb(109,181,232)),
		color-stop(0.58, rgb(194,217,242)),
		color-stop(0.97, rgb(112,172,235))
	);
	}
	</style>
</head>
<body>
<div id="wrapper">
	<p>Referensi Peraturan</p>
	<div class="line"><br />
    	<div style="overflow:auto; overflow-x:hidden; min-height:250px; ">
        <p>Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... Penjelasan... </p>
        </div>
	</div>
    <input type="checkbox" /> Problem Belum Terselesaikan / Tidak ada dalam penjelasan knowledgebase<br /><br />
    <div style="float:right">
        <input class="button" type="button" value="Batal" onclick="window.close();" style="float:right;margin-right:10px;"/>
        <input class="button" type="submit" value="Jawab" onclick="jawab()" style="float:right;margin-right:10px;"/>
        <input class="button" type="submit"  value="Eskalasi" onclick='return eskalasiPopup()' style="float:right;margin-right:10px; "/>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script> 

<script type="text/javascript">
	function jawab()
	{
		alert("Terimakasih. Jawaban anda sudah terkirim.");
		window.close();
	}
</script>