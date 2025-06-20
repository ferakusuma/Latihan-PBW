<?php
$koneksi = mysqli_connect("localhost:3307","root", "","webkucing");

if (!$koneksi) {
    die("Koneksi gagal!: " . mysqli_connect_error());
}

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahDataKucing($data) {
    global $koneksi;

    $nama   = htmlspecialchars($data["Nama"]);
    $jenis  = htmlspecialchars($data["jenis"]);
    $gender = htmlspecialchars($data["Gender"]);

    // Upload foto
    $namaFile = $_FILES['foto']['name'];
    $tmpName  = $_FILES['foto']['tmp_name'];
    $namaFileBaru = '';

    if (!empty($namaFile)) {
        $namaFileBaru = uniqid() . '_' . basename($namaFile);
        $targetPath = "img/" . $namaFileBaru;

        if (!move_uploaded_file($tmpName, $targetPath)) {
            echo "<script>alert('Upload foto gagal!');</script>";
            $namaFileBaru = ''; // fallback jika gagal upload
        }
    }

    $query = "INSERT INTO kucing VALUES ('', '$namaFileBaru', '$nama', '$jenis', '$gender')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function hapusdata($id) {
    global $koneksi;
    $query = "DELETE FROM kucing WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
?>
