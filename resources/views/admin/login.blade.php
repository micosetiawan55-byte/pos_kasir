<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - POS Kasir</title>
    
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
        }
        
        .admin-login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            overflow: hidden;
        }
        
        .admin-login-header {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .admin-login-body {
            padding: 30px;
        }
        
        .admin-icon {
            font-size: 4rem;
            color: white;
            margin-bottom: 15px;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .btn-admin-login {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-admin-login:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            color: white;
        }
        
        .admin-alert {
            border-left: 4px solid #4361ee;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="admin-login-card">
        <div class="admin-login-header">
            <i class="bi bi-shield-lock admin-icon"></i>
            <h3>Admin Access</h3>
            <p class="mb-0">POS Kasir Management System</p>
        </div>
        
        <div class="admin-login-body">
            <!-- Demo Alert -->
            <div class="admin-alert">
                <i class="bi bi-info-circle me-2"></i>
                <strong>DEMO ACCESS:</strong> Username: <code>admin</code> | Password: <code>admin123</code>
            </div>
            
            <form id="adminLoginForm">
                <!-- Username -->
                <div class="mb-4">
                    <label for="adminUsername" class="form-label">Username Admin</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-badge"></i>
                        </span>
                        <input type="text" class="form-control" id="adminUsername" 
                               placeholder="admin" value="admin" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="adminPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-key"></i>
                        </span>
                        <input type="password" class="form-control" id="adminPassword" 
                               placeholder="masukan password" value="admin123" required>
                        <button class="btn btn-outline-secondary" type="button" 
                                id="toggleAdminPassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Security Code (Optional) -->
                <!-- <div class="mb-4">
                    <label for="securityCode" class="form-label">Kode Keamanan</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-shield-check"></i>
                        </span>
                        <input type="text" class="form-control" id="securityCode" 
                               placeholder="Opsional">
                    </div>
                </div> -->

                <!-- Remember & Forgot -->
                <!-- <div class="mb-4 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberAdmin">
                        <label class="form-check-label" for="rememberAdmin">
                            Ingat saya
                        </label>
                    </div>
                    <a href="#" class="text-decoration-none">
                        <small>Lupa password?</small>
                    </a>
                </div> -->

                <!-- Login Button -->
                <button type="submit" class="btn btn-admin-login mb-3">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login sebagai Admin
                </button>

                <!-- Back to POS -->
                <!-- <div class="text-center mt-3">
                    <a href="/pos" class="text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Mode Kasir
                    </a>
                </div>
            </form>
        </div>
    </div> -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('toggleAdminPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('adminPassword');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
        
        // Form submission simulation
        document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('adminUsername').value;
            const password = document.getElementById('adminPassword').value;
            
            // Simple validation
            if (username === 'admin' && password === 'admin123') {
                // Simulate loading
                const btn = this.querySelector('button[type="submit"]');
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memproses...';
                btn.disabled = true;
                
                // Redirect to admin dashboard after 1 second
                setTimeout(() => {
                    window.location.href = '/admin/dashboard';
                }, 1000);
            } else {
                alert('Username atau password salah!\n\nGunakan:\nUsername: admin\nPassword: admin123');
            }
        });
        
        // Auto focus
        document.getElementById('adminUsername').focus();
    </script>
</body>
</html>