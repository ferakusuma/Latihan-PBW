<?php
require 'function.php';

if (isset($_POST["register"])) {
    $message = register($_POST);

    if ($message === "Register Berhasil!") {
        echo "<script>
                alert('{$message}');
                document.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('{$message}');
                document.location.href = 'register.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Kucing</title>
    <link rel="stylesheet" href="datakucing.css"> <!-- pastikan file ini sama seperti di tambahdata.php -->
</head>
<body>
  <div class="wrapper-center">
    <h1 class="center-title">Register Akun</h1>
    <form action="" method="post" enctype="multipart/form-data" class="form-cute">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required />

      <label for="password1">Password:</label>
      <input type="password" name="password1" id="password1" required />

      <label for="password2">Konfirmasi Password:</label>
      <input type="password" name="password2" id="password2" required />

      <button type="submit" name="register" class="btn-cute">Register</button>
    </form>
  </div>
</body>


</html>

<style>
/* Reset body agar isi pas di tengah layar */
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  justify-content: center; /* tengah horizontal */
  align-items: center;     /* tengah vertikal */
  background: linear-gradient(to bottom, #ffe6f0, #fff0f5);
  font-family: 'Comic Sans MS', cursive;
}

/* Bungkus semua ke dalam satu kontainer */
.wrapper-center {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #fdddf4;
  padding: 40px;
  border-radius: 25px;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

/* Judul */
.center-title {
  font-size: 24px;
  color: darkmagenta;
  margin-bottom: 20px;
}

/* Form cute */
.form-cute {
  width: 100%;
  max-width: 350px;
  background-color: #ffeef8;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

/* Label dan input */
.form-cute label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
  color: deeppink;
}

.form-cute input[type="text"],
.form-cute input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 2px solid hotpink;
  border-radius: 10px;
  background-color: #fff0f5;
  font-size: 14px;
  box-sizing: border-box;
}

/* Tombol */
.btn-cute {
  background-color: pink;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 10px;
  font-size: 14px;
  font-weight: bold;
  box-shadow: 3px 3px 8px rgba(0,0,0,0.1);
  cursor: pointer;
}

.btn-cute:hover {
  background-color: hotpink;
}

</style>
