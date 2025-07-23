<?php
require 'function.php';
$error = false;

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $user["password"])) {
            header("Location: datamahasiswa.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | INFORMATIKA</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f0e6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fffaf3;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #4d3e33;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #5e4d42;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d4c5b2;
            border-radius: 6px;
            margin-bottom: 15px;
            background-color: #fff;
            color: #4a4034;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #bfa58a;
            outline: none;
        }

        .remember {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember input[type="checkbox"] {
            margin-right: 8px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #c7a17a;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #a47e5b;
        }

        p {
            text-align: center;
            margin-top: 15px;
            color: #5c4b3a;
        }

        a {
            color: #a47e5b;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>LOGIN</h1>
        <form id="loginForm" action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <div class="remember">
                <input type="checkbox" name="ingat" value="1" id="remember">
                <label for="remember">Ingatkan saya!</label>
            </div>

            <?php if ($error) : ?> 
                <p style="color:red;">Username atau Password salah!</p>
            <?php endif; ?>

            <input type="submit" name="login" value="Login">
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>
</html>