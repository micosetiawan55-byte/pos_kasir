<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - POS Kasir</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fb 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .logout-container {
            width: 100%;
            max-width: 450px;
            text-align: center;
        }
        
        .logout-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 40px 30px;
            border: none;
        }
        
        .logout-icon {
            font-size: 4rem;
            color: #4361ee;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .btn-logout {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            margin: 10px;
        }
        
        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
            color: white;
        }
        
        .btn-cancel {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #6c757d;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            margin: 10px;
        }
        
        .btn-cancel:hover {
            background-color: #e9ecef;
            color: #495057;
        }
        
        .countdown {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4361ee;
            margin: 20px 0;
        }
        
        .progress {
            height: 8px;
            border-radius: 4px;
            margin: 20px 0;
        }
        
        .logout-message {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #28a745;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <div class="logout-card">
            <!-- Icon -->
            <i class="bi bi-box-arrow-right logout-icon"></i>
            
            <!-- Title -->
            <h3 class="mb-3">Keluar dari Sistem</h3>
            <p class="text-muted mb-4">
                Anda akan keluar dari akun POS Kasir. Pastikan Anda telah menyimpan semua pekerjaan.
            </p>
            
            <!-- Auto Logout Countdown -->
            <div id="autoLogoutSection" class="mb-4">
                <p class="text-muted">Logout otomatis dalam:</p>
                <div class="countdown" id="countdown">5</div>
                <div class="progress">
                    <div class="progress-bar bg-primary" id="progressBar" style="width: 100%"></div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-logout" id="logoutNowBtn">
                    <i class="bi bi-box-arrow-right me-2"></i>Ya, Keluar Sekarang
                </button>
                <button class="btn btn-cancel" id="cancelLogoutBtn">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </button>
            </div>
            
            <!-- Logout Message -->
            <div class="logout-message mt-4">
                <h6><i class="bi bi-info-circle me-2"></i>Informasi Logout</h6>
                <p class="mb-0">
                    Setelah logout, Anda harus login kembali untuk mengakses sistem.
                    <br>
                    <small>Data transaksi sudah tersimpan otomatis.</small>
                </p>
            </div>
            
            <!-- Session Info -->
            <div class="mt-4 text-muted">
                <small>
                    <i class="bi bi-clock me-1"></i>
                    Waktu login terakhir: <span id="lastLogin">{{ date('H:i') }}</span>
                    <br>
                    <i class="bi bi-person me-1"></i>
                    User: <strong id="currentUser">Kasir 1</strong>
                </small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Elements
        const countdownElement = document.getElementById('countdown');
        const progressBar = document.getElementById('progressBar');
        const logoutNowBtn = document.getElementById('logoutNowBtn');
        const cancelLogoutBtn = document.getElementById('cancelLogoutBtn');
        
        // Countdown variables
        let countdown = 5;
        let countdownInterval;
        let autoLogoutTimeout;
        
        // Start countdown
        function startCountdown() {
            countdownInterval = setInterval(() => {
                countdown--;
                countdownElement.textContent = countdown;
                
                // Update progress bar
                const progress = (countdown / 5) * 100;
                progressBar.style.width = `${progress}%`;
                
                // When countdown reaches 0
                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    performLogout();
                }
            }, 1000);
            
            // Set auto logout after 5 seconds
            autoLogoutTimeout = setTimeout(performLogout, 5000);
        }
        
        // Perform logout
        function performLogout() {
            // Show loading state
            logoutNowBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Logging out...';
            logoutNowBtn.disabled = true;
            
            // Clear any existing timeouts/intervals
            clearInterval(countdownInterval);
            clearTimeout(autoLogoutTimeout);
            
            // Simulate logout process
            setTimeout(() => {
                // Clear localStorage (simulate session clearing)
                localStorage.removeItem('rememberedUser');
                
                // Redirect to login page
                window.location.href = '/';
            }, 1000);
        }
        
        // Cancel logout
        function cancelLogout() {
            // Clear countdown
            clearInterval(countdownInterval);
            clearTimeout(autoLogoutTimeout);
            
            // Go back to previous page or home
            if (document.referrer) {
                window.history.back();
            } else {
                window.location.href = '/pos';
            }
        }
        
        // Event Listeners
        logoutNowBtn.addEventListener('click', performLogout);
        cancelLogoutBtn.addEventListener('click', cancelLogout);
        
        // Get current user from localStorage or default
        const rememberedUser = localStorage.getItem('rememberedUser');
        if (rememberedUser) {
            document.getElementById('currentUser').textContent = rememberedUser;
        }
        
        // Update last login time
        function updateLastLoginTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { 
                hour: '2-digit', 
                minute: '2-digit'
            });
            document.getElementById('lastLogin').textContent = timeString;
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            startCountdown();
            updateLastLoginTime();
            
            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Enter = Logout Now
                if (e.key === 'Enter') {
                    performLogout();
                }
                // Escape = Cancel
                if (e.key === 'Escape') {
                    cancelLogout();
                }
            });
        });
    </script>
</body>
</html>