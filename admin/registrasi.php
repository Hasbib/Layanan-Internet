<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registrasi Admin</title>
    <link href="../assets/gambar/title.jpeg" rel="icon">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#username').blur(function() {
				
				var username = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'cek.php',
					data: 'username=' + username,
					success: function(data) {
						$('#pesan').html(data);
					}
				})

			});
		});
	</script>
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
                    <h3>Registrasi Admin</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="../assets/gambar/login.jpg"
                            class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" alt="profile">
                    </div>
                </div>
			    <div class="card-body">
				<form action="" method="post" role="form" enctype="multipart/form-data">
                <div class="form-group">
						<input type="text" name="username" id="username" class="form-control" required placeholder="Username">
						<span id="pesan"></span>
					</div>
                    <div class="form-group">
						<input type="text" name="password" id="password" class="form-control" required placeholder="Password">
						<span id="pesan"></span>
					</div>
					<div class="form-group">
						<input type="text" name="nama" id="nama" class="form-control" required placeholder="Nama">
					</div>
					<div class="form-group">
						<input type="text" name="email" id="email" class="form-control" required placeholder="Email">
						<span id="pesan"></span>
					</div>   
                    <button type="submit" class="btn btn-login" name="submit">Registrasi</button>
				</form>
			</div>
		</div>
	</div>
</form>
<?php
    if (isset($_POST['submit'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO users (username,password,nama,email) VALUES (:username, :passwd,:nama,:email)';
        $values = [':username' => $username, ':passwd' => $hash,':nama' => $nama,':email' => $email];
        try {
            $datas = mysqli_query($koneksi, "insert into users (username,password,nama,email)values('$username', '$hash','$nama','$email')") or die(mysqli_error($koneksi));
        } catch (PDOException $e) {
            /* Query error. */
            echo 'Query error.';
            die();
        }
        echo "<script>alert('Berhasil menambah data admin!.');window.location='data.php';</script>";
    }
    ?>
</body>
</html>