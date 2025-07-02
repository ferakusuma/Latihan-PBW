<?php
require 'function.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!');document.location.href='datakucing.php';</script>";
    exit;
}

$id = $_GET['id'];

if (hapusdata($id) > 0) {
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'datakucing.php';
      </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'datakucing.php';
      </script>";
}
?>
