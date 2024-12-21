<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryNest - Advanced Registration</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/phosphor-icons"></script>
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #10b981;
            --background-color: #f8fafc;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--background-color);
            line-height: 1.6;
            color: var(--text-primary);
        }

        .register-wrapper {
            display: flex;
            min-height: 100vh;
            background: linear-gradient(135deg, 
                rgba(99, 102, 241, 0.1) 0%, 
                rgba(16, 185, 129, 0.1) 100%);
        }

        .register-container {
            width: 100%;
            max-width: 480px;
            margin: auto;
            background-color: white;
            border-radius: 24px;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.05),
                0 10px 15px -3px rgba(0, 0, 0, 0.03);
            padding: 48px;
            position: relative;
            overflow: hidden;
        }

        .register-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .register-header h2 {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .register-header p {
            color: var(--text-secondary);
            font-size: 1rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .form-group .icon {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            color: var(--text-secondary);
            transition: color 0.3s ease;
        }

        .form-control:focus + .icon {
            color: var(--primary-color);
        }

        .form-control-icon {
            padding-left: 48px;
        }

        .btn-register {
            background-color: var(--primary-color);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background-color: #4f46e5;
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.2);
        }

        .social-divider {
            display: flex;
            align-items: center;
            margin: 32px 0;
        }

        .social-divider::before,
        .social-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e5e7eb;
        }

        .social-divider span {
            padding: 0 16px;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e5e7eb;
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: scale(1.1);
        }

        .login-link {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .register-container {
                max-width: 100%;
                margin: 24px;
                padding: 32px;
            }
        }
    </style>
</head>
<body>
    <div class="register-wrapper">
        <div class="register-container">
            <div class="register-header">
                <h2>Create Account</h2>
                <p>Start your digital reading adventure</p>
            </div>

            <form action="{{ route('do.register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <i class="ph-user icon"></i>
                    <input type="text" class="form-control form-control-icon" name="name" placeholder="Full Name" required>
                </div>

                <div class="form-group">
                    <i class="ph-envelope icon"></i>
                    <input type="email" class="form-control form-control-icon" name="email" placeholder="Email Address" required>
                </div>

                <div class="form-group">
                    <i class="ph ph-phone icon"></i>
                    <input type="text" class="form-control form-control-icon" name="phone" placeholder="Phone" required>
                </div>

                <div class="form-group">
                    <i class="ph-lock icon"></i>
                    <input type="password" class="form-control form-control-icon" name="password" placeholder="Create Password" required>
                </div>

                <button type="submit" class="btn btn-register w-100">
                    Create Account
                </button>

                <div class="text-center mt-4">
                    <p>Already have an account? <a href="/login" class="login-link">Log In</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>