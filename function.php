<?php
$koneksi = mysqli_connect("localhost:3307", "root", "", "webkucing");

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

    $namaFileBaru = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $namaFile = $_FILES['foto']['name'];
        $tmpName  = $_FILES['foto']['tmp_name'];
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (in_array($ekstensiFile, $ekstensiValid)) {
            $namaFileBaru = uniqid() . '.' . $ekstensiFile;
            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        } else {
            echo "<script>alert('Format file tidak didukung!');</script>";
            return 0;
        }
    }

    $query = "INSERT INTO kucing (foto, nama, jenis, gender) 
              VALUES ('$namaFileBaru', '$nama', '$jenis', '$gender')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahDataKucing($data) {
    global $koneksi;

    $id     = intval($data["id"]);
    $nama   = htmlspecialchars($data["Nama"]);
    $jenis  = htmlspecialchars($data["jenis"]);
    $gender = htmlspecialchars($data["Gender"]);

    // Ambil data lama
    $dataLama = query("SELECT * FROM kucing WHERE id = $id")[0];
    $fotoLama = $dataLama['foto'];

    $fotoBaru = $fotoLama; // Default pakai foto lama

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $namaFile = $_FILES['foto']['name'];
        $tmpName  = $_FILES['foto']['tmp_name'];
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (in_array($ekstensiFile, $ekstensiValid)) {
            // Hapus foto lama jika ada
            if (!empty($fotoLama) && file_exists("img/" . $fotoLama)) {
                unlink("img/" . $fotoLama);
            }

            // Simpan foto baru
            $fotoBaru = uniqid() . '.' . $ekstensiFile;
            move_uploaded_file($tmpName, 'img/' . $fotoBaru);
        } else {
            echo "<script>alert('Format file tidak didukung!');</script>";
            return 0;
        }
    }

    $query = "UPDATE kucing SET 
                nama = '$nama', 
                jenis = '$jenis',
                gender = '$gender',
                foto = '$fotoBaru'
              WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function hapusdata($id) {
    global $koneksi;
    $id = intval($id);

    // Cek apakah data dengan ID tersebut ada
    $data = query("SELECT * FROM kucing WHERE id = $id");
    if (!$data || count($data) === 0) {
        echo "Data tidak ditemukan dengan ID: $id";
        return 0;
    }

    $foto = $data[0]['foto'];
    if (!empty($foto)) {
        $path = "img/" . $foto;
        if (file_exists($path)) {
            if (!unlink($path)) {
                echo "Gagal menghapus foto: $path";
                return 0;
            }
        } else {
            echo "File tidak ditemukan: $path";
        }
    }

    $query = "DELETE FROM kucing WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


?>
