<?php

//memulai session
session_start();

if (isset($_SESSION['username'])) {
  header("Location: data.php");
}

require_once "koneksi.php";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $userpass = $_POST['password'];
  $sql = mysqli_query($koneksi, "SELECT username, password, nama FROM users WHERE username = '$username'");
  if ($sql) {
    if (mysqli_num_rows($sql) > 0) {
      list($username, $password, $nama) = mysqli_fetch_array($sql);
      $_SESSION['username'] = $username;
      $_SESSION['nama'] = $nama;
      $limamenit = time() + 300;
      setcookie("KunjunganTerakhir", date("G:i:s - d/m/Y"), $limamenit);
      header("Location: data.php");
    } else {
      echo '<script language="javascript">
                    window.alert("LOGIN GAGAL!\nUsername dan password yang anda masukkan salah, silakan coba lagi");
                    window.location.href="login.php";
                  </script>';
    }
  } else {
    echo 'Query execution failed: ' . mysqli_error($koneksi);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
  <link href="../assets/gambar/title.jpeg" rel="icon">
</head>
<style>
  body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .container {
    width: 400px;
  }

  .card {
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
  }

  .card-header {
    background-color: #343a40;
    color: #fff;
    padding: 20px;
    border-radius: 10px 10px 0 0;
    text-align: center;
  }

  .card-body {
    padding: 20px;
  }

  .profile-image-pic {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    margin: 0 auto;
    display: block;
  }

  .form-control {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    width: 94%;
    margin-bottom: 10px;
  }

  .btn-login {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    width: 100%;
  }

  .btn-login:hover {
    background-color: #0056b3;
  }

  .text-center {
    text-align: center;
  }

  .text-dark {
    color: #343a40;
  }
</style>

<body>
  <form enctype="multipart/form-data" action="" method="post">
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h3>LOGIN ADMIN</h3>
        </div>
        <div class="card-body">
          <div class="text-center">
            <img src="../assets/gambar/login.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
              alt="profile">
          </div>
          <form action="" method="POST">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <button type="submit" class="btn btn-login" name="login">Login</button>

            <p class="text-dark">Default username: usop</p>
            <p class="text-dark">Default password: godusop</p>
          </form>
        </div>
      </div>
    </div>
</body>

</html>