<!DOCTYPE html>
<html>
    <head>
        <title>WIKIKU | Internet Murah</title>
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="assets/gambar/title.jpeg" rel="icon">
    </head>
    <body>
        <?php
        require('header.php');
        if (isset($_GET['target'])) {
            $target = $_GET['target'];
        } else {
            $target = 'home';
        }
        switch ($target) {
            case 'home':
        require('home.php');
            break;
        default:
            echo "<p>Halaman tidak ditemukan</p>";
        }
        require('footer.php');
        ?>
    </body>
</html>