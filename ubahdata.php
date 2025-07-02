<?php
require 'function.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);
$data = query("SELECT * FROM kucing WHERE id = $id");

if (count($data) === 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$kcg = $data[0]; // data tunggal

if (isset($_POST["submit"])) {
    if (ubahDataKucing($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'datakucing.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'datakucing.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Kucing</title>
    <link rel="stylesheet" href="datakucing.css">
</head>
<body>
   <h1 class="center-title">Ubah Data Kucing</h1>

<form action="" method="post" enctype="multipart/form-data" class="form-cute">
    <input type="hidden" name="id" value="<?= $kcg["id"] ?>">

    <label for="Nama">Nama:</label>
    <input type="text" name="Nama" id="Nama" required value="<?= htmlspecialchars($kcg["Nama"]) ?>" />

    <label for="jenis">Jenis:</label>
    <input type="text" name="jenis" id="jenis" required value="<?= htmlspecialchars($kcg["jenis"]) ?>" />

    <label for="Gender">Gender:</label>
    <input type="text" name="Gender" id="Gender" required value="<?= htmlspecialchars($kcg["gender"]) ?>" />

    <label for="foto">Foto (kosongkan jika tidak ingin mengganti):</label>
    <input type="file" name="foto" id="foto" />

    <?php if (!empty($kcg["foto"])): ?>
        <img src="img/<?= htmlspecialchars($kcg["foto"]) ?>" width="100" style="margin-top: 10px; border-radius: 10px;">
    <?php endif; ?>

    <button type="submit" name="submit" class="btn-cute">Ubah Data</button>
</form>

</body>
</html>
