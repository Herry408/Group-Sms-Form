<!DOCTYPE html>
<html>
<head>
<title>Group SMS Gammu</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<h2 class="sub-header">Tulis SMS Groups</h2>
<script>
	function jmlsms()
	{
		var string,panjangsms;
		panjangsms = 160
		string = panjangsms-(document.formsms.isi_sms.value.length);
		if(string<0){
			alert("Total Maksimum Panjang SMS: "+panjangsms+"");
			document.formsms.isi_sms.value=document.formsms.isi_sms.value.substring(0,panjangsms);
			string=panjangsms-(document.formsms.isi_sms.value.length);
			document.formsms.hitung.value=string;
		}
		else{
			document.formsms.hitung.value=panjangsms-(document.formsms.isi_sms.value.length);
		}
	}
</script>

<form name="formsms" method="post" action="group_kirim.php" class="form-horizontal" enctype="multipart/form-data">

	<div class="form-group">
		<label class="label-control col-md-2">Nama Group</label>
		<div class="col-md-2">
			
		<?php	// skrip memasukkan koneksi.php
 		include "conf.php" ;
		
		// menampilkan group di tabel pbk_groups
 		echo "
		<select name=group class=form-control>" ;
 		$qry = mysql_query("select * from pbk_groups");
 		while ($data=mysql_fetch_assoc($qry)) {
 		 echo "<option value='$data[ID]'>$data[Name]</option>";
 		 }
 		echo "</select>" ;
 		
 		?>
			</div>
		</div>

<div class="form-group">
		<label class="label-control col-md-2">Tulis Pesan</label>
		<div class="col-md-4">
			<textarea name="isi_sms" cols="80" rows="15" onfocus="jmlsms();" onclick="jmlsms();" onkeydown="jmlsms();"
			onchange="jmlsms();" onkeyup="jmlsms();" class="form-control"></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="label-control col-md-2">Karakter Tersisa</label>
		<div class="col-md-1">
			<input type="text" name="hitung" size="1" maxlength="3" value="160" class="form-control"></div>
	</div>


	
	<div class="form-group">
		<label class="label-control col-md-2"></label>
		<div class="col-md-4">
			<input type="submit" name="edit" value="Kirim" class="btn btn-primary">
			</div>
		</div>
</form>

</body>
</html>