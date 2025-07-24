<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HOME | KUCING CUTE</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #fce7f3 0%, #f3e8ff 100%);
      min-height: 100vh;
    }
    
    .cat-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: all 0.3s ease;
    }
    
    .cat-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(219, 39, 119, 0.15);
      background: rgba(255, 255, 255, 1);
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
    
    .feature-card {
      background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.85) 100%);
      backdrop-filter: blur(15px);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .feature-card:hover {
      transform: scale(1.05) rotate(1deg);
      box-shadow: 0 25px 50px rgba(236, 72, 153, 0.2);
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
          Temukan dunia menggemaskan kucing favorit Anda
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
        <a href="about.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700">ABOUT US</a>
        <a href="login.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700">LOGIN</a>
      </div>
    </div>
  </nav>

  <main class="container mx-auto px-6 py-12">
    <!-- Hero Section -->
    <section class="text-center mb-16">
      <div class="floating-animation mb-8">
        <div class="w-64 h-64 mx-auto bg-gradient-to-br from-pink-300 to-purple-300 rounded-full flex items-center justify-center shadow-2xl">
          <span class="text-8xl">🐱</span>
        </div>
      </div>
      
      <div class="max-w-4xl mx-auto">
        <h2 class="gradient-text text-4xl md:text-5xl font-bold mb-6">
          🐱 Tentang Kucing Kesayangan
        </h2>
        <div class="bg-white/90 backdrop-blur-md rounded-3xl p-8 shadow-2xl border border-white/20">
          <p class="text-gray-700 text-lg leading-relaxed">
            <span class="font-bold text-pink-600">Kucing adalah sahabat kecil yang lucu, menggemaskan, dan penuh pesona.</span> 
            Dengan tubuh yang lentur, mata yang tajam, serta bulu yang halus dan lembut, kucing dikenal sebagai hewan yang bersih, anggun, dan mandiri. 
            Mereka memiliki kepribadian yang beragam—mulai dari yang aktif dan suka bermain, hingga yang tenang dan penyayang.
          </p>
          <p class="text-gray-600 text-base mt-4 italic">
            Suara mengeongnya yang khas, serta kebiasaannya tidur di tempat-tempat unik, sering kali membuat suasana rumah terasa lebih hidup dan menyenangkan. 
            <span class="font-semibold text-purple-600 underline decoration-purple-300">Tak heran jika kucing menjadi salah satu hewan peliharaan terfavorit dan paling dicintai di seluruh dunia.</span>
          </p>
        </div>
      </div>
    </section>

    <!-- Cat Breeds Section -->
    <section>
      <h2 class="gradient-text text-4xl font-bold text-center mb-12">
        🐾 Jenis-Jenis Kucing Populer
      </h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Persian Cat -->
        <div class="feature-card rounded-3xl p-6 shadow-xl border border-white/30">
          <div class="text-center mb-4">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center mb-3">
              <span class="text-2xl">🐱</span>
            </div>
            <h3 class="text-2xl font-bold text-pink-600 mb-2">Kucing Persia</h3>
          </div>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><span class="text-pink-400 mr-2">✨</span> Bulu panjang dan lebat</li>
            <li class="flex items-center"><span class="text-pink-400 mr-2">✨</span> Wajah datar dan hidung pesek</li>
            <li class="flex items-center"><span class="text-pink-400 mr-2">✨</span> Sifatnya kalem dan manja</li>
            <li class="flex items-center"><span class="text-pink-400 mr-2">✨</span> Perlu perawatan rutin</li>
          </ul>
        </div>

        <!-- Angora Cat -->
        <div class="feature-card rounded-3xl p-6 shadow-xl border border-white/30">
          <div class="text-center mb-4">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mb-3">
              <span class="text-2xl">😸</span>
            </div>
            <h3 class="text-2xl font-bold text-purple-600 mb-2">Kucing Anggora</h3>
          </div>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><span class="text-purple-400 mr-2">✨</span> Bulu halus dan mengembang</li>
            <li class="flex items-center"><span class="text-purple-400 mr-2">✨</span> Tubuh ramping dan elegan</li>
            <li class="flex items-center"><span class="text-purple-400 mr-2">✨</span> Aktif dan suka bermain</li>
            <li class="flex items-center"><span class="text-purple-400 mr-2">✨</span> Cerdas dan mudah dilatih</li>
          </ul>
        </div>

        <!-- Maine Coon -->
        <div class="feature-card rounded-3xl p-6 shadow-xl border border-white/30">
          <div class="text-center mb-4">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-full flex items-center justify-center mb-3">
              <span class="text-2xl">😺</span>
            </div>
            <h3 class="text-2xl font-bold text-indigo-600 mb-2">Maine Coon</h3>
          </div>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><span class="text-indigo-400 mr-2">✨</span> Ukuran tubuh besar</li>
            <li class="flex items-center"><span class="text-indigo-400 mr-2">✨</span> Bulu tebal tahan dingin</li>
            <li class="flex items-center"><span class="text-indigo-400 mr-2">✨</span> Ramah dan penyayang</li>
            <li class="flex items-center"><span class="text-indigo-400 mr-2">✨</span> Suka berinteraksi</li>
          </ul>
        </div>

        <!-- British Shorthair -->
        <div class="feature-card rounded-3xl p-6 shadow-xl border border-white/30">
          <div class="text-center mb-4">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-teal-400 to-teal-600 rounded-full flex items-center justify-center mb-3">
              <span class="text-2xl">😻</span>
            </div>
            <h3 class="text-2xl font-bold text-teal-600 mb-2">British Shorthair</h3>
          </div>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><span class="text-teal-400 mr-2">✨</span> Bulu pendek dan halus</li>
            <li class="flex items-center"><span class="text-teal-400 mr-2">✨</span> Wajah bulat chubby</li>
            <li class="flex items-center"><span class="text-teal-400 mr-2">✨</span> Tenang dan kalem</li>
            <li class="flex items-center"><span class="text-teal-400 mr-2">✨</span> Cocok untuk indoor</li>
          </ul>
        </div>

        <!-- Siamese Cat -->
        <div class="feature-card rounded-3xl p-6 shadow-xl border border-white/30">
          <div class="text-center mb-4">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-cyan-400 to-cyan-600 rounded-full flex items-center justify-center mb-3">
              <span class="text-2xl">😽</span>
            </div>
            <h3 class="text-2xl font-bold text-cyan-600 mb-2">Kucing Siam</h3>
          </div>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><span class="text-cyan-400 mr-2">✨</span> Tubuh ramping elegan</li>
            <li class="flex items-center"><span class="text-cyan-400 mr-2">✨</span> Mata biru terang</li>
            <li class="flex items-center"><span class="text-cyan-400 mr-2">✨</span> Sangat vokal</li>
            <li class="flex items-center"><span class="text-cyan-400 mr-2">✨</span> Setia pada pemilik</li>
          </ul>
        </div>

        <!-- Sphynx Cat -->
        <div class="feature-card rounded-3xl p-6 shadow-xl border border-white/30">
          <div class="text-center mb-4">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-rose-400 to-rose-600 rounded-full flex items-center justify-center mb-3">
              <span class="text-2xl">🙀</span>
            </div>
            <h3 class="text-2xl font-bold text-rose-600 mb-2">Kucing Sphynx</h3>
          </div>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><span class="text-rose-400 mr-2">✨</span> Tidak memiliki bulu</li>
            <li class="flex items-center"><span class="text-rose-400 mr-2">✨</span> Kulit hangat dan halus</li>
            <li class="flex items-center"><span class="text-rose-400 mr-2">✨</span> Perlu perawatan kulit</li>
            <li class="flex items-center"><span class="text-rose-400 mr-2">✨</span> Ramah dan manja</li>
          </ul>
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
    </div>
  </footer>

  <script>
    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // Add parallax effect on scroll
    window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const parallax = document.querySelector('.floating-animation');
      const speed = scrolled * 0.5;
      parallax.style.transform = `translateY(${speed}px)`;
    });

    // Add interactive hover effects
    document.querySelectorAll('.feature-card').forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.05) rotate(1deg)';
      });
      
      card.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1) rotate(0deg)';
      });
    });
  </script>
</body>
</html>