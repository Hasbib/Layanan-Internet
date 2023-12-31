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
    h3 {
        color: #000000;
        margin: 10px;
        background: linear-gradient(to right, red, red) left top no-repeat;
        background-size: 100% 100%;
        display: inline-block;
        padding: 10px;
    }
    h2 {
        color: #444;
    }
    form {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
        margin: 10px auto;
        max-width: 800px;
        padding: 20px;
    }
    input[type="text"],
    input[type="password"],
    input[type="file"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
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
  </style>
  <body>
    <div class="card-body">
      <h3><a href="../index.php">WIKIKU</a></h3>
      <form enctype="multipart/form-data" action=
      "terima.php" method="post">
      <input type="hidden" name="MAX_FILE_SIZE" value=
      "1000000" />
      <table align="center">
        <h2 align="center">FORM PEMESANAN INTERNET WIKIKU</h2>
          <tr>
            <td>Nama Lengkap</td>
            <td><input type="text" name="nama" value="nama anda disini" required/></td>
          </tr>
          <tr>
            <td>Nomor Handphone</td>
            <td><input type="text" name="nomor" required/></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="text" name="email" required/></td>
          </tr>
          <tr>
						<td>Jenis Pesanan</td>
						<td>
							<select name="paket">
								<option>-- Pilih Layanan --</option> 
								<option>Paket JITU 1 - 1P</option>
								<option>Paket JITU 1 - 2P</option> 
								<option>Paket JITU 1 - 3P</option>
                <option>Paket JITU 1 - 4P</option>
                <option>Promo Spesial Wikiku</option>
                <option>Wikiku 3P Streaming Netflix Disney - Basic</option>
                <option>Wikiku Gamer 2022 2P (Inet + Phone)</option>
                <option>Wikiku Gamer 2022 2P (Inet + Phone) </option>
							</select>
						</td>
					</tr>
          <tr>
            <td>Alamat </td>
            <td><textarea name="alamat" value="tulis alamat disini" required></textarea></td>
          </tr>
          <tr>
						<td><label for="tanggal">Tanggal Pemesanan
							<td><input type="date" id="tanggal" name="tanggal" required></td>
							</label>
						</td>
					</tr>
          <tr>
            <td>Foto </td>
            <td><input type="file" name="foto" required/></td>
          </tr>
          <tr>  
            <td></td>
            <td>
              <input type="submit" name="input" value="INPUT" />
              <input type="reset" name="clear" value="CLEAR" />
            </td>
          </tr>
        </table>
      </form>
      <?php
        include('../admin/koneksi.php'); // memanggil atau menyimpan data yang disimpan pada mysql
        // Melakukan pengecekan jika tombol submit diklik maka akan menjalankan perintah simpan di bawah ini
          if (isset($_POST['input'])) {
            // Menampung data dari inputan
            $nama = $_POST['nama'];
            $nomor = $_POST['nomor'];
            $email = $_POST['email'];
            $paket = $_POST['paket'];
            $alamat = $_POST['alamat'];
            $tanggal= $_POST['tanggal'];
            $foto = $_POST['foto']; 
                
            // Query untuk menambahkan barang ke database, pastikan urutannya sesuai dengan tabel yang ada di database
            $query = "INSERT INTO pendaftaran (nama, nomor, email, paket, alamat, tanggal, foto) VALUES ('$nama', '$nomor', '$email', '$paket', '$alamat', '$tanggal', '$foto')";
            $result = mysqli_query($koneksi, $query);
          }
        ?>
  </body>
</html>
