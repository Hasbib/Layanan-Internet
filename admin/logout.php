<?php
session_start();
unset($_SESSION['username']);
echo '<script language="javascript">
      window.alert("Berhasil Logout!\nAnda akan kembali ke halaman utama");
      window.location.href="login-dulu.php";
      </script>';
