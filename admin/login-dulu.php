<!DOCTYPE html>
<html lang="en">

<head>
	<title>Perlu Login!</title>
    <link href="../assets/gambar/title.jpeg" rel="icon">
</head>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
        }

        .profile-image-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 30px;
        }

        h2, p {
            color: #343a40;
        }

        a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
    <body>
        <div class="container">
            <img src="../assets/gambar/logindulu.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" alt="profile">
            <div id="notfound">
                <div class="notfound">
                    <h2>Anda belum login!</h2>
                    <p>Untuk melanjutkan, Anda harus login terlebih dahulu.</p>
                    <a href="login.php">Login</a>
                </div>
            </div>
        </div>
    </body>
</html>
