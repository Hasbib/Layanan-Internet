<?php
require('session.php');
$limamenit = time() + 300;
?>
<!DOCTYPE html>
<html>
<head>
    <title>WIKIKU | Internet Murah</title>
    <link href="../assets/gambar/title.jpeg" rel="icon">
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        h4 {
            margin-top: 30px;
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        table td:first-child {
            font-weight: bold;
            width: 150px;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px auto;
        }
        .button-container {
            margin-top: 30px;
            text-align: center;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #555;
        }
    </style>
<body>
    <div class="container">
        <h2>Terima Kasih Telah Mendaftar WIKIKU</h2>
        <h4 align="left">Detail Data Pendaftar</h4>
        <?php
            include('koneksi.php');
            $id = $_GET['id']; //mengambil id barang yang ingin diubah

            //menampilkan barang berdasarkan id
            $data = mysqli_query($koneksi, "select * from pendaftaran where id = '$id'");
            $row = mysqli_fetch_assoc($data);
            ?>
            <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>: <?= $row['nama']; ?></td>
            </tr>
            <tr>
                <td>Nomor Handphone</td>
                <td>: <?= $row['nomor']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: <?= $row['email']; ?></td>
            </tr>
            <tr>
                <td>Jenis Pesanan</td>
                <td>: <?= $row['paket']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= $row['alamat']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td>: <?= $row['tanggal']; ?></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td colspan="2">
                    <img src="../form/uploads/<?= $row['foto']; ?>" alt="Foto" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
                </td>
            </tr>
        </table>
        <?php
            if (isset($_POST['input'])) {
            $nama = $_POST['nama'];
            $nomor = $_POST['nomor'];
            $email = $_POST['email'];
            $paket = $_POST['paket'];
            $alamat = $_POST['alamat'];
            $tanggal = $_POST['tanggal'];
            $foto = $_FILES['foto']['name'];

            //query mengubah barang
            mysqli_query($koneksi, "update pendaftaran set nama='$nama', nomor='$nomor', email='$email', paket='$paket', alamat='$alamat', foto='$foto' where id ='$id'") or die(mysqli_error($koneksi));

            //redirect ke halaman index.php
            echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
        }
        ?>

        <div class="button-container">
            <button type="submit" name="input" onclick="location.href='data.php'">KEMBALI</button>
        </div>
    </div>
</body>
</html>
