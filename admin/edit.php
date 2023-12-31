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
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  h2 {
    color: #444;
  }

  form {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
    margin: 50px auto;
    max-width: 800px;
    padding: 20px;
  }

  input[type="text"],
  input[type="password"],
  input[type="file"],
  select,
  textarea {
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
    margin-bottom: 10px;
    padding: 5px;
    width: 100%;
  }

  input[type="submit"],
  input[type="reset"] {
    background-color: #4CAF50;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
    padding: 10px 20px;
  }

  input[type="submit"]:hover,
  input[type="reset"]:hover {
    background-color: #3e8e41;
  }

  table {
    margin: 20px auto;
    width: 100%;
  }

  th,
  td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    vertical-align: top;
  }

  th {
    background-color: #4CAF50;
    color: #fff;
  }

  button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    background-color: #0482ea;
    color: white;
    border: none;
    border-radius: 4px;
  }
</style>
<body>
  <div class="card-body">
    <h2 align="center">FORM PEMESANAN LAYANAN INTERNET WIKIKU</h2>
    <form action="" method="post" role="form">
      <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
      <table align="center">

        <?php
        include('koneksi.php');

        $id = $_GET['id']; //mengambil id barang yang ingin diubah
        
        //menampilkan barang berdasarkan id
        $data = mysqli_query($koneksi, "select * from pendaftaran where id = '$id'");
        $row = mysqli_fetch_assoc($data);

        ?>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama" required="" value="<?= $row['nama']; ?>"></td>
        </tr>
        <!-- ini digunakan untuk menampung id yang ingin diubah -->
        <input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
        <tr>
          <td>Phone</td>
          <td><input type="text" name="nomor" pattern="[0-9]+" title="Hanya terdiri dari angka" required=""
              value="<?= $row['nomor']; ?>"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="email" size="15" required="" value="<?= $row['email']; ?>"></td>
        </tr>
        <tr>
          <td>Jenis Pesanan</td>
          <td>
            <select name="paket" id="paket" required>
              <option disabled hidden value="">-- Pilih Layanan --</option>
              <option value="Paket JITU 1 - 1P" <?php if (($row['paket']) == "Paket JITU 1 - 1P") {
                echo " selected";
              } ?>>Paket JITU 1 - 1P</option>
              <option value="Paket JITU 1 - 2P" <?php if (($row['paket']) == "Paket JITU 1 - 2P") {
                echo " selected";
              } ?>>Paket JITU 1 - 2P</option>
              <option value="Paket JITU 1 - 3P" <?php if (($row['paket']) == "Paket JITU 1 - 3P") {
                echo " selected";
              } ?>>Paket JITU 1 - 3P</option>
              <option value="Paket JITU 1 - 4P" <?php if (($row['paket']) == "Paket JITU 1 - 4P") {
                echo " selected";
              } ?>>Paket JITU 1 - 4P</option>
              <option value="Promo Spesial WifiKu" <?php if (($row['paket']) == "Promo Spesial WifiKu") {
                echo " selected";
              } ?>>Promo Spesial Wikiku</option>
              <option value="IndiHome 3P Streaming Netflix Disney - Basic" <?php if (($row['paket']) == "IndiHome 3P Streaming Netflix Disney - Basic") {
                echo " selected";
              } ?>>Wikiku 3P Streaming Netflix Disney - Basic
              </option>
              <option value="IndiHome Gamer 2022 2P (Inet + Phone)" <?php if (($row['paket']) == "IndiHome Gamer 2022 2P (Inet + Phone)") {
                echo " selected";
              } ?>>Wikiku Gamer 2022 2P (Inet + Phone)</option>
              <option value="IndiHome Gamer 2022 2P (Inet + Phone)" <?php if (($row['paket']) == "IndiHome Gamer 2022 2P (Inet + Phone)") {
                echo " selected";
              } ?>>Wikiku Gamer 2022 2P (Inet + Phone)</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Alamat </td>
          <td><textarea name="alamat"><?= $row['alamat']; ?></textarea></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td><input type="date" id="tanggal" name="tanggal" value="tanggal" <?php if (($row['tanggal']) == "tanggal") {
            echo " selected";
          } ?>></td>
        </tr>
        <tr>
          <td>Foto </td>
          <td><input type="file" name="foto"></td>
        <button type="submit" name="submit" value="simpan">Update Data</button>
    </form>

    <?php
    //jika klik tombol submit maka akan melakukan perubahan
    if (isset($_POST['submit'])) {
      $nama = $_POST['nama'];
      $nomor = $_POST['nomor'];
      $email = $_POST['email'];
      $paket = $_POST['paket'];
      $alamat = $_POST['alamat'];
      $tanggal = $_POST['tanggal'];
      $foto = $_POST['foto'];

      // query mengubah data
      mysqli_query($koneksi, "UPDATE pendaftaran SET nama='$nama', nomor='$nomor',email='$email', paket='$paket' ,alamat='$alamat',tanggal='$tanggal',foto='$foto' WHERE id='$id'") or die(mysqli_error($koneksi));

      //redirect ke halaman index.php
      echo "<script>alert('data berhasil diupdate.');window.location='data.php';</script>";
    }
    ?>
  </div>
  </div>
  </div>
  <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>