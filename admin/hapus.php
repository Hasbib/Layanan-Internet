<?php
require('session.php');
$limamenit = time() + 300;

			include 'koneksi.php'; //menghubungkan ke file koneksi untuk ke database
			$id = $_GET['id']; //menampung id

			//query hapus
			$datas = mysqli_query($koneksi, "delete from pendaftaran where id ='$id'") or die(mysqli_error($koneksi));

			//alert dan redirect ke index.php
			echo "<script>alert('data berhasil dihapus.');window.location='data.php';</script>";

	?>