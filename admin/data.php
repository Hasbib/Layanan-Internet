<?php 
require('session.php');
$limamenit = time() + 300;
?>
<!DOCTYPE html>
<html>
<head>
	<title>WIKIKU | Internet Murah</title>
	<link href="../assets/gambar/title.jpeg" rel="icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<style>
  .btn {
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
  }
  .btn-orange {
    background-color: orange;
    color: #fff;
  }
  .btn-orange:focus,
  .btn-orange:active,
  .btn-orange:hover {
    background-color: orange;
    color: #fff;
  }
</style>
<body>
	<div class="container my-5">
		<h2>DATABASE PEMESAN WIKIKU</h2>
		<a class="btn btn-success" href="../form/form2.php" role="button">Tambah</a>
		<a class="btn btn-dark"   href="registrasi.php" role="button">Tambah Admin</a>
		<a class="btn btn-orange" href="cetakpdf.php" role="button">Cetak Pemesan</a>

            <table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Nomor</th>
						<th>Paket</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include('koneksi.php'); //memanggil file koneksi
						$datas = mysqli_query($koneksi, "select * from pendaftaran") or die(mysqli_error($koneksi));
						//script untuk menampilkan data barang

						$no = 1;//untuk pengurutan nomor

						//melakukan perulangan
						while($row = mysqli_fetch_assoc($datas)) {
					?>	
					<tr>
						<td><?= $no; ?></td>
						<td><?= $row['nama']; //untuk menampilkan nama ?></td>
						<td><?= $row['email']; //untuk menampilkan email ?></td>
						<td><?= $row['nomor']; //untuk menampilkan phone ?></td>
						<td><?= $row['paket']; //untuk menampilkan paket ?></td>
						<td>
							<a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-primary ">Detail</a>
							<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
							<a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
	</div>
	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>