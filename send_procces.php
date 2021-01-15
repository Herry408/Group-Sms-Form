<?php

// skrip memasukkan koneksi.php
include "conf.php";

// mengambil nama inputan dari sms_group.php
$group      = $_POST['group'];
$isi_sms  = $_POST['isi_sms'];

// menampilkan anggota group di tabel pbk
$qry = mysql_query("select * from pbk where GroupID='$group'");
while ($data=mysql_fetch_assoc($qry)) {
	$sms_kirim = mysql_query("Insert into outbox (InsertIntoDB,
	SendingDateTime,DestinationNumber,TextDecoded,SendingTimeOut,
	DeliveryReport,CreatorID) 
	values (sysdate(),sysdate(),'$data[Number]','$isi_sms',sysdate(),
	'yes','system')") ;
	
}

if ($sms_kirim) {   // jika berhasil di simpan
   echo "<script>javascript: alert('SMS Berhasil Dikirim!')</script>";	
   echo "<meta http-equiv='refresh' content='0; url=?tampil=group_tulis'>";
}
else {    // jika belum berhasil di simpan
   echo "<script>javascript: alert('SMS Tidak Berhasil Dikirim!')</script>";	
   echo "<meta http-equiv='refresh' content='1; url=?tampil=group_tulis'>";
}

?>
 