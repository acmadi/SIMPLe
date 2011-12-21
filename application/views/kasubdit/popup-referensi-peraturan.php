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
	.line textarea{
		width:710px;
		height:200px;
		line-height:1.7em;
		overflow:scroll;
		overflow-x:hidden;
	}
	#check{
		margin:20px 15px;
		clear:both;
	}
	.tombol{
		float:right;
	}
	.tombol input{
		padding:0 8px 3px 8px;
		font-size:12px;
		height:24px;
		width:80px;
		margin:20px 5px;
	}
	</style>
</head>
<body>
<div id="wrapper">
	<p>Deskripsi Peraturan</p>
	<div class="line">
		<textarea>
			Peraturan
			peraturan
			peraturan
		</textarea>
	</div>
	<input type="checkbox" name="check" id="check" / >Problem belum terselesaikan / tidak ada dalam penjelasan Knowledge Base
	<div style="clear:both;"></div>
	<div class="tombol">
		<input type="submit" value="Batal">
		<input type="submit" value="Eskalasi">
		<input type="submit" value="Jawab" onclick="return confirm('Proses sudah dilaksanakan \n Apakah ada pertanyaan baru?');">
	</div>
	<div style="clear:both;"></div>
</div>
</body>
</html>