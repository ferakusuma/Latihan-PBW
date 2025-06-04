<?php
    
    $koneksi = mysqli_connect("localhost:3307","root", "","webkucing");
    

    if(!$koneksi) {
        die("Koneksi gagal!: ".mysqli_connect_error());
    }
    $query = "SELECT * FROM kucing";

    $result = mysqli_query($koneksi, $query);  //objek

    //ambil data (fetch) dari lemari resualt


    $kcg = mysqli_fetch_row($result);
    // mysqli_fetch_assoc()
    // mysqli_fetch_array()
    // mysqli_fetch_object()

    var_dump($kcg);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kucing</title>
</head>
<body>
    <h1>Data Kucing</h1>

    <table border="1" cellspacing="0" cellpadding="10">
         <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Gender</th>
        </tr>
    </table>
</body>
</html>