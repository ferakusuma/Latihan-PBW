<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PROFILE | KUCING</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header class="border-b-2 border-pink-300 py-4 text-center">
        <h1 class="text-pink-400 text-3xl font-bold select-none">🐾 WEB KUCING CUTE 🐾</h1>
    </header>

    <nav class="bg-pink-50 py-3 flex justify-center space-x-12 text-pink-400 text-lg font-bold select-none">
        <a href="index.php">HOME</a>
        <a href="profile.php">PROFILE</a>
        <a href="about.php">ABOUT US</a>
        <a href="login.php">LOGIN</a>
    </nav>
    <header>
        <h2 class="text-center text-2xl text-pink-500 font-bold mb-4">Profil Pengguna</h2>
        <hr />
    </header>

    <!-- Profil Pengguna -->
    <section class="profile-container">
        <div class="profile-pic">
            <img src="profile kucing.jpeg" alt="Foto Profil Kucing Lucu" />
        </div>
        <div class="profile-info">
            <h1 class="username">MEOWLOVER</h1>
            <ul>
                <li><strong>Email:</strong> meowlover@example.com</li>
                <li><strong>Kucing Favorit:</strong> Kucing Persia</li>
                <li><strong>Bio:</strong> Pecinta kucing garis keras 🐾. Setiap hari harus lihat kucing!</li>
            </ul>
        </div>
    </section>

    <!-- Koleksi Favorit -->
    <section class="favorite-section">
        <h2 class="section-title center-title">Koleksi Kucing Favorit 😻</h2>
        <div class="cat-gallery">
            <img src="kucing 1.jpg" alt="Kucing 1" />
            <img src="kucing 2.jpeg" alt="Kucing 2" />
            <img src="kucing 3.jpeg" alt="Kucing 3" />
        </div>
    </section>

</body>

</html>