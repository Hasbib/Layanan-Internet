<!DOCTYPE html>
<html>
<head>
    <title>WIKIKU | Internet Murah</title>
    <link href="../assets/gambar/title.jpeg" rel="icon">
</head>
    <style>
        body {
            background-color: #1530c9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            color: #444;
            margin-top: 0;
            padding-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td {
            padding: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
            line-height: 1.4;
            color: #555;
        }
        table td:first-child {
            font-weight: bold;
            width: 30%;
            background-color: #4CAF50;
            color: #fff;
        }
        table img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            padding: 10px 0;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }
        .button-container button {
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px; /* mengatur spasi atas */
            margin-bottom: 5px; /* mengatur spasi bawah */
        }
        .button-container button:hover {
            background-color: #3e8e41;
        }
        .button-container h4 { 
            text-align: center;
            margin-top: 3px;  /* mengatur spasi atas */
            margin-bottom: 5px;  /* mengatur spasi bawah */
            font-family: "Poppins", Arial, sans-serif;
        }
    </style>
    <body>
        <?php
        include('../admin/koneksi.php'); // memanggil atau menyimpan data yang disimpan pada mysql
        if (isset($_POST['input'])) {
            $nama = $_POST['nama'];
            $nomor = $_POST['nomor'];
            $email = $_POST['email'];
            $paket = $_POST['paket'];
            $alamat = $_POST['alamat'];
            $tanggal= $_POST['tanggal'];
            $foto = $_FILES['foto']['name'];
            $datas = mysqli_query($koneksi, "insert into pendaftaran (nama,nomor,email,paket,alamat,tanggal,foto)values('$nama', '$nomor', '$email', '$paket', '$alamat', '$tanggal', '$foto')") or die(mysqli_error($koneksi));
            $uploaddir = 'uploads/';
            $uploadfile = $uploaddir . $_FILES['foto']['name'];
            $uploadOk = 1;
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            $maxFileSize = 10 * 1024 * 1024; // Maksimun foto (10 MB)
            if ($check !== false) {
                $uploadOk = 1;

            // Cek ukuran file foto
            if ($_FILES['foto']['size'] > $maxFileSize) {
                echo "<script>alert('Size file yang anda masukkan terlalu besar.')</script>";
                $uploadOk = 0;
            }

            // Upload file foto akan menampilkan
            if ($uploadOk) {
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('Data berhasil disimpan.')</script>";
                } else {
                    echo "File gagal diupload<br>";
                }
            } else {
                echo "<script>alert('File bukan gambar!')</script>";
                $uploadOk = 0;
            }
            }
        }
        ?>
        <div class="container">
            <h2>Terima Kasih Telah Mendaftar WIKIKU</h2>
            <h4 align="left">Data Pendaftar</h4>
            <table>
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?php echo $nama ?></td>
                </tr>
                <tr>
                    <td>Nomor Handphone</td>
                    <td><?php echo $nomor ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $email ?></td>
                </tr>
                <tr>
                    <td>Jenis Pesanan</td>
                    <td><?php echo $paket ?></td>
                </tr>
                 <tr>
                    <td>Alamat</td>
                    <td><?php echo $alamat ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pemesanan</td>
                    <td><?php echo $tanggal ?></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="uploads/<?= $_FILES['foto']['name']; ?>"></td>
                </tr>
            </table>
            <div class="button-container">
                <button type="submit" name="input" onclick="location.href='form.php'">KEMBALI KE FORMULIR</button>
                <h4>atau</h4>
                <button type="reset" name="clear" onclick="location.href='../index.php'">KEMBALI KE MENU UTAMA</button>
            </div>
        </div>
    </body>
</html>