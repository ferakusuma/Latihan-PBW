<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kucing - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .admin-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .floating-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .admin-table {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .table-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        .table-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .table-row:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            transform: scale(1.01);
        }
        
        .cat-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .cat-image:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 24px rgba(102, 126, 234, 0.3);
        }
        
        .gender-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .gender-female {
            background: linear-gradient(135deg, #ec4899, #be185d);
            color: white;
        }
        
        .gender-male {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(102, 126, 234, 0.4);
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 8px 12px;
            font-size: 0.9rem;
        }
        
        .btn-edit:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 8px 12px;
            font-size: 0.9rem;
        }
        
        .btn-delete:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(239, 68, 68, 0.3);
        }
        
        .stats-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .empty-state {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(20px);
            border: 2px dashed rgba(102, 126, 234, 0.3);
            border-radius: 20px;
            padding: 60px 40px;
            text-align: center;
            color: #64748b;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .search-box {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
        }
        
        .search-box:focus {
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
        }
        
        .page-header {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .image-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            border: 3px solid #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <div class="min-h-screen py-8">
        <div class="container mx-auto px-6">
            <!-- Header -->
            <header class="page-header rounded-3xl p-8 mb-8 shadow-2xl">
                <div class="text-center">
                    <div class="floating-animation inline-block mb-4">
                        <i class="fas fa-cat text-6xl text-indigo-600"></i>
                    </div>
                    <h1 class="gradient-text text-4xl md:text-5xl font-bold mb-4">
                        Data Kucing Dashboard
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Kelola data kucing dengan mudah dan efisien
                    </p>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="stats-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full">
                            <i class="fas fa-cat text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Kucing</p>
                            <p class="text-2xl font-bold text-gray-800" id="totalCats">3</p>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-pink-500 to-pink-600 rounded-full">
                            <i class="fas fa-venus text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Betina</p>
                            <p class="text-2xl font-bold text-gray-800" id="femaleCats">2</p>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full">
                            <i class="fas fa-mars text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Jantan</p>
                            <p class="text-2xl font-bold text-gray-800" id="maleCats">1</p>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center">
                        <div class="p-3 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-full">
                            <i class="fas fa-heart text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Sehat</p>
                            <p class="text-2xl font-bold text-gray-800">100%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
                <div class="flex-1 max-w-md">
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="🔍 Cari data kucing..." 
                        class="search-box w-full px-6 py-3 rounded-full text-gray-700 font-medium focus:outline-none"
                    />
                </div>
                
                <a href="tambahdata.php" class="btn btn-primary rounded-full shadow-xl">
                    <i class="fas fa-plus"></i>
                    Tambah Data Kucing
                </a>
            </div>

            <!-- Table Container -->
            <div class="admin-card rounded-3xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="admin-table w-full" id="catsTable">
                        <thead class="table-header">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-lg">No</th>
                                <th class="px-6 py-4 text-left font-bold text-lg">Foto</th>
                                <th class="px-6 py-4 text-left font-bold text-lg">Nama</th>
                                <th class="px-6 py-4 text-left font-bold text-lg">Jenis</th>
                                <th class="px-6 py-4 text-left font-bold text-lg">Gender</th>
                                <th class="px-6 py-4 text-center font-bold text-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data Row 1 -->
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">1</td>
                                <td class="px-6 py-4">
                                    <div class="image-placeholder">
                                        🐱
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800 text-lg">Luna</div>
                                    <div class="text-sm text-gray-500">Kucing kesayangan</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm font-medium">
                                        Kucing Persia
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge gender-female">
                                        <i class="fas fa-venus"></i>
                                        Perempuan
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="ubahdata.php?id=1" class="btn btn-edit" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapusdata.php?id=1" class="btn btn-delete" 
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" title="Hapus Data">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Sample Data Row 2 -->
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">2</td>
                                <td class="px-6 py-4">
                                    <div class="image-placeholder bg-gradient-to-br from-orange-400 to-yellow-500">
                                        😸
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800 text-lg">Oyen</div>
                                    <div class="text-sm text-gray-500">Kucing aktif</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-sm font-medium">
                                        Kucing Oren
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge gender-male">
                                        <i class="fas fa-mars"></i>
                                        Laki-laki
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="ubahdata.php?id=2" class="btn btn-edit" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapusdata.php?id=2" class="btn btn-delete" 
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" title="Hapus Data">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Sample Data Row 3 -->
                            <tr class="table-row">
                                <td class="px-6 py-4 font-semibold text-gray-800">3</td>
                                <td class="px-6 py-4">
                                    <div class="image-placeholder bg-gradient-to-br from-pink-400 to-rose-500">
                                        😻
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800 text-lg">Mimi</div>
                                    <div class="text-sm text-gray-500">Kucing manis</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">
                                        Kucing Anggora
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="gender-badge gender-female">
                                        <i class="fas fa-venus"></i>
                                        Perempuan
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="ubahdata.php?id=3" class="btn btn-edit" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="hapusdata.php?id=3" class="btn btn-delete" 
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" title="Hapus Data">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Empty State (Hidden by default, show when no data) -->
            <div class="empty-state mt-8" id="emptyState" style="display: none;">
                <div class="floating-animation">
                    <i class="fas fa-cat"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Belum ada data kucing</h3>
                <p class="text-gray-600 mb-6">Mulai tambahkan data kucing pertama Anda</p>
                <a href="tambahdata.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </a>
            </div>
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#catsTable tbody tr');
            let visibleRows = 0;

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                    visibleRows++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show/hide empty state
            const emptyState = document.getElementById('emptyState');
            const tableContainer = document.querySelector('.admin-card');
            
            if (visibleRows === 0 && searchTerm !== '') {
                emptyState.style.display = 'block';
                tableContainer.style.display = 'none';
            } else {
                emptyState.style.display = 'none';
                tableContainer.style.display = 'block';
            }
        });

        // Add hover effects for table rows
        document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
                this.style.zIndex = '10';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.zIndex = '1';
            });
        });

        // Animated counter for stats
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 30;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 50);
        }

        // Animate stats on page load
        window.addEventListener('load', () => {
            const totalCatsEl = document.getElementById('totalCats');
            const femaleCatsEl = document.getElementById('femaleCats');
            const maleCatsEl = document.getElementById('maleCats');
            
            setTimeout(() => {
                animateCounter(totalCatsEl, 3);
                animateCounter(femaleCatsEl, 2);
                animateCounter(maleCatsEl, 1);
            }, 500);
        });

        // Add click animation to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .btn {
                position: relative;
                overflow: hidden;
            }
            
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: rippleEffect 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes rippleEffect {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>