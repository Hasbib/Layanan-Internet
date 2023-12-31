<!DOCTYPE html>
<html>
<head>
    <title>WIKIKU | Internet Murah</title>
    <link href="assets/gambar/title.jpeg" rel="icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f2f2f2;
        }

        #map {
            height: 400px;
            width: 100%;
        }
        
        iframe {
            width: 100%;
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #555;
            margin-top: 30px;
        }

        p {
            color: #777;
        }

        .contact-info {
            flex-wrap: wrap;
        }

        .contact-info p {
            flex-basis: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
  require('header.php');
?>
</br></br>
    <h1>Hubungi Kami</h1></br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d988.7253982256642!2d110.98209026946492!3d-7.5856896701581515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzUnMDguNSJTIDExMMKwNTgnNTcuOCJF!5e0!3m2!1sid!2sid!4v1686490410955!5m2!1sid!2sid" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </br></br>
    <h2>Alamat</h2>
    <p>Tegari 02/04, Gedong, Karanganyar, Jawa Tengah, Indonesia, Asia Tenggara</p>

    <h2>Informasi Kontak</h2>
    <div class="contact-info">
        <p>Email      : habibshohiburrotib@student.uns.ac.id</p>
        <p>Telepon    : 6285800086454</p>
        <p>Instagram  : btrbhhs_habib</p>
        <p>Facebook   : Habib S</p>
    </div>

    <!-- Memanggil fungsi initMap() saat halaman selesai diload -->
    <script>
        window.onload = function() {
            initMap();
        };
    </script>
      <?php
        require('footer.php');
      ?>
</body>
</html>
