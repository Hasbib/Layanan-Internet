<?php

$server 	= "localhost";
$username	= "id20790865_admin";
$pass		= "HabibS123.";
$db 		= "id20790865_kelompok1"; //sesuaikan nama databasenya
$koneksi = mysqli_connect($server, $username, $pass, $db); //pastikan urutan pemanggilan variabel nya sama.

//untuk cek jika koneksi gagal ke database
if(mysqli_connect_errno()) {
	echo "Koneksi gagal : ".mysqli_connect_error();
}