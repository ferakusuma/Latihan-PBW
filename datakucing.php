<?php
    require 'function.php';

    $query = "SELECT * FROM kucing";

    $rows = query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head
    <meta charset="UTF-8">
    <title>Data Kucing</title>
</head>
<body>
    <h1>Data Kucing</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Gender</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($rows as $kcg) { ?>
        <tr>
            <td><?= $i ?></td>
            <td><img src="/Latihan-PBW/img/<?= urlencode($kcg['foto']) ?>" width="80"></td>
            <td><?= $kcg["Nama"] ?></td>
            <td><?= $kcg["jenis"] ?></td>
            <td><?= $kcg["gender"] ?></td>
        </tr>
        <?php $i++; } ?>
    </table>
</body>
</html>
