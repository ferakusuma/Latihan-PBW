<?php
    require 'function.php';
    $koneksi = mysqli_connect("localhost:3307","root", "","webkucing");

    if(isset($_POST["submit"])) 
    {
        tambahDataKucing($_POST);

        if(mysqli_affected_rows($koneksi)> 0) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'datakucing.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'tambahdata.php';
                  </script>";
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kucing</title>
</head>
<body>
    <h1>Tambah Data Kucing</h1>

    <form action="" method="post">
        <label for="Nama">Nama:</label>
        <input type="text" name="Nama" id="Nama" placeholder="*Nama Lengkap" required /><br>

        <label for="jenis">Jenis:</label>
        <input type="text" name="jenis" id="jenis" required /><br>

        <label for="Gender">Gender:</label>
        <input type="text" name="Gender" id="gender" /><br>

        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>