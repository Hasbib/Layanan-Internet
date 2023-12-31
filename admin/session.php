<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login-dulu.php");
    exit;
} else {
    if (isset($_COOKIE['KunjunganTerakhir'])) {
        include('koneksi.php');
        $username = $_SESSION['username'];
        $users = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
        $get = mysqli_fetch_assoc($users);
        $visit = $_COOKIE['KunjunganTerakhir'];
    } else {
        echo "Anda sudah 5 menit lebih tidak mengunjungi web ini <br>";
        unset($_SESSION['username']);
        echo "Silakan Login kembali di halaman <a href=login.php>Login</a>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .header {
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
            text-transform: capitalize;
            font-family: Arial, sans-serif;
            position: relative;
        }

        .logout-box {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #f2f2f2;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        .logout-box:hover {
            background-color: white;
        }

        .logout-box a {
            color: #ff0000;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="header">
        Kunjungan Anda terakhir pada -
        <?php echo $visit; ?>, Anda login sebagai
        <?php echo $get['nama']; ?>
        <div class="logout-box">
            <a href="logout.php" onclick="return confirm('Anda yakin ingin Logout?');"
                class="logout-link">Logout</a>
        </div>
    </div>
</body>

</html>