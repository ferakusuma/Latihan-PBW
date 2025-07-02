<?php
require 'function.php';

$query = "SELECT * FROM kucing";
$rows = query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Kucing</title>
    <link rel="stylesheet" href="datakucing.css">
</head>
<body>
    <h1>Data Kucing</h1>
    <a href="tambahdata.php"><button style="margin-bottom: 12px;">Tambah Data Kucing</button></a>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Gender</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($rows as $kcg) {
            $foto = $kcg['foto'];
            if (empty($foto) || !file_exists("img/" . $foto)) {
                $foto = 'default.png'; // gunakan default jika kosong
            }
        ?>
<tr>
    <td><?= $i ?></td>
    <td><img src="img/<?= htmlspecialchars($foto) ?>" width="80"></td>
    <td><?= htmlspecialchars($kcg["Nama"]) ?></td>
    <td><?= htmlspecialchars($kcg["jenis"]) ?></td>
    <td><?= htmlspecialchars($kcg["gender"]) ?></td>
    <td>
        <a href="hapusdata.php?id=<?= $kcg["id"] ?>" class="btn-hapus" onclick="return confirm('Yakinnn??');">Hapus</a>
        <a href="ubahdata.php?id=<?= $kcg["id"] ?>" class="btn-edit">Edit</a>
    </td>
</tr>

        <?php $i++; } ?>
    </table>
</body>
</html>
