<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LOGIN | KUCING</title>
  <link rel="stylesheet" href="style.css" />
  <script src="login.js" defer></script> <!-- penting: pakai defer -->
</head>
<body>
  <h1>🐾 Login Kucing 🐾</h1>
  <form id="loginForm"> <!-- tambahkan id -->
    <label for="username">Email:</label>
    <input type="email" name="email" id="username" required />

    <label for="password">Password:</label>
    <input type="password" name="Password" id="password" required />

    <div class="remember-container">
      <input type="checkbox" name="remember" id="remember" />
      <label for="remember">Ingatkan saya!</label>
    </div>

    <button type="submit" class="btn-cute">🐱 Login Sekarang</button>
  </form>

  <div class="register-link">
    Belum punya akun? <a href="register.php">Daftar sekarang</a>
  </div>
</body>
</html>
