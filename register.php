<?php
require 'function.php';

if (isset($_POST["register"])) {
    $message = register($_POST);

    if ($message === "Register Berhasil!") {
        echo "<script>
                showSuccessModal('{$message}');
              </script>";
    } else {
        echo "<script>
                showErrorModal('{$message}');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Kucing Cute</title>
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

        .register-container {
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 1;
        }

        .register-box {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            width: 100%;
            animation: slideUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .register-box::before {
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

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-icon {
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

        .register-icon i {
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

        /* Password strength indicator */
        .password-strength {
            margin-top: 5px;
            height: 4px;
            background: #e1e5e9;
            border-radius: 2px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #ff6b6b, #feca57, #48dbfb, #0abde3);
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        .password-match {
            margin-top: 5px;
            font-size: 12px;
            display: none;
        }

        .password-match.show {
            display: block;
        }

        .password-match.match {
            color: #27ae60;
        }

        .password-match.no-match {
            color: #e74c3c;
        }

        .register-btn {
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
            margin-top: 10px;
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .register-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
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

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #764ba2;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            position: relative;
            animation: modalSlide 0.3s ease-out;
        }

        @keyframes modalSlide {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
            color: white;
        }

        .modal-icon.success {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
        }

        .modal-icon.error {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .modal h2 {
            margin-bottom: 15px;
            font-size: 24px;
        }

        .modal p {
            margin-bottom: 25px;
            color: #666;
            line-height: 1.5;
        }

        .modal-btn {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .modal-btn.success {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
        }

        .modal-btn.error {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
        }

        .modal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Password requirements */
        .password-requirements {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }

        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            transition: color 0.3s ease;
        }

        .requirement i {
            margin-right: 8px;
            width: 12px;
        }

        .requirement.met {
            color: #27ae60;
        }

        .requirement.unmet {
            color: #e74c3c;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .register-box {
                padding: 30px 25px;
                margin: 10px;
            }
            
            .register-icon {
                width: 60px;
                height: 60px;
            }
            
            .register-icon i {
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
            
            .register-btn {
                padding: 14px;
                font-size: 14px;
            }
        }

        /* Loading animation for button */
        .register-btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .register-btn.loading::after {
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
    <div class="register-container">
        <div class="register-box">
            <div class="register-header">
                <div class="register-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h1>Buat Akun Baru</h1>
                <p class="subtitle">Bergabunglah dengan komunitas kucing cute</p>
            </div>

            <form action="" method="post" id="registerForm">
                <div class="input-group">
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" id="username" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password1">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password1" id="password1" required>
                    </div>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="strengthBar"></div>
                    </div>
                    <div class="password-requirements" id="requirements">
                        <div class="requirement unmet" id="req-length">
                            <i class="fas fa-times"></i>
                            Minimal 8 karakter
                        </div>
                        <div class="requirement unmet" id="req-uppercase">
                            <i class="fas fa-times"></i>
                            Minimal 1 huruf kapital
                        </div>
                        <div class="requirement unmet" id="req-number">
                            <i class="fas fa-times"></i>
                            Minimal 1 angka
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password2">Konfirmasi Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password2" id="password2" required>
                    </div>
                    <div class="password-match" id="passwordMatch">
                        <i class="fas fa-check"></i>
                        Password cocok
                    </div>
                </div>

                <button type="submit" name="register" class="register-btn" id="registerBtn">
                    <span>Daftar Sekarang</span>
                </button>
            </form>

            <div class="divider">
                <span>atau</span>
            </div>

            <div class="login-link">
                Sudah punya akun? <a href="login.php">Masuk di sini</a>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon success">
                <i class="fas fa-check"></i>
            </div>
            <h2>Berhasil!</h2>
            <p id="successMessage">Akun berhasil dibuat!</p>
            <button class="modal-btn success" onclick="redirectToLogin()">
                Lanjut ke Login
            </button>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon error">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h2>Oops!</h2>
            <p id="errorMessage">Terjadi kesalahan!</p>
            <button class="modal-btn error" onclick="closeErrorModal()">
                Coba Lagi
            </button>
        </div>
    </div>

    <script>
        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                number: /\d/.test(password)
            };

            // Update requirements display
            Object.keys(requirements).forEach(key => {
                const element = document.getElementById(`req-${key}`);
                if (requirements[key]) {
                    element.classList.remove('unmet');
                    element.classList.add('met');
                    element.querySelector('i').className = 'fas fa-check';
                    strength++;
                } else {
                    element.classList.remove('met');
                    element.classList.add('unmet');
                    element.querySelector('i').className = 'fas fa-times';
                }
            });

            // Update strength bar
            const strengthBar = document.getElementById('strengthBar');
            const percentage = (strength / 3) * 100;
            strengthBar.style.width = percentage + '%';

            return strength === 3;
        }

        // Password match checker
        function checkPasswordMatch() {
            const password1 = document.getElementById('password1').value;
            const password2 = document.getElementById('password2').value;
            const matchElement = document.getElementById('passwordMatch');

            if (password2.length > 0) {
                matchElement.classList.add('show');
                if (password1 === password2) {
                    matchElement.classList.remove('no-match');
                    matchElement.classList.add('match');
                    matchElement.innerHTML = '<i class="fas fa-check"></i> Password cocok';
                    return true;
                } else {
                    matchElement.classList.remove('match');
                    matchElement.classList.add('no-match');
                    matchElement.innerHTML = '<i class="fas fa-times"></i> Password tidak cocok';
                    return false;
                }
            } else {
                matchElement.classList.remove('show');
                return false;
            }
        }

        // Event listeners
        document.getElementById('password1').addEventListener('input', function() {
            const isStrong = checkPasswordStrength(this.value);
            checkPasswordMatch();
            updateSubmitButton();
        });

        document.getElementById('password2').addEventListener('input', function() {
            checkPasswordMatch();
            updateSubmitButton();
        });

        function updateSubmitButton() {
            const password1 = document.getElementById('password1').value;
            const password2 = document.getElementById('password2').value;
            const isStrong = checkPasswordStrength(password1);
            const isMatch = password1 === password2 && password2.length > 0;
            const username = document.getElementById('username').value;

            const submitBtn = document.getElementById('registerBtn');
            
            if (username.length > 0 && isStrong && isMatch) {
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
            } else {
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.6';
            }
        }

        document.getElementById('username').addEventListener('input', updateSubmitButton);

        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function() {
            const btn = document.getElementById('registerBtn');
            btn.classList.add('loading');
            btn.innerHTML = '<span style="opacity: 0;">Daftar Sekarang</span>';
        });

        // Modal functions
        function showSuccessModal(message) {
            document.getElementById('successMessage').textContent = message;
            document.getElementById('successModal').style.display = 'block';
            createConfetti();
        }

        function showErrorModal(message) {
            document.getElementById('errorMessage').textContent = message;
            document.getElementById('errorModal').style.display = 'block';
        }

        function redirectToLogin() {
            window.location.href = 'login.php';
        }

        function closeErrorModal() {
            document.getElementById('errorModal').style.display = 'none';
            // Reset form
            document.getElementById('registerForm').reset();
            document.getElementById('strengthBar').style.width = '0%';
            document.getElementById('passwordMatch').classList.remove('show');
            
            // Reset requirements
            document.querySelectorAll('.requirement').forEach(req => {
                req.classList.remove('met');
                req.classList.add('unmet');
                req.querySelector('i').className = 'fas fa-times';
            });
            
            updateSubmitButton();
        }

        // Confetti effect
        function createConfetti() {
            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.style.cssText = `
                    position: fixed;
                    width: 6px;
                    height: 6px;
                    background: ${['#667eea', '#764ba2', '#ff6b6b', '#feca57', '#48dbfb'][Math.floor(Math.random() * 5)]};
                    border-radius: 3px;
                    pointer-events: none;
                    z-index: 9999;
                    left: ${Math.random() * 100}%;
                    top: -10px;
                    animation: confetti-fall ${Math.random() * 3 + 2}s linear forwards;
                `;
                
                document.body.appendChild(confetti);
                setTimeout(() => confetti.remove(), 5000);
            }
        }

        // Add confetti animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes confetti-fall {
                to {
                    transform: translateY(100vh) rotate(720deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Add floating animation to inputs
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

        // Initialize
        updateSubmitButton();
    </script>
</body>
</html>