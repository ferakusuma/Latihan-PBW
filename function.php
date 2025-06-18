<?php
    $koneksi = mysqli_connect("localhost:3307","root", "","webkucing");

    if(!$koneksi) {
    die("Koneksi gagal!: ".mysqli_connect_error());
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
        $nama = $data["Nama"];
        $jenis = $data["jenis"];
        $gender = $data["Gender"];

        $query = "INSERT INTO kucing VALUES ('', '', '$nama', '$jenis', '$gender')";
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