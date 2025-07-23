<?php
session_start();
session_unset();   // Hapus semua variabel session
session_destroy(); // Hancurkan session

// Redirect ke halaman login (atau ke index.php / lamanAwal.php sesuai kebutuhan)
header("Location: login.php");
exit;
