<?php
	include 'koneksi.php';
	error_reporting(0);

$id_router		=$_POST['id_router'];
$lokasi			=$_POST['lokasi'];
$lat			=$_POST['lat'];
$lng			=$_POST['lng'];
$cabang			=$_POST['cabang'];
$ip				=$_POST['ip'];
$keterangan		=$_POST['keterangan'];





$sql=mysql_query("INSERT INTO router (id_router,lokasi,lat,lng,cabang,ip,keterangan) VALUES 
				('','$lokasi','$lat','$lng','$cabang','$ip','$keterangan');");



if ($sql) {
	header('location:http:index.php');
}
else {
	echo "gagal";
}

?>