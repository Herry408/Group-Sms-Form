
<?php
//KONEKSI DATABASE

$host="localhost"; 
$user="root";
$password="";
$database="db_name";

$conf=mysql_connect($host,$user,$password);
mysql_select_db($database,$conf);
//cek koneksi
if($conf){
//echo "Berhasil Terhubung";
}else{
echo "Gagal Terhubung";
}
?>