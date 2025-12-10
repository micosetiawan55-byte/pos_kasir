<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System - Pilih Mode Login</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #2b2d42 0%, #1a1c2b 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .welcome-container {
            max-width: 700px;
            width: 100%;
            padding: 15px;
        }
        
        .welcome-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }
        
        .welcome-header {
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            color: white;
            padding: 25px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .welcome-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: float 20s linear infinite;
        }
        
        @keyframes float {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .welcome-body {
            padding: 25px 20px;
        }
        
        .login-options {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            width: 100%;
            max-width: 280px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            border-color: #4361ee;
        }
        
        .login-icon {
            font-size: 3rem;
            border-radius: 50%;
            width: 90px;
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .kasir-icon {
            background: linear-gradient(135deg, #4cc9f0 0%, #4361ee 100%);
            color: white;
        }
        
        .admin-icon {
            background: linear-gradient(135deg, #7209b7 0%, #3a0ca3 100%);
            color: white;
        }
        
        .login-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #2b2d42;
        }
        
        .login-desc {
            color: #6c757d;
            font-size: 0.85rem;
            margin-bottom: 15px;
            line-height: 1.4;
        }
        
        .btn-login {
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            transition: all 0.3s;
            width: 100%;
            max-width: 160px;
        }
        
        .btn-kasir {
            background: linear-gradient(135deg, #4cc9f0 0%, #4361ee 100%);
            color: white;
        }
        
        .btn-admin {
            background: linear-gradient(135deg, #7209b7 0%, #3a0ca3 100%);
            color: white;
        }
        
        .btn-login:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            color: white;
        }
        
        .system-info {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #4361ee;
        }
        
        .welcome-logo {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .welcome-title {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 5px;
            position: relative;
            z-index: 1;
        }
        
        .welcome-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        @media (max-width: 768px) {
            .login-options {
                flex-direction: column;
                align-items: center;
            }
            
            .login-card {
                max-width: 100%;
            }
            
            .welcome-title {
                font-size: 1.5rem;
            }
            
            .welcome-container {
                padding: 10px;
            }
        }
        
        .clock-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
            display: inline-block;
        }
        
        #live-clock {
            font-size: 1rem;
            font-weight: 600;
            color: white;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-card">
            <div class="welcome-header">
                <div class="clock-container">
                    <div id="live-clock">--:--:--</div>
                </div>
                <i class="bi bi-shop welcome-logo"></i>
                <h1 class="welcome-title">POS SYSTEM</h1>
                <p class="welcome-subtitle">Point of Sale & Management System</p>
            </div>
            
            <div class="welcome-body">
                <div class="text-center mb-3">
                    <h2 class="h4 mb-2">Pilih Mode Login</h2>
                    <p class="text-muted small">Silakan pilih mode login sesuai dengan peran Anda</p>
                </div>
                
                <div class="login-options">
                    <!-- Kasir Login Card -->
                    <div class="login-card" onclick="redirectToKasir()">
                        <div class="login-icon kasir-icon">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <h3 class="login-title">Login Kasir</h3>
                        <p class="login-desc">
                            Akses sistem untuk transaksi penjualan, 
                            pencetakan struk, dan manajemen kas harian.
                        </p>
                        <button class="btn btn-login btn-kasir">
                            <i class="bi bi-cash me-1"></i>Masuk sebagai Kasir
                        </button>
                    </div>
                    
                    <!-- Admin Login Card -->
                    <div class="login-card" onclick="redirectToAdmin()">
                        <div class="login-icon admin-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h3 class="login-title">Login Admin</h3>
                        <p class="login-desc">
                            Akses dashboard admin untuk manajemen inventaris, 
                            laporan keuangan, dan pengaturan sistem.
                        </p>
                        <button class="btn btn-login btn-admin">
                            <i class="bi bi-gear me-1"></i>Masuk sebagai Admin
                        </button>
                    </div>
                </div>
                
                <!-- System Info -->
                <div class="system-info">
                    <div class="row">
                        <div class="col-md-4 text-center mb-2 mb-md-0">
                            <i class="bi bi-cpu text-primary fs-5"></i>
                            <h6 class="mt-1 mb-0 small fw-bold">Version 2.1</h6>
                            <small class="text-muted">Latest Release</small>
                        </div>
                        <div class="col-md-4 text-center mb-2 mb-md-0">
                            <i class="bi bi-calendar-check text-success fs-5"></i>
                            <h6 class="mt-1 mb-0 small fw-bold">{{ date('d M Y') }}</h6>
                            <small class="text-muted">Current Date</small>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="bi bi-people text-warning fs-5"></i>
                            <h6 class="mt-1 mb-0 small fw-bold">Multi-User</h6>
                            <small class="text-muted">Role Based Access</small>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="text-center mt-3">
                    <small class="text-muted">
                        © 2024 POS System v2.1 • 
                        <a href="#" class="text-decoration-none">Help</a> • 
                        <a href="#" class="text-decoration-none">Support</a>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Live Clock
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const day = now.toLocaleDateString('id-ID', { weekday: 'long' });
            const date = now.toLocaleDateString('id-ID', { 
                day: 'numeric', 
                month: 'short', 
                year: 'numeric' 
            });
            
            document.getElementById('live-clock').textContent = 
                `${hours}:${minutes}:${seconds} | ${date}`;
        }
        
        // Update clock immediately and every second
        updateClock();
        setInterval(updateClock, 1000);
        
        // Redirect functions
        function redirectToKasir() {
            const kasirCard = document.querySelector('.btn-kasir').closest('.login-card');
            kasirCard.style.opacity = '0.7';
            kasirCard.style.cursor = 'wait';
            
            setTimeout(() => {
                window.location.href = '/login';
            }, 300);
        }
        
        function redirectToAdmin() {
            const adminCard = document.querySelector('.btn-admin').closest('.login-card');
            adminCard.style.opacity = '0.7';
            adminCard.style.cursor = 'wait';
            
            setTimeout(() => {
                window.location.href = '/admin-login';
            }, 300);
        }
        
        // Add click events to entire cards
        document.querySelectorAll('.login-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if (e.target.tagName === 'BUTTON') return;
                if (this.contains(document.querySelector('.btn-kasir'))) {
                    redirectToKasir();
                } else {
                    redirectToAdmin();
                }
            });
        });
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === '1' || e.key === 'F1') {
                redirectToKasir();
            } else if (e.key === '2' || e.key === 'F2') {
                redirectToAdmin();
            }
        });
        
        // Add welcome animation
        window.addEventListener('load', function() {
            document.querySelector('.welcome-card').style.opacity = '0';
            document.querySelector('.welcome-card').style.transform = 'translateY(10px)';
            
            setTimeout(() => {
                document.querySelector('.welcome-card').style.transition = 'all 0.6s ease';
                document.querySelector('.welcome-card').style.opacity = '1';
                document.querySelector('.welcome-card').style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html>