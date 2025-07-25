<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kucing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Base Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Animations */
        .floating-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Text Styles */
        .gradient-text {
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        /* Form Elements */
        .form-label {
            color: #374151;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-input {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
            background: rgba(255, 255, 255, 1);
        }
        
        .form-input:hover {
            border-color: #667eea;
            background: rgba(255, 255, 255, 1);
        }

        /* Buttons */
        .btn-submit {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2, #667eea);
        }
        
        .btn-submit:active {
            transform: translateY(0px);
        }
        
        .btn-back {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            box-shadow: 0 8px 16px rgba(107, 114, 128, 0.3);
        }
        
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(107, 114, 128, 0.4);
        }

        /* File Upload */
        .file-upload-area {
            border: 2px dashed rgba(102, 126, 234, 0.3);
            background: rgba(102, 126, 234, 0.05);
            border-radius: 16px;
            padding: 40px 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .file-upload-area:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }
        
        .file-upload-area.dragover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.15);
            transform: scale(1.02);
        }
        
        .file-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: 16px;
            margin: 16px auto;
            border: 3px solid #667eea;
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.2);
        }

        /* Gender Selector */
        .gender-selector {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        
        .gender-option {
            position: relative;
        }
        
        .gender-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .gender-card {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .gender-card:hover {
            border-color: #667eea;
            background: rgba(255, 255, 255, 1);
        }
        
        .gender-option input[type="radio"]:checked + .gender-card {
            border-color: #667eea;
            background: #667eea;
            color: white;
        }
        
        .gender-option input[type="radio"]:checked + .gender-card .icon-circle {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .gender-option input[type="radio"]:checked + .gender-card .icon-circle i {
            color: white;
        }

        /* Messages */
        .success-message {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 16px 24px;
            border-radius: 12px;
            margin-bottom: 24px;
            display: none;
            align-items: center;
            gap: 12px;
        }
        
        .error-message {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 16px 24px;
            border-radius: 12px;
            margin-bottom: 24px;
            display: none;
            align-items: center;
            gap: 12px;
        }

        /* Suggestions Dropdown */
        .jenis-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            display: none;
        }
        
        .suggestion-item {
            padding: 12px 16px;
            cursor: pointer;
            transition: background 0.2s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .suggestion-item:hover {
            background: rgba(102, 126, 234, 0.1);
        }
        
        .suggestion-item:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body class="overflow-x-hidden">
    <div class="min-h-screen py-8">
        <div class="container mx-auto px-6 max-w-2xl">
            <!-- Header Section -->
            <header class="text-center mb-8">
                <div class="floating-animation inline-block mb-6">
                    <i class="fas fa-cat text-6xl text-indigo-600"></i>
                </div>
                <h1 class="gradient-text text-4xl md:text-5xl font-bold mb-4">
                    Tambah Data Kucing
                </h1>
                <p class="text-gray-600 text-lg">
                    Tambahkan kucing baru ke dalam database dengan mudah
                </p>
            </header>

            <!-- Messages Section -->
            <section class="messages">
                <div class="success-message" id="successMessage">
                    <i class="fas fa-check-circle text-xl"></i>
                    <span>Data berhasil ditambahkan!</span>
                </div>
                
                <div class="error-message" id="errorMessage">
                    <i class="fas fa-exclamation-circle text-xl"></i>
                    <span>Data gagal ditambahkan! Silakan coba lagi.</span>
                </div>
            </section>

            <!-- Main Form -->
            <main class="form-container rounded-3xl p-8 shadow-2xl">
                <form action="" method="post" enctype="multipart/form-data" id="catForm">
                    
                    <!-- Nama Kucing -->
                    <div class="form-group">
                        <label for="Nama" class="form-label text-lg">
                            <i class="fas fa-paw text-purple-600"></i>
                            Nama Kucing
                        </label>
                        <input 
                            type="text" 
                            name="Nama" 
                            id="Nama" 
                            required 
                            class="form-input w-full px-6 py-4 rounded-2xl text-gray-700 font-medium focus:outline-none"
                            placeholder="Masukkan nama kucing yang lucu..."
                        />
                    </div>

                    <!-- Jenis Kucing -->
                    <div class="form-group relative">
                        <label for="jenis" class="form-label text-lg">
                            <i class="fas fa-list text-purple-600"></i>
                            Jenis Kucing
                        </label>
                        <input 
                            type="text" 
                            name="jenis" 
                            id="jenis" 
                            required 
                            class="form-input w-full px-6 py-4 rounded-2xl text-gray-700 font-medium focus:outline-none"
                            placeholder="Contoh: Kucing Persia, Anggora, Maine Coon..."
                            autocomplete="off"
                        />
                        <div class="jenis-suggestions" id="jenisSuggestions">
                            <div class="suggestion-item" data-value="Kucing Persia">🐱 Kucing Persia</div>
                            <div class="suggestion-item" data-value="Kucing Anggora">😸 Kucing Anggora</div>
                            <div class="suggestion-item" data-value="Kucing Maine Coon">😺 Kucing Maine Coon</div>
                            <div class="suggestion-item" data-value="Kucing British Shorthair">😻 Kucing British Shorthair</div>
                            <div class="suggestion-item" data-value="Kucing Siam">😽 Kucing Siam</div>
                            <div class="suggestion-item" data-value="Kucing Sphynx">🙀 Kucing Sphynx</div>
                            <div class="suggestion-item" data-value="Kucing Bengal">🐅 Kucing Bengal</div>
                            <div class="suggestion-item" data-value="Kucing Scottish Fold">😾 Kucing Scottish Fold</div>
                            <div class="suggestion-item" data-value="Kucing Ragdoll">🐱 Kucing Ragdoll</div>
                            <div class="suggestion-item" data-value="Kucing Kampung">😸 Kucing Kampung</div>
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label class="form-label text-lg mb-4">
                            <i class="fas fa-venus-mars text-purple-600"></i>
                            Jenis Kelamin
                        </label>
                        <div class="gender-selector">
                            <div class="gender-option">
                                <input type="radio" name="Gender" id="female" value="Perempuan" required>
                                <label for="female" class="gender-card">
                                    <div class="icon-circle w-12 h-12 mx-auto mb-3 rounded-full bg-pink-100 flex items-center justify-center">
                                        <i class="fas fa-venus text-pink-500"></i>
                                    </div>
                                    <div class="font-semibold text-gray-700">Perempuan</div>
                                    <div class="text-sm text-gray-500 mt-1">Female</div>
                                </label>
                            </div>
                            <div class="gender-option">
                                <input type="radio" name="Gender" id="male" value="Laki-laki" required>
                                <label for="male" class="gender-card">
                                    <div class="icon-circle w-12 h-12 mx-auto mb-3 rounded-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-mars text-blue-500"></i>
                                    </div>
                                    <div class="font-semibold text-gray-700">Laki-laki</div>
                                    <div class="text-sm text-gray-500 mt-1">Male</div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Foto Kucing -->
                    <div class="form-group">
                        <label class="form-label text-lg mb-4">
                            <i class="fas fa-camera text-purple-600"></i>
                            Foto Kucing
                        </label>
                        <div class="file-upload-area" id="uploadArea">
                            <input type="file" name="foto" id="foto" accept="image/*" style="display: none;">
                            <div id="uploadContent">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-600 font-medium mb-2">Klik untuk upload foto atau drag & drop</p>
                                <p class="text-gray-400 text-sm">Mendukung JPG, PNG, GIF (Max: 5MB)</p>
                            </div>
                            <div id="previewContent" style="display: none;">
                                <img id="imagePreview" class="file-preview" alt="Preview">
                                <p class="text-gray-600 font-medium mt-3">Klik untuk mengganti foto</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                        <a href="datakucing.php" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" name="submit" class="btn-submit">
                            <i class="fas fa-plus-circle text-xl"></i>
                            Tambah Data Kucing
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script>
        // DOM Elements
        const elements = {
            uploadArea: document.getElementById('uploadArea'),
            fileInput: document.getElementById('foto'),
            uploadContent: document.getElementById('uploadContent'),
            previewContent: document.getElementById('previewContent'),
            imagePreview: document.getElementById('imagePreview'),
            jenisInput: document.getElementById('jenis'),
            jenisSuggestions: document.getElementById('jenisSuggestions'),
            catForm: document.getElementById('catForm'),
            successMessage: document.getElementById('successMessage'),
            errorMessage: document.getElementById('errorMessage')
        };

        // File Upload Handler
        class FileUploadHandler {
            constructor() {
                this.initEventListeners();
            }

            initEventListeners() {
                // Click to upload
                elements.uploadArea.addEventListener('click', () => {
                    elements.fileInput.click();
                });

                // Drag and drop functionality
                elements.uploadArea.addEventListener('dragover', this.handleDragOver);
                elements.uploadArea.addEventListener('dragleave', this.handleDragLeave);
                elements.uploadArea.addEventListener('drop', this.handleDrop.bind(this));

                // File input change
                elements.fileInput.addEventListener('change', this.handleFileInputChange.bind(this));
            }

            handleDragOver(e) {
                e.preventDefault();
                elements.uploadArea.classList.add('dragover');
            }

            handleDragLeave() {
                elements.uploadArea.classList.remove('dragover');
            }

            handleDrop(e) {
                e.preventDefault();
                elements.uploadArea.classList.remove('dragover');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    this.handleFileSelect(files[0]);
                }
            }

            handleFileInputChange(e) {
                if (e.target.files.length > 0) {
                    this.handleFileSelect(e.target.files[0]);
                }
            }

            handleFileSelect(file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Mohon pilih file gambar yang valid!');
                    return;
                }

                // Validate file size (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar! Maksimal 5MB.');
                    return;
                }

                // Show preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    elements.imagePreview.src = e.target.result;
                    elements.uploadContent.style.display = 'none';
                    elements.previewContent.style.display = 'block';
                };
                reader.readAsDataURL(file);

                // Set file to input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                elements.fileInput.files = dataTransfer.files;
            }
        }

        // Autocomplete Handler
        class AutocompleteHandler {
            constructor() {
                this.initEventListeners();
            }

            initEventListeners() {
                elements.jenisInput.addEventListener('focus', this.showSuggestions);
                elements.jenisInput.addEventListener('blur', this.hideSuggestions);
                elements.jenisInput.addEventListener('input', this.filterSuggestions);
                elements.jenisSuggestions.addEventListener('click', this.handleSuggestionClick);
            }

            showSuggestions() {
                elements.jenisSuggestions.style.display = 'block';
            }

            hideSuggestions() {
                setTimeout(() => {
                    elements.jenisSuggestions.style.display = 'none';
                }, 200);
            }

            filterSuggestions() {
                const value = elements.jenisInput.value.toLowerCase();
                const suggestions = elements.jenisSuggestions.querySelectorAll('.suggestion-item');
                
                suggestions.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    item.style.display = text.includes(value) ? 'block' : 'none';
                });
            }

            handleSuggestionClick(e) {
                if (e.target.classList.contains('suggestion-item')) {
                    elements.jenisInput.value = e.target.getAttribute('data-value');
                    elements.jenisSuggestions.style.display = 'none';
                    elements.jenisInput.focus();
                }
            }
        }

        // Form Handler
        class FormHandler {
            constructor() {
                this.initEventListeners();
            }

            initEventListeners() {
                elements.catForm.addEventListener('submit', this.handleSubmit.bind(this));
            }

            handleSubmit(e) {
                e.preventDefault();
                
                if (!this.validateForm()) return;

                this.submitForm();
            }

            validateForm() {
                const formData = new FormData(elements.catForm);
                const nama = formData.get('Nama').trim();
                const jenis = formData.get('jenis').trim();
                const gender = formData.get('Gender');
                
                // Basic validation
                if (!nama || !jenis || !gender) {
                    this.showErrorMessage('Mohon lengkapi semua field yang wajib diisi!');
                    return false;
                }

                if (nama.length < 2) {
                    this.showErrorMessage('Nama kucing minimal 2 karakter!');
                    return false;
                }

                return true;
            }

            submitForm() {
                const submitBtn = elements.catForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                // Show loading state
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin text-xl"></i> Menyimpan...';
                submitBtn.disabled = true;

                // Simulate form submission
                setTimeout(() => {
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // Show success message
                    this.showSuccessMessage('Data kucing berhasil ditambahkan!');
                    
                    // Reset form after 2 seconds
                    setTimeout(() => {
                        this.resetForm();
                    }, 2000);
                }, 2000);
            }

            resetForm() {
                elements.catForm.reset();
                elements.uploadContent.style.display = 'block';
                elements.previewContent.style.display = 'none';
                elements.successMessage.style.display = 'none';
            }

            showSuccessMessage(message) {
                elements.successMessage.querySelector('span').textContent = message;
                elements.successMessage.style.display = 'flex';
                
                setTimeout(() => {
                    elements.successMessage.style.display = 'none';
                }, 5000);
            }

            showErrorMessage(message) {
                elements.errorMessage.querySelector('span').textContent = message;
                elements.errorMessage.style.display = 'flex';
                
                setTimeout(() => {
                    elements.errorMessage.style.display = 'none';
                }, 5000);
            }
        }

        // UI Animations
        class UIAnimations {
            constructor() {
                this.initAnimations();
            }

            initAnimations() {
                this.initInputAnimations();
                this.initGenderCardAnimations();
            }

            initInputAnimations() {
                document.querySelectorAll('.form-input').forEach(input => {
                    input.addEventListener('focus', function() {
                        this.parentElement.style.transform = 'translateY(-2px)';
                    });
                    
                    input.addEventListener('blur', function() {
                        this.parentElement.style.transform = 'translateY(0px)';
                    });
                });
            }

            initGenderCardAnimations() {
                // Removed complex animations that were causing issues
                // Simple click handling is now handled by CSS only
            }
        }

        // Initialize all handlers
        document.addEventListener('DOMContentLoaded', () => {
            new FileUploadHandler();
            new AutocompleteHandler();
            new FormHandler();
            new UIAnimations();
        });
    </script>
</body>
</html>