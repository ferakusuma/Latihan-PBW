<?php
require 'function.php';

if (isset($_POST["submit"])) {
    if (tambahDataKucing($_POST) > 0) {
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
    <title>Tambah Data Kucing</title>
    <link rel="stylesheet" href="datakucing.css">
</head>
<body>
    <h1 class="center-title">Tambah Data Kucing</h1>

<form action="" method="post" enctype="multipart/form-data" class="form-cute">
    <label for="Nama">Nama:</label>
    <input type="text" name="Nama" id="Nama" required />

    <label for="jenis">Jenis:</label>
    <input type="text" name="jenis" id="jenis" required />

    <label for="Gender">Gender:</label>
    <input type="text" name="Gender" id="gender" />

    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto" />

    <button type="submit" name="submit" class="btn-cute">Tambah Data</button>
</form>

</body>
</html>
