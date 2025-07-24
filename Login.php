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
        $show_all_users = "<div class='debug-users'>";
        $show_all_users .= "<h3>Daftar User di Database:</h3>";
        while ($u = mysqli_fetch_assoc($all_users_query)) {
            $show_all_users .= "<div class='user-item'>ID: " . $u['id'] . " - Username: " . htmlspecialchars($u['username']) . "</div>";
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
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="25" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="25" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-10px) rotate(1deg); }
            66% { transform: translateY(5px) rotate(-1deg); }
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 1;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            width: 100%;
            margin-bottom: 20px;
            animation: slideUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .login-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            animation: shine 3s infinite;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            animation: bounce 2s infinite;
        }

        .login-icon i {
            font-size: 36px;
            color: white;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        h1 {
            color: #333;
            margin-bottom: 8px;
            font-size: 28px;
            font-weight: 600;
        }

        .subtitle {
            color: #666;
            font-size: 14px;
            font-weight: 300;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #667eea;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #667eea;
        }

        .remember label {
            color: #666;
            font-weight: 400;
            margin: 0;
        }

        .forgot-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #764ba2;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #999;
            font-size: 14px;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e1e5e9;
            z-index: 1;
        }

        .divider span {
            background: white;
            padding: 0 15px;
            position: relative;
            z-index: 2;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #764ba2;
        }

        .error-msg {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .debug-info {
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            color: white;
            padding: 15px;
            border-radius: 12px;
            margin-top: 15px;
            font-size: 12px;
            line-height: 1.5;
        }

        .debug-users {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .debug-users h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .user-item {
            padding: 8px 12px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        .debug-link {
            text-align: center;
            margin-top: 15px;
        }

        .debug-link a {
            color: #999;
            text-decoration: none;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .debug-link a:hover {
            background: #f0f0f0;
            color: #667eea;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .login-box {
                padding: 30px 25px;
                margin: 10px;
            }
            
            .login-icon {
                width: 60px;
                height: 60px;
            }
            
            .login-icon i {
                font-size: 28px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            input[type="text"],
            input[type="password"] {
                padding: 12px 12px 12px 40px;
                font-size: 14px;
            }
            
            .login-btn {
                padding: 14px;
                font-size: 14px;
            }
        }

        /* Loading animation for button */
        .login-btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .login-btn.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <div class="login-icon">
                    <i class="fas fa-cat"></i>
                </div>
                <h1>Selamat Datang</h1>
                <p class="subtitle">Silakan masuk ke akun Anda</p>
            </div>

            <form action="" method="post" id="loginForm">
                <div class="input-group">
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" required 
                               value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>

                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" name="ingat" id="remember">
                        <label for="remember">Ingatkan saya</label>
                    </div>
                    <a href="#" class="forgot-link">Lupa password?</a>
                </div>

                <?php if ($error) : ?>
                    <div class="error-msg">
                        <i class="fas fa-exclamation-triangle"></i>
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($debug_info) && $error) : ?>
                    <div class="debug-info">
                        <strong><i class="fas fa-bug"></i> Debug Info:</strong><br>
                        <?php echo $debug_info; ?>
                    </div>
                <?php endif; ?>

                <button type="submit" name="login" class="login-btn" id="loginBtn">
                    <span>Masuk</span>
                </button>
            </form>

            <div class="divider">
                <span>atau</span>
            </div>

            <div class="register-link">
                Belum punya akun? <a href="register.php">Daftar sekarang</a>
            </div>

            <div class="debug-link">
                <a href="?debug=1"><i class="fas fa-code"></i> Debug Mode</a>
            </div>
        </div>

        <?php echo $show_all_users; ?>
    </div>

    <script>
        // Add loading animation to login button
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('loginBtn');
            btn.classList.add('loading');
            btn.innerHTML = '<span style="opacity: 0;">Masuk</span>';
        });

        // Add floating animation to input focus
        const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.3s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Add particle effect on successful login
        function createParticles() {
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: fixed;
                    width: 4px;
                    height: 4px;
                    background: #667eea;
                    border-radius: 50%;
                    pointer-events: none;
                    z-index: 9999;
                    left: 50%;
                    top: 50%;
                    animation: explode 1s ease-out forwards;
                `;
                
                const angle = (i / 50) * 360;
                const velocity = Math.random() * 200 + 100;
                
                particle.style.setProperty('--angle', angle + 'deg');
                particle.style.setProperty('--velocity', velocity + 'px');
                
                document.body.appendChild(particle);
                
                setTimeout(() => particle.remove(), 1000);
            }
        }

        // Add CSS for particle animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes explode {
                to {
                    transform: 
                        translateX(calc(cos(var(--angle)) * var(--velocity))) 
                        translateY(calc(sin(var(--angle)) * var(--velocity)));
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>