<?php
require 'function.php';
$error = false;
$error_message = "";
$debug_info = "";

// Debug: Cek koneksi database
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Debug info
    $debug_info .= "Username yang dimasukkan: " . htmlspecialchars($username) . "<br>";
    
    // Validasi input kosong
    if (empty($username) || empty($password)) {
        $error = true;
        $error_message = "Username dan password harus diisi!";
    } else {
        // Debug: Cek apakah tabel user ada dan ada data
        $check_table = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM user");
        if ($check_table) {
            $table_data = mysqli_fetch_assoc($check_table);
            $debug_info .= "Total user di database: " . $table_data['total'] . "<br>";
        } else {
            $debug_info .= "Error mengakses tabel user: " . mysqli_error($koneksi) . "<br>";
        }

        // Gunakan prepared statement untuk keamanan
        $stmt = mysqli_prepare($koneksi, "SELECT id, username, password FROM user WHERE username = ?");
        
        if (!$stmt) {
            $error = true;
            $error_message = "Error dalam query: " . mysqli_error($koneksi);
            $debug_info .= "Prepared statement gagal: " . mysqli_error($koneksi) . "<br>";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            
            if (!mysqli_stmt_execute($stmt)) {
                $error = true;
                $error_message = "Error eksekusi query: " . mysqli_stmt_error($stmt);
                $debug_info .= "Execute gagal: " . mysqli_stmt_error($stmt) . "<br>";
            } else {
                $result = mysqli_stmt_get_result($stmt);
                $debug_info .= "Query berhasil dieksekusi<br>";
                $debug_info .= "Jumlah row ditemukan: " . mysqli_num_rows($result) . "<br>";
                
                if (mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    $debug_info .= "Data user ditemukan: " . htmlspecialchars($user['username']) . "<br>";
                    $debug_info .= "Hash password dari DB (10 karakter pertama): " . substr($user['password'], 0, 10) . "...<br>";
                    
                    // Verifikasi password
                    if (password_verify($password, $user["password"])) {
                        // Login berhasil
                        session_start();
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['user_id'] = $user['id'];
                        
                        mysqli_stmt_close($stmt);
                        header("Location: datamahasiswa.php");
                        exit;
                    } else {
                        $error = true;
                        $error_message = "Password salah!";
                        $debug_info .= "Password verification gagal<br>";
                        
                        // Debug: Test manual hash
                        $test_hash = password_hash($password, PASSWORD_DEFAULT);
                        $debug_info .= "Hash dari password yang dimasukkan: " . substr($test_hash, 0, 10) . "...<br>";
                    }
                } else {
                    $error = true;
                    $error_message = "Username tidak ditemukan!";
                    $debug_info .= "User dengan username tersebut tidak ada di database<br>";
                    
                    // Debug: Tampilkan semua username yang ada
                    $all_users = mysqli_query($koneksi, "SELECT username FROM user");
                    if ($all_users && mysqli_num_rows($all_users) > 0) {
                        $debug_info .= "Username yang tersedia di database: ";
                        while ($u = mysqli_fetch_assoc($all_users)) {
                            $debug_info .= htmlspecialchars($u['username']) . ", ";
                        }
                        $debug_info = rtrim($debug_info, ", ") . "<br>";
                    }
                }
            }
            
            mysqli_stmt_close($stmt);
        }
    }
}

// Untuk development: tampilkan semua user di database
$show_all_users = "";
if (isset($_GET['debug']) && $_GET['debug'] == '1') {
    $all_users_query = mysqli_query($koneksi, "SELECT id, username FROM user ORDER BY id DESC LIMIT 10");
    if ($all_users_query && mysqli_num_rows($all_users_query) > 0) {
        $show_all_users = "<div style='background: #f0f0f0; padding: 10px; margin: 10px 0; border-radius: 5px;'>";
        $show_all_users .= "<strong>Daftar User di Database:</strong><br>";
        while ($u = mysqli_fetch_assoc($all_users_query)) {
            $show_all_users .= "ID: " . $u['id'] . " - Username: " . htmlspecialchars($u['username']) . "<br>";
        }
        $show_all_users .= "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Kucing Cute</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Styling tema cute -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: linear-gradient(to bottom right, #ffe4f2, #fff9f9);
            color: #4b4b4b;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 500px;
        }

        .login-box {
            background-color: #fff0f5;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(255, 182, 193, 0.3);
            width: 100%;
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            color: #ff6ec7;
            margin-bottom: 20px;
            font-size: 28px;
            text-shadow: 2px 2px #ffd3ec;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #c71585;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ffc0cb;
            border-radius: 8px;
            font-family: 'Comic Sans MS', cursive;
            background-color: #fff8fb;
        }

        .remember {
            margin-top: 15px;
        }

        .remember label {
            font-weight: normal;
            font-size: 14px;
            color: #8b5c7e;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ff9aa2, #ffb6b9);
            color: white;
            border: none;
            font-weight: bold;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 25px;
            transition: 0.3s ease;
            box-shadow: 0 4px 8px rgba(255, 105, 180, 0.3);
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #ffb6b9, #ff9aa2);
            transform: scale(1.03);
        }

        .error-msg {
            text-align: center;
            color: red;
            margin-top: 10px;
            padding: 10px;
            background-color: #ffe0e0;
            border: 1px solid #ffcccc;
            border-radius: 5px;
        }

        .debug-info {
            background-color: #e8f4f8;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 12px;
            border: 1px solid #b8e6f1;
        }

        .form-text-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .form-text-link a {
            color: #ff69b4;
            text-decoration: none;
            font-weight: bold;
        }

        .form-text-link a:hover {
            text-decoration: underline;
        }

        .debug-link {
            text-align: center;
            margin-top: 10px;
            font-size: 12px;
        }

        .debug-link a {
            color: #666;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>
            <form action="" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <div class="remember">
                    <input type="checkbox" name="ingat" id="remember">
                    <label for="remember">Ingatkan saya!</label>
                </div>

                <?php if ($error) : ?>
                    <p class="error-msg"><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>

                <?php if (!empty($debug_info) && $error) : ?>
                    <div class="debug-info">
                        <strong>Debug Info:</strong><br>
                        <?php echo $debug_info; ?>
                    </div>
                <?php endif; ?>

                <input type="submit" name="login" value="Login">
            </form>

            <p class="form-text-link">Belum punya akun? <a href="register.php">Daftar</a></p>
            <p class="debug-link"><a href="?debug=1">Debug Mode</a></p>
        </div>

        <?php echo $show_all_users; ?>
    </div>

</body>
</html>