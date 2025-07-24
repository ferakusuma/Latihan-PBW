<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ABOUT US | KUCING CUTE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce7f3 0%, #f3e8ff 100%);
            min-height: 100vh;
        }
        
        .data-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .data-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(219, 39, 119, 0.15);
        }
        
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: linear-gradient(90deg, #ec4899, #a855f7);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link:hover {
            transform: translateY(-2px);
        }
        
        .floating-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #ec4899, #a855f7, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .cat-emoji {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translateY(0); }
            40%, 43% { transform: translateY(-10px); }
            70% { transform: translateY(-5px); }
        }
        
        .modern-table {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .table-header {
            background: linear-gradient(135deg, #ec4899, #a855f7);
            color: white;
        }
        
        .table-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .table-row:hover {
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.1), rgba(168, 85, 247, 0.1));
            transform: scale(1.02);
        }
        
        .gender-badge-female {
            background: linear-gradient(135deg, #ec4899, #be185d);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .gender-badge-male {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .cat-type-badge {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.7rem;
            font-weight: 500;
        }
        
        .score-excellent {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 6px 12px;
            border-radius: 10px;
            font-weight: 600;
        }
        
        .score-good {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            padding: 6px 12px;
            border-radius: 10px;
            font-weight: 600;
        }
        
        .cat-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 10px;
        }
        
        .search-box {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(236, 72, 153, 0.2);
            transition: all 0.3s ease;
        }
        
        .search-box:focus {
            border-color: #ec4899;
            box-shadow: 0 0 20px rgba(236, 72, 153, 0.3);
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <!-- Header -->
    <header class="relative bg-gradient-to-r from-pink-400 via-purple-400 to-indigo-400 shadow-2xl">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative container mx-auto px-6 py-8 text-center">
            <div class="floating-animation">
                <h1 class="text-white text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg">
                    <span class="cat-emoji">🐾</span> 
                    WEB KUCING CUTE 
                    <span class="cat-emoji">🐾</span>
                </h1>
                <p class="text-white/90 text-lg md:text-xl font-light">
                    Database & Informasi Lengkap Kucing
                </p>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-center space-x-8 md:space-x-16 py-4">
                <a href="index.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700">HOME</a>
                <a href="profile.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700">PROFILE</a>
                <a href="about.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700 border-b-2 border-pink-400">ABOUT US</a>
                <a href="login.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700">LOGIN</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        <!-- Pet Data Section -->
        <section class="mb-16">
            <div class="text-center mb-8">
                <h2 class="gradient-text text-4xl md:text-5xl font-bold mb-4">
                    🐱 Data Peliharaan Kucing
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto mb-6">
                    Kumpulan data lengkap kucing-kucing menggemaskan yang menjadi bagian keluarga kami
                </p>
                
                <!-- Search Box -->
                <div class="max-w-md mx-auto mb-8">
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="🔍 Cari kucing favorit..." 
                        class="search-box w-full px-6 py-3 rounded-full text-gray-700 font-medium focus:outline-none"
                    />
                </div>
            </div>
            
            <div class="data-card rounded-3xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="modern-table w-full" id="catsTable">
                        <thead class="table-header">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-lg">NO</th>
                                <th class="px-6 py-4 text-left font-bold text-lg">KUCING</th>
                                <th class="px-6 py-4 text-left font-bold text-lg">JENIS</th>
                                <th class="px-6 py-4 text-left font-bold text-lg">GENDER</th>
                                <th class="px-6 py-4 text-left font-bold text-lg">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">1</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar">🐱</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Si Gemoy</div>
                                            <div class="text-sm text-gray-500">Kucing kesayangan</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge">Kucing Anggora</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-female">♀ Perempuan</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">2</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-orange-400 to-yellow-400">😸</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Si Belang</div>
                                            <div class="text-sm text-gray-500">Kucing aktif</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-green-500 to-teal-500">Kucing Kampung</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-male">♂ Laki-laki</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">3</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-pink-400 to-rose-400">😻</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Mimi</div>
                                            <div class="text-sm text-gray-500">Kucing cantik</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-purple-500 to-indigo-500">Kucing Persia</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-female">♀ Perempuan</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">4</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-yellow-400 to-orange-500">😺</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Oyen</div>
                                            <div class="text-sm text-gray-500">Kucing oranye</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-yellow-500 to-orange-500">Kucing Oren</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-male">♂ Laki-laki</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">5</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-gray-400 to-gray-600">🌙</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Luna</div>
                                            <div class="text-sm text-gray-500">Kucing besar</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-gray-500 to-slate-600">Maine Coon</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-female">♀ Perempuan</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">6</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-amber-600 to-orange-700">🐅</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Tompok</div>
                                            <div class="text-sm text-gray-500">Kucing belang</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-amber-600 to-orange-700">Kucing Bengal</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-male">♂ Laki-laki</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">7</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-rose-400 to-pink-500">😽</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Chibi</div>
                                            <div class="text-sm text-gray-500">Kucing imut</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-rose-500 to-pink-600">Scottish Fold</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-female">♀ Perempuan</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">8</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-gray-800 to-black">🖤</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Hitam</div>
                                            <div class="text-sm text-gray-500">Kucing hitam</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-gray-800 to-black">Kucing Bombay</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-male">♂ Laki-laki</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">9</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-blue-300 to-cyan-400">❄️</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Snowy</div>
                                            <div class="text-sm text-gray-500">Kucing putih</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-blue-500 to-cyan-500">Kucing Siam</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-female">♀ Perempuan</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">10</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-purple-400 to-pink-400">🦁</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Leo</div>
                                            <div class="text-sm text-gray-500">Kucing unik</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="cat-type-badge bg-gradient-to-br from-purple-500 to-pink-500">Kucing Sphynx</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge-male">♂ Laki-laki</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">🏠 Sehat</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Assessment Section -->
        <section>
            <div class="text-center mb-8">
                <h2 class="gradient-text text-4xl md:text-5xl font-bold mb-4">
                    📊 Latihan Penilaian
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Sistem evaluasi dan penilaian untuk program pelatihan kucing
                </p>
            </div>
            
            <div class="data-card rounded-3xl overflow-hidden shadow-2xl max-w-4xl mx-auto">
                <div class="overflow-x-auto">
                    <table class="modern-table w-full">
                        <thead class="table-header">
                            <tr>
                                <th rowspan="2" class="px-6 py-6 text-left font-bold text-lg border-r border-white/20">NAMA KUCING</th>
                                <th colspan="3" class="px-6 py-4 text-center font-bold text-lg">NILAI PELATIHAN</th>
                            </tr>
                            <tr class="border-t border-white/20">
                                <th class="px-6 py-4 text-center font-bold">UTS</th>
                                <th class="px-6 py-4 text-center font-bold">UAS</th>
                                <th class="px-6 py-4 text-center font-bold">TUGAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-row">
                                <td class="px-6 py-6">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-orange-400 to-red-500">😸</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Garong</div>
                                            <div class="text-sm text-gray-500">Kucing pintar</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-excellent">90</span>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-good">80</span>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-excellent">90</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-6">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-pink-400 to-purple-500">😻</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Mimi</div>
                                            <div class="text-sm text-gray-500">Kucing rajin</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-excellent">95</span>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-excellent">92</span>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-excellent">88</span>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="px-6 py-6">
                                    <div class="flex items-center">
                                        <div class="cat-avatar bg-gradient-to-br from-yellow-400 to-orange-500">😺</div>
                                        <div>
                                            <div class="font-bold text-gray-800 text-lg">Oyen</div>
                                            <div class="text-sm text-gray-500">Kucing aktif</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-good">85</span>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-good">78</span>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="score-good">82</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Statistics -->
                <div class="bg-gradient-to-r from-pink-50 to-purple-50 p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-pink-600">91.7</div>
                            <div class="text-sm text-gray-600">Rata-rata UTS</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-purple-600">83.3</div>
                            <div class="text-sm text-gray-600">Rata-rata UAS</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-indigo-600">86.7</div>
                            <div class="text-sm text-gray-600">Rata-rata Tugas</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-pink-500 to-purple-600 text-white py-8 mt-16">
        <div class="container mx-auto text-center">
            <div class="floating-animation inline-block">
                <span class="text-4xl mb-4 block">🐾</span>
            </div>
            <p class="text-lg font-light">Dibuat dengan ❤️ untuk pecinta kucing</p>
            <p class="text-sm opacity-75 mt-2">© 2025 Web Kucing Cute. Semua hak dilindungi.</p>
            <div class="mt-4 flex justify-center space-x-6">
                <span class="text-2xl">📊</span>
                <span class="text-2xl">📷</span>
                <span class="text-2xl">💌</span>
                <span class="text-2xl">🎀</span>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript: Filter Search -->
    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#catsTable tbody tr');
            rows.forEach(row => {
                const catName = row.querySelector('td:nth-child(2) div div:first-child')?.textContent.toLowerCase();
                if (catName && catName.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
