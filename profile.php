<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PROFILE | KUCING CUTE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce7f3 0%, #f3e8ff 100%);
            min-height: 100vh;
        }
        
        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(219, 39, 119, 0.15);
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
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .gallery-item:hover {
            transform: scale(1.05) rotate(2deg);
            z-index: 10;
        }
        
        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(236, 72, 153, 0.3), rgba(168, 85, 247, 0.3));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }
        
        .gallery-item:hover::before {
            opacity: 1;
        }
        
        .profile-image {
            background: linear-gradient(135deg, #ec4899, #a855f7);
            padding: 6px;
            animation: profileGlow 3s ease-in-out infinite alternate;
        }
        
        @keyframes profileGlow {
            0% { box-shadow: 0 0 20px rgba(236, 72, 153, 0.5); }
            100% { box-shadow: 0 0 40px rgba(168, 85, 247, 0.8); }
        }
        
        .info-item {
            background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .info-item:hover {
            transform: translateX(10px);
            background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0.9) 100%);
        }
        
        .cat-placeholder {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            transition: all 0.3s ease;
        }
        
        .cat-placeholder:hover {
            font-size: 5rem;
            background: linear-gradient(135deg, #f59e0b, #d97706);
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
                    Profil Pecinta Kucing Sejati
                </p>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-center space-x-8 md:space-x-16 py-4">
                <a href="index.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700">HOME</a>
                <a href="profile.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700 border-b-2 border-pink-400">PROFILE</a>
                <a href="about.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700">ABOUT US</a>
                <a href="login.php" class="nav-link text-pink-600 font-semibold text-lg hover:text-pink-700">LOGIN</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-12">
        <!-- Page Title -->
        <div class="text-center mb-12">
            <h2 class="gradient-text text-4xl md:text-5xl font-bold mb-4">
                👤 Profil Pengguna
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-pink-400 to-purple-400 mx-auto rounded-full"></div>
        </div>

        <!-- Profile Section -->
        <section class="mb-16">
            <div class="profile-card rounded-3xl p-8 md:p-12 shadow-2xl border border-white/30 max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <!-- Profile Picture -->
                    <div class="flex-shrink-0">
                        <div class="profile-image rounded-full w-48 h-48 md:w-56 md:h-56">
                            <div class="w-full h-full rounded-full overflow-hidden bg-gradient-to-br from-pink-300 to-purple-300 flex items-center justify-center">
                                <!-- Placeholder for profile image -->
                                <span class="text-8xl">🐱</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Profile Info -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-4xl md:text-5xl font-bold gradient-text mb-6">
                            MEOWLOVER
                        </h1>
                        
                        <div class="space-y-4">
                            <div class="info-item rounded-2xl p-4 border border-white/20">
                                <div class="flex items-center justify-center md:justify-start gap-3">
                                    <span class="text-2xl">📧</span>
                                    <div>
                                        <strong class="text-pink-600">Email:</strong>
                                        <span class="text-gray-700 ml-2">meowlover@example.com</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-item rounded-2xl p-4 border border-white/20">
                                <div class="flex items-center justify-center md:justify-start gap-3">
                                    <span class="text-2xl">😻</span>
                                    <div>
                                        <strong class="text-purple-600">Kucing Favorit:</strong>
                                        <span class="text-gray-700 ml-2">Kucing Persia</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-item rounded-2xl p-4 border border-white/20">
                                <div class="flex items-center justify-center md:justify-start gap-3">
                                    <span class="text-2xl">🐾</span>
                                    <div>
                                        <strong class="text-indigo-600">Bio:</strong>
                                        <span class="text-gray-700 ml-2">Pecinta kucing garis keras 🐾. Setiap hari harus lihat kucing!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-4 mt-8">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-pink-600">127</div>
                                <div class="text-sm text-gray-600">Foto Kucing</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-purple-600">42</div>
                                <div class="text-sm text-gray-600">Kucing Disave</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-indigo-600">365</div>
                                <div class="text-sm text-gray-600">Hari Aktif</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Favorite Collection -->
        <section>
            <div class="text-center mb-12">
                <h2 class="gradient-text text-4xl font-bold mb-4">
                    😻 Koleksi Kucing Favorit
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Kumpulan foto-foto kucing terbaik yang membuat hari-hari terasa lebih cerah dan penuh kebahagiaan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Cat Image 1 -->
                <div class="gallery-item rounded-3xl overflow-hidden shadow-2xl border border-white/30 aspect-square">
                    <div class="cat-placeholder w-full h-full">
                        🐱
                    </div>
                </div>
                
                <!-- Cat Image 2 -->
                <div class="gallery-item rounded-3xl overflow-hidden shadow-2xl border border-white/30 aspect-square">
                    <div class="cat-placeholder w-full h-full bg-gradient-to-br from-purple-400 to-indigo-400">
                        😸
                    </div>
                </div>
                
                <!-- Cat Image 3 -->
                <div class="gallery-item rounded-3xl overflow-hidden shadow-2xl border border-white/30 aspect-square">
                    <div class="cat-placeholder w-full h-full bg-gradient-to-br from-pink-400 to-rose-400">
                        😻
                    </div>
                </div>
                
                <!-- Additional Cat Images -->
                <div class="gallery-item rounded-3xl overflow-hidden shadow-2xl border border-white/30 aspect-square">
                    <div class="cat-placeholder w-full h-full bg-gradient-to-br from-cyan-400 to-blue-400">
                        😺
                    </div>
                </div>
                
                <div class="gallery-item rounded-3xl overflow-hidden shadow-2xl border border-white/30 aspect-square">
                    <div class="cat-placeholder w-full h-full bg-gradient-to-br from-teal-400 to-green-400">
                        😽
                    </div>
                </div>
                
                <div class="gallery-item rounded-3xl overflow-hidden shadow-2xl border border-white/30 aspect-square">
                    <div class="cat-placeholder w-full h-full bg-gradient-to-br from-orange-400 to-red-400">
                        🙀
                    </div>
                </div>
            </div>
            
            <!-- View More Button -->
            <div class="text-center mt-12">
                <button class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    <span class="mr-2">📷</span>
                    Lihat Lebih Banyak
                </button>
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
            if (parallax) {
                const speed = scrolled * 0.3;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Add interactive gallery effects
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.zIndex = '20';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.zIndex = '1';
            });
        });

        // Add click effect for gallery items
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', function() {
                // Add a simple click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1.05) rotate(2deg)';
                }, 100);
            });
        });

        // Counter animation for stats
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 30);
        }

        // Animate counters when they come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.text-3xl');
                    counters.forEach((counter, index) => {
                        const targets = [127, 42, 365];
                        animateCounter(counter, targets[index]);
                    });
                    observer.unobserve(entry.target);
                }
            });
        });

        const statsSection = document.querySelector('.grid.grid-cols-3');
        if (statsSection) {
            observer.observe(statsSection);
        }
    </script>
</body>
</html>