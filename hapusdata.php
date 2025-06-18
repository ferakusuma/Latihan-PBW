<?php
    require 'function.php';
    $id = $_GET['id'];

    if(hapusdata($id) > 0) {
        echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = '../datakucing.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = '../localhost/datakucing.php';
              </script>";
    }



?>