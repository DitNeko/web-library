<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - Perpustakaan Digital</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --bg-light: #f4f6f9;
            --text-dark: #2c3e50;
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: white;
            border-right: 1px solid #e9ecef;
            padding: 20px;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .sidebar-logo img {
            width: 40px;
            margin-right: 15px;
        }

        .sidebar-logo h3 {
            margin: 0;
            font-weight: 600;
            color: var(--primary-color);
        }

        .nav-link {
            color: #6c757d;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .nav-link i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(106, 17, 203, 0.1);
            color: var(--primary-color);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
        }

        .settings-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .settings-card h5 {
            margin-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 10px;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="https://via.placeholder.com/40" alt="Logo">
            <h3>Perpustakaan</h3>
        </div>

        <nav>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.html">
                        <i class="bi bi-grid-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manajemen-buku.html">
                        <i class="bi bi-book"></i> Manajemen Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manajemen-anggota.html">
                        <i class="bi bi-people"></i> Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manajemen-peminjaman.html">
                        <i class="bi bi-arrow-left-right"></i> Peminjaman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-gear"></i> Pengaturan
                    </a>
                </li>
            </ul>
            <div class="mt-auto text-center">
                <hr class="my-3">
                <a href="login.html" class="nav-link text-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </nav>
    </div>

    <!-- Konten Utama -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h1 class="h2">Pengaturan Perpustakaan</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Pengaturan Umum -->
            <div class="settings-card">
                <h5><i class="bi bi-gear me-2"></i>Pengaturan Umum</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Perpustakaan</label>
                        <input type="text" class="form-control" value="Perpustakaan Digital">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Alamat Perpustakaan</label>
                        <input type="text" class="form-control" value="Jl. Perpustakaan No. 123">
                    </div>
                </div>
            </div>

            <!-- Pengaturan Peminjaman -->
            <div class="settings-card">
                <h5><i class="bi bi-arrow-left-right me-2"></i>Pengaturan Peminjaman</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Maksimal Hari Peminjaman</label>
                        <input type="number" class="form-control" value="14">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Denda Keterlambatan (per hari)</label>
                        <input type="number" class="form-control" value="5000">
                    </div>
                </div>
            </div>

            <!-- Pengaturan Akun -->
            <div class="settings-card">
                <h5><i class="bi bi-person-circle me-2"></i>Pengaturan Akun</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Admin</label>
                        <input type="email" class="form-control" value="admin@perpustakaan.com">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" class="form-control" placeholder="Masukkan password baru">
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>